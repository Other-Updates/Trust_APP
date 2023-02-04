<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sponsor_report extends MX_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->user_auth->is_logged_in()) {
            redirect($this->config->item('base_url') . 'users/login');
        }

        $main_module = 'reports';
        $access_arr = array(
            'sponsor_report/index' => array('view'),
            'sponsor_report/get_country_list' => 'no_restriction',
            'sponsor_report/getSponsorReport' => 'no_restriction',
            'sponsor_report/sponsor_excel_report' => 'no_restriction',
            'sponsor_report/export_all_sponsors' => 'no_restriction',
        );

        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {
            redirect($this->config->item('base_url') . "users/my_profile");
        }
        //$this->load->library(array('session', 'javascript', 'pagination', 'form_validation', 'session_view'));
        $this->load->model('reports/sponsor_report_model');
        //$this->template->write_view('session_msg', 'users/session_msg');
        //$data_msg_notify['new_message'] = $this->user_auth->get_new_message();
        //$this->template->write_view('popup', 'users/messageboard_notify', $data_msg_notify);
    }

    function index() {

        $this->template->write_view('content', 'reports/sponsor_report');
        $this->template->render();
    }

    function get_country_list() {
        $data['country'] = $this->subscription_report_model->get_all_country();
        echo json_encode($data);
    }

    function getSponsorReport() {

        $searchQuery = $this->input->post('query');
        $all = "";
        if (isset($searchQuery['all'])) {
            $all = true;
        } else {
            $all = false;
        }

        if ($searchQuery == "") {
            $all = true;
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
        if (isset($query["country"])) {
            $country = $query["country"];
        }

        $data['data'] = $this->sponsor_report_model->get_sponsor_report($all, $from_date, $to_date, $country);

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

    function sponsor_excel_report() {
        $pdf_data=array();
        $search_data = $_GET['search'];
        $decode_data = json_decode($search_data);

        $from_date = $decode_data[0]->from;
        $to_date = $decode_data[1]->to;
        $country = $decode_data[2]->country;
        $all = $decode_data[3]->all;
        $type = $decode_data[4]->type;

        $pdf_data['sponsor_details'] =$data = $this->sponsor_report_model->get_sponsor_report($all, $from_date, $to_date, $country);
        if($type=='pdf'){
            $data_header = array();
            $this->load->library("Pdf");
            $header = $this->load->view('receipts/pdf_header_view', $data_header, TRUE);
            $msg = $this->load->view('reports/sponsor_pdf', $pdf_data, TRUE);
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->AddPage();
            $pdf->SetTitle('Sponsor Report');
            $pdf->Header($header);
            $pdf->writeHTMLCell(0, 0, '', '', $msg, 0, 1, 0, true, '', true);
            $filename = 'Sponsor Report-' . date('d-M-Y-H-i-s') . '.pdf';
            $newFile = $this->config->item('theme_path') . $filename;
            $pdf->Output($newFile,'D');
        }else{
            $this->export_all_sponsors($data);
            echo json_encode($data);
        }
    }

    function export_all_sponsors($query, $timezones = array()) {
        // output headers so that the file is downloaded rather than displayed
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Sponsors_report.xls");

        $heading = array('S.No', 'Sponsor Name', 'Mobile', 'Email', 'Country','Overall Amount Due','Last Commitment Year','Last Commitment Amount','Commitment Due For','Commitment Due Amount', 'Profile Link');

        echo implode("\t", $heading) . "\n";
        if (!empty($query))
            foreach ($query as $row) {
                $last_commitment_year = ($row['last_commitment_year']!="No Commitments"?date('d-m-Y',strtotime($row['last_commitment_year'])):$row['last_commitment_year']);
                echo $row['serial_number'] . "\t" . $row['sponsor_name'] . "\t" . $row['mobile_no'] . "\t" . $row['email'] . "\t" . $row['countries_name'] . "\t" . $row['sponsor_full_amount'] . "\t". $last_commitment_year . "\t". $row['last_commitment_amount'] . "\t". $row['commitment_due_for'] . "\t". $row['commitment_due_amount'] . "\t" . $row['profile_link'] . "\n";
            }
        exit;
    }

}
