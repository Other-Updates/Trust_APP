<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loan_repayment_summary_report extends MX_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->user_auth->is_logged_in()) {
            redirect($this->config->item('base_url') . 'users/login');
        }

        $main_module = 'reports';
        $access_arr = array(
            'loan_repayment_summary_report/index' => array('view'),
            'loan_repayment_summary_report/get_course_type' => 'no_restriction',
            'loan_repayment_summary_report/getLoanRepaymentSummaryReport' => 'no_restriction',
            'loan_repayment_summary_report/get_total_amounts' => 'no_restriction',
            'loan_repayment_summary_report/get_export_loan_repayment_summary_report' => 'no_restriction',
            'loan_repayment_summary_report/export_loan_report' => 'no_restriction',
        );

        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {
            redirect($this->config->item('base_url') . "users/my_profile");
        }
        //$this->load->library(array('session', 'javascript', 'pagination', 'form_validation', 'session_view'));
        $this->load->model('reports/loan_repayment_summary_report_model');
        //$this->template->write_view('session_msg', 'users/session_msg');
        //$data_msg_notify['new_message'] = $this->user_auth->get_new_message();
        //$this->template->write_view('popup', 'users/messageboard_notify', $data_msg_notify);
    }

    function index() {

        $this->template->write_view('content', 'reports/loan_repayment_summary_report');
        $this->template->render();
    }

    function get_course_type() {
        $data['course_type'] = $this->loan_repayment_summary_report_model->get_all_course_type();
        echo json_encode($data);
    }

    function getLoanRepaymentSummaryReport() {
        //$data['data'] = $this->members_model->get_all_members();

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
        $course_type = "";


        if (isset($query['fromDate'])) {
            $from_date = $query['fromDate'];
        }
        if (isset($query["toDate"])) {
            $to_date = $query["toDate"];
        }
        if (isset($query["course_type"])) {
            $course_type = $query["course_type"];
        }



        $data['data'] = $this->loan_repayment_summary_report_model->get_loan_repayment_summary_report($all, $from_date, $to_date, $course_type);

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

    public function get_total_amounts() {

        $from_date = $this->input->post('fromDate');
        $to_date = $this->input->post('toDate');
        $course_type = $this->input->post('course_type');
        $all = $this->input->post("all");

        $data['totalAmount'] = $this->loan_repayment_summary_report_model->get_total_amount($all, $from_date, $to_date, $course_type);

        echo json_encode($data);
    }

    function get_export_loan_repayment_summary_report() {
        $pdf_data=array();
        $search_data = $_GET['search'];
        $decode_data = json_decode($search_data);

        //print_r($decode_data);
        //exit;

        $from_date = $decode_data[0]->from;
        $to_date = $decode_data[1]->to;
        $course_type = $decode_data[2]->course_type;
        $all = $decode_data[3]->all;
        $type = $decode_data[4]->type;

        $pdf_data['loan_and_repayment_details'] =$data = $this->loan_repayment_summary_report_model->get_loan_repayment_summary_report($all, $from_date, $to_date, $course_type);
        $pdf_data['total'] =$total = $this->loan_repayment_summary_report_model->get_total_amount($all, $from_date, $to_date, $course_type);
        if($type=='pdf'){
            $data_header = array();
            $this->load->library("Pdf");
            $header = $this->load->view('receipts/pdf_header_view', $data_header, TRUE);
            $msg = $this->load->view('reports/loan_repayment_summary_pdf', $pdf_data, TRUE);
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->AddPage();
            $pdf->SetTitle('Loan And Repayment Summary Report');
            $pdf->Header($header);
            $pdf->writeHTMLCell(0, 0, '', '', $msg, 0, 1, 0, true, '', true);
            $filename = 'Loan And Repayment Summary Report-' . date('d-M-Y-H-i-s') . '.pdf';
            $newFile = $this->config->item('theme_path') . $filename;
            $pdf->Output($newFile,'D');
        }else{
            $this->export_loan_report($data, $total);
            echo json_encode($data);
        }
    }

    function export_loan_report($query, $total) {


        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Loan-and-Repayment-Summary-report.xls");
        if (!empty($total)) {
            foreach ($total as $row) {
                echo "Total Loan Amount " . "\t" . $row['scholarshipTotal'] . "\t" . "Total Repayment Amount" . "\t" . $row['repaymentTotal'] . "\n";
            }
        }

        $heading = array('S.No', 'Year', 'Total Loan Amount','No Of Application', 'Total Repayment Amount','No Of Repayment Application');

        echo implode("\t", $heading) . "\n";
        //$heading = false;

        $count = 0;
        if (!empty($query))
            foreach ($query as $row) {
                //print_r($row);
                //array_keys($row)
                //echo implode("\t", array_values($row)) . "\n";
                $count++;
                echo $count . "\t" . $row['receipt_year'] . "\t" . $row['scholarshipTotal'] . "\t" . $row['no_of_application'] . "\t". $row['repaymentTotal'] . "\t". $row['no_of_repayment_application'] . "\n";
            }
        exit;
    }

}
