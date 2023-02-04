<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Petty_cash extends MX_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->user_auth->is_logged_in()) {
            redirect($this->config->item('base_url') . 'users/login');
        }
        $main_module = 'petty_cash';
        $access_arr = array(
            'petty_cash/index' => array('add', 'edit', 'delete', 'view'),
            'petty_cash/add' => array('add'),
            'petty_cash/edit' => array('edit'),
            'petty_cash/view' => array('view'),
            'petty_cash/delete' => array('delete'),
            'petty_cash/getPettyCash' => 'no_restriction',
            'petty_cash/add_new_petty_cash' => 'no_restriction',
            'petty_cash/edit_receipt_details' => 'no_restriction',
            'petty_cash/get_expense_category' => 'no_restriction',
            'petty_cash/getNames' => 'no_restriction',
            'petty_cash/getPettyCashData' => 'no_restriction',
            'petty_cash/edit_petty_cash_details' => 'no_restriction',
            'petty_cash/petty_cash_report' => 'no_restriction',
            'petty_cash/check_opening_balance' => 'no_restriction',
            'petty_cash/check_closing_balance' => 'no_restriction',
        );
        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {
            redirect($this->config->item('base_url'));
        }

        $this->load->model('petty_cash/petty_cash_model');
        //$this->template->write_view('session_msg', 'users/session_msg');
        //$data_msg_notify['new_message'] = $this->user_auth->get_new_message();
        //$this->template->write_view('popup', 'users/messageboard_notify', $data_msg_notify);
    }

    function index() {
        $this->template->write_view('content', 'petty_cash/petty_cash_list');
        $this->template->render();
    }

    function getPettyCash() {
        //$data['data'] = $this->members_model->get_all_members();
        $searchQuery = $this->input->post('query');
        $searchString = "";
        if (!(empty($searchQuery['generalSearch'])) && $searchQuery['generalSearch'] != "") {
            $searchString = $searchQuery['generalSearch'];
        }

        $query = $this->input->post('query');

        $from_date = "";
        $to_date = "";

        if (isset($query['fromDate'])) {
            $from_date = $query['fromDate'];
        }
        if (isset($query["toDate"])) {
            $to_date = $query["toDate"];
        }

        $data['data'] = $this->petty_cash_model->get_all_petty_cash_list($searchString, $from_date, $to_date);

        $total_records = count($data['data']);
        $pages = ceil($total_records / 10);
        $data['meta'] = array(
            "page" => 1,
            "pages" => $pages,
            "perpage" => -1,
            "total" => $total_records,
            "sort" => "asc",
            "field" => "id"
        );

        echo json_encode($data);
    }

    function add() {

        $this->template->write_view('content', 'petty_cash/add_petty_cash');
        $this->template->render();
    }

    function add_new_petty_cash() {

        $transaction_date = $this->input->post('transaction_date');
        $expense_category = $this->input->post('expense_category');
        $details = $this->input->post('details');
        $amount = $this->input->post('amount');
        $expense_type = $this->input->post('expense_type');
        $transaction_type = $this->input->post('transaction_type');

        $created_date = date('Y-m-d H:i:s');

        $transaction_type = $this->input->post("transaction_type");
        $cash_in = 0;
        $cash_out = 0;
        if ($transaction_type == "1") {
            $cash_in = $amount;
            $cash_out = 0;
            //$update_organization_amount = $this->petty_cash_model->add_organization_amount($amount);
        }
        if ($transaction_type == "2") {
            $cash_in = 0;
            $cash_out = $amount;
            //$update_organization_amount = $this->petty_cash_model->subtract_organization_amount($amount);
        }
        $check_balance = 0;
        $flag = 1;
        if ($transaction_type == "2") {
            $check_balance = $this->petty_cash_model->check_closing_balance($transaction_date);
            if ($check_balance < $amount) {
                $flag = 0;
            }
        }
        //$balance = $this->petty_cash_model->check_closing_balance($transaction_date);

        if ($flag == 1) {

            $petty_cash_data = array(
                'expense_type' => $expense_type,
                //'amount' => $this->input->post('amount'),
                'expense_id' => $this->input->post('expense_category'),
                'date' => $this->input->post('transaction_date'),
                'details' => $this->input->post('details'),
                'cash_in' => $cash_in,
                'cash_out' => $cash_out,
                //'balance' => $balance,
                'transaction_type' => $transaction_type,
                'created_date' => $created_date
            );

            $insert = $this->petty_cash_model->insert_petty_cash($petty_cash_data);
            $this->session->set_flashdata('flashSuccess', 'Petty cash Added');
            if ($insert) {
                $insert_status = "success";
            } else {
                $insert_status = "failed";
            }
            $data['status'] = $insert_status;
        } else {
            $data['status'] = "no_sufficient_balance";
            $data['balance'] = $check_balance;
        }
        echo json_encode($data);
    }

    function edit($id) {

        $this->template->write_view('content', 'petty_cash/edit_petty_cash');
        $this->template->render();
    }

    function edit_petty_cash_details() {

        $petty_cash_id = $this->input->post("petty_cash_id");
        $transaction_date = $this->input->post('transaction_date');
        $expense_category = $this->input->post('expense_category');
        $details = $this->input->post('details');
        $amount = $this->input->post('amount');
        $expense_type = $this->input->post('expense_type');
        $transaction_type = $this->input->post('transaction_type');

        $previous_entry = $this->petty_cash_model->get_petty_cash_by_id($petty_cash_id);
        $previous_amount = 0;
        if ($previous_entry[0]['transaction_type'] == "1") {
            $previous_amount = $previous_entry[0]['cash_in'];
            $update_organization_amount_previous = $this->petty_cash_model->subtract_organization_amount($previous_amount);
        } else {
            $previous_amount = $previous_entry[0]['cash_out'];
            $update_organization_amount_previous = $this->petty_cash_model->add_organization_amount($previous_amount);
        }

        $updated_date = date('Y-m-d H:i:s');

        $transaction_type = $this->input->post("transaction_type");
        $cash_in = 0;
        $cash_out = 0;
        if ($transaction_type == "1") {
            $cash_in = $amount;
            $cash_out = 0;
            //$update_organization_amount = $this->petty_cash_model->add_organization_amount($amount);
        }
        if ($transaction_type == "2") {
            $cash_in = 0;
            $cash_out = $amount;
            //$update_organization_amount = $this->petty_cash_model->subtract_organization_amount($amount);
        }

        $check_balance = 0;
        $flag = 1;
        if ($transaction_type == "2") {
            $check_balance = $this->petty_cash_model->check_closing_balance($transaction_date);
            if ($check_balance < $amount) {
                $flag = 0;
            }
        }

        if ($flag == 1) {
            $petty_cash_data = array(
                'expense_type' => $expense_type,
                //'amount' => $this->input->post('amount'),
                'expense_id' => $this->input->post('expense_category'),
                //'date' => $this->input->post('transaction_date'),
                'details' => $this->input->post('details'),
                'cash_in' => $cash_in,
                'cash_out' => $cash_out,
                'transaction_type' => $transaction_type,
                'updated_date' => $updated_date
            );

            $insert = $this->petty_cash_model->update_petty_cash($petty_cash_id, $petty_cash_data);
            $this->session->set_flashdata('flashSuccess', 'Petty cash Added');
            if ($insert) {
                $insert_status = "success";
            } else {
                $insert_status = "failed";
            }
            $data['status'] = $insert_status;
        } else {
            $data['status'] = "no_sufficient_balance";
            $data['balance'] = $check_balance;
        }
        echo json_encode($data);
    }

    public function getPettyCashData() {

        $id = $this->input->get("id");

        $data['petty_cash'] = $this->petty_cash_model->get_petty_cash_by_id($id);

        echo json_encode($data);
    }

    public function get_expense_category() {
        $data['expense_category'] = $this->petty_cash_model->get_expense_category();

        echo json_encode($data);
    }

    function delete() {
        $id = $this->input->post("id");
        $data = array('is_deleted' => 1);
        $delete = $this->receipts_model->delete_receipt($id, $data);

        if ($delete == 1) {
            $this->session->set_flashdata('flashSuccess', 'Receipt  deleted!');
            echo '1';
        } else {
            $this->session->set_flashdata('flashError', 'Operation Failed!');

            echo '0';
        }
    }

    function get_receipt_type() {
        $data['receipt_type'] = $this->receipts_model->get_all_receipt_type();
        echo json_encode($data);
    }

    function getNames() {
        $receipt_type = $this->input->get("id");
        $data = array();
        if ($receipt_type == "1") {
            $data['names'] = $this->receipts_model->get_all_user_names();
        }
        if ($receipt_type == "2" || $receipt_type == "5") {
            $data['names'] = $this->receipts_model->get_all_sponsor_names();
        }
        if ($receipt_type == "3" || $receipt_type == "4") {
            $data['names'] = $this->receipts_model->get_all_scholarship_names();
        }

        echo json_encode($data);
    }

    function getProfileImg() {
        $receipt_type = $this->input->get("receipt_type_id");
        $profile_id = $this->input->get("name_id");
        $data = array();
        if ($receipt_type == "1") {
            $data['profile_details'] = $this->receipts_model->get_user_by_id($profile_id);
        }
        if ($receipt_type == "2" || $receipt_type == "5") {
            $data['profile_details'] = $this->receipts_model->get_sponsor_by_id($profile_id);
            $data['sponsor_commitment'] = $this->receipts_model->get_sponsor_commitments($profile_id);
        }
        if ($receipt_type == "3" || $receipt_type == "4") {
            $data['profile_details'] = $this->receipts_model->get_scholarship_by_id($profile_id);
        }

        echo json_encode($data);
    }

    public function getProfile_image() {
        $id = $this->input->post('id');
        $profile_image = $this->members_model->get_profile_img($id);
        if (!empty($profile_image) && is_array($profile_image)) {
            $data['has_img'] = "1";
            $data['name'] = $profile_image;
        } else {
            $data['has_img'] = "0";
        }
        echo json_encode($data);
    }

    public function view($id) {
        $this->template->write_view('content', 'petty_cash/view_petty_cash');
        $this->template->render();
    }

    public function print_receipt($r_id) {
        //$data['receipt_details'] = $this->sales_receipt_model->get_receipt_download_by_id($r_id, $rec_id);
        $this->load->library("Pdf");
        $data_header = array();
        $data = array();

        $id = $r_id;
        $data['receipts'] = $this->receipts_model->get_receipt_by_id($id);
        if ($data['receipts'][0]['receipt_type_id'] == "1") {
            $member_id = $data['receipts'][0]['member_id'];
            $data['users'] = $this->receipts_model->get_member_by_id($member_id);
        }
        if ($data['receipts'][0]['receipt_type_id'] == "2" || $data['receipts'][0]['receipt_type_id'] == "5") {
            $sponsor_id = $data['receipts'][0]['sponsor_details_id'];
            $data['sponsor_details'] = $this->receipts_model->get_sponsor_details_by_id($sponsor_id);
        }
        if ($data['receipts'][0]['receipt_type_id'] == "3" || $data['receipts'][0]['receipt_type_id'] == "4") {
            $scholarship_id = $data['receipts'][0]['scholarship_details_id'];
            $data['scholarship_details'] = $this->receipts_model->get_scholarship_details_by_id($scholarship_id);
        }

        if ($data['receipts'][0]['receipt_type_id'] == "2") {
            $sponsor_id = $data['receipts'][0]['sponsor_details_id'];
            $data['sponsor_commitments'] = $this->receipts_model->get_sponsor_commitments($sponsor_id);
        }

        $header = $this->load->view('receipts/pdf_header_view', $data_header, TRUE);

        $msg = $this->load->view('receipts/receipt_pdf', $data, TRUE);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->AddPage();
        $pdf->SetTitle('Receipt');
        $pdf->Header($header);
        $pdf->writeHTMLCell(0, 0, '', '', $msg, 0, 1, 0, true, '', true);

        $filename = 'Receipt-' . date('d-M-Y-H-i-s') . '.pdf';
        $newFile = $this->config->item('theme_path') . $filename;

        $pdf->Output($newFile);
    }

    public function petty_cash_report() {
        $search_data = $_GET['search'];
        $decode_data = json_decode($search_data);

        $searchString = $decode_data[0]->searchString;

        $from_date = $decode_data[1]->from;
        $to_date = $decode_data[2]->to;

        $data = $this->petty_cash_model->export_all_petty_cash_list($searchString, $from_date, $to_date);


        $this->export_all_petty_cash($data);
        echo json_encode($data);
    }

    function export_all_petty_cash($query, $timezones = array()) {
        // output headers so that the file is downloaded rather than displayed
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Petty_cash.xls");

        $heading = array('S.No', 'Category', 'Expense Type', 'Cash In', 'Cash Out', 'Balance', 'Date');

        echo implode("\t", $heading) . "\n";

        $current_date = "";
        $balance = 0;
        //$heading = false;
        if (!empty($query))
            foreach ($query as $row) {
                if ($current_date == "") {
                    $current_date = $row['petty_cash_date'];
                }

                if ($current_date != $row['petty_cash_date']) {
                    $current_date = $row['petty_cash_date'];
                    $balance = 0;
                }

                if ($row['transaction_type'] == "1" && $row['expense_id'] != "2") {
                    $balance = $balance + $row['cash_in'];
                } else {
                    $balance = $balance - $row['cash_out'];
                }

                if ($row['expense_id'] == "2") {
                    $res_bal = "-";
                } else {
                    $res_bal = number_format((float) $balance, 2, '.', '');
                }
                //print_r($row);
                //array_keys($row)
                //echo implode("\t", array_values($row)) . "\n";
                $petty_cash_date = ($row['petty_cash_date'] != '0000-00-00') ? date('d-M-Y', strtotime($row['petty_cash_date'])) : '-';

                echo $row['serial_number'] . "\t" . $row['expense_category_name'] . "\t" . $row['expenseType'] . "\t" . $row['cash_in'] . "\t" . $row['cash_out'] . "\t" . $res_bal . "\t" . $petty_cash_date . "\n";
            }
        exit;
    }

    public function check_opening_balance($transaction_date = "") {
        $check_opening_balance = $this->petty_cash_model->check_opening_balance($transaction_date);
        $closing_balance = $this->petty_cash_model->get_closing_balance();
        //print_r($check_opening_balance);
        $response = array();
        if (is_array($check_opening_balance) && !empty($check_opening_balance)) {
            $response['result'] = "opening_balance_exists";
        } else {
            $response['result'] = "no_opening_balance";
            $response['closing_balance'] = $closing_balance;
        }
        echo json_encode($response);
    }

    public function check_closing_balance($transaction_date = "") {
        $response['closing_balance'] = $this->petty_cash_model->check_closing_balance($transaction_date);

        echo json_encode($response);
    }

}
