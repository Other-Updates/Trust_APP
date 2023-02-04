<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loan_report extends MX_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->user_auth->is_logged_in()) {
            redirect($this->config->item('base_url') . 'users/login');
        }

        $main_module = 'reports';
        $access_arr = array(
            'loan_report/index' => array('view'),
            'loan_report/get_course_type' => 'no_restriction',
            'loan_report/getLoanReport' => 'no_restriction',
            'loan_report/get_export_loan_report' => 'no_restriction',
            'loan_report/export_loan_report' => 'no_restriction',
        );

        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {
            redirect($this->config->item('base_url') . "users/my_profile");
        }
        //$this->load->library(array('session', 'javascript', 'pagination', 'form_validation', 'session_view'));
        $this->load->model('reports/loan_report_model');
        //$this->template->write_view('session_msg', 'users/session_msg');
        //$data_msg_notify['new_message'] = $this->user_auth->get_new_message();
        // $this->template->write_view('popup', 'users/messageboard_notify', $data_msg_notify);
    }

    function index() {

        $this->template->write_view('content', 'reports/loan_report');
        $this->template->render();
    }

    function get_course_type() {
        $data['course_type'] = $this->loan_report_model->get_all_course_type();
        echo json_encode($data);
    }

    function getLoanReport() {
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
        $from_course_complete_date = "";
        $to_course_complete_date = "";

        if (isset($query['fromDate'])) {
            $from_date = $query['fromDate'];
        }
        if (isset($query["toDate"])) {
            $to_date = $query["toDate"];
        }
        if (isset($query["course_type"])) {
            $course_type = $query["course_type"];
        }
        if (isset($query["fromCourseCompleteDate"])) {
            $from_course_complete_date = $query["fromCourseCompleteDate"];
        }
        if (isset($query["toCourseCompleteDate"])) {
            $to_course_complete_date = $query["toCourseCompleteDate"];
        }


        $data['data'] = $this->loan_report_model->get_loan_report($all, $from_date, $to_date, $course_type, $from_course_complete_date, $to_course_complete_date);

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

    function get_export_loan_report() {
        $pdf_data=array();
        $search_data = $_GET['search'];
        $decode_data = json_decode($search_data);

        //print_r($decode_data);
        //exit;

        $from_date = $decode_data[0]->from;
        $to_date = $decode_data[1]->to;
        $course_type = $decode_data[2]->course_type;
        $all = $decode_data[3]->all;
        $from_course_complete_date = $decode_data[3]->fromCourseCompleteDate;
        $to_course_complete_date = $decode_data[3]->toCourseCompleteDate;
        $type = $decode_data[6]->type;

        $pdf_data['loan_details'] =$data = $this->loan_report_model->get_loan_report($all, $from_date, $to_date, $course_type, $from_course_complete_date, $to_course_complete_date);

        if($type=='pdf'){
            $data_header = array();
            $this->load->library("Pdf");
            $header = $this->load->view('receipts/pdf_header_view', $data_header, TRUE);
            $msg = $this->load->view('reports/loan_pdf', $pdf_data, TRUE);
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->AddPage();
            $pdf->SetTitle('Loan Report');
            $pdf->Header($header);
            $pdf->writeHTMLCell(0, 0, '', '', $msg, 0, 1, 0, true, '', true);
            $filename = 'Loan Report-' . date('d-M-Y-H-i-s') . '.pdf';
            $newFile = $this->config->item('theme_path') . $filename;
            $pdf->Output($newFile,'D');
        }else{
            $this->export_loan_report($data);
            echo json_encode($data);
        }
    }

    function export_loan_report($query) {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Loan-report.xls");

        $heading = array('S.No','Application Number', 'Name', 'Acadamic Year','App. Date', 'Course Type', 'Course Completed Year','Total Received Amount', 'Repayment Completed Year', 'Profile Link');

        echo implode("\t", $heading) . "\n";
        //$heading = false;


        if (!empty($query))
            foreach ($query as $row) {
                // print_r($row);
                //array_keys($row)
                //echo implode("\t", array_values($row)) . "\n";
                $for_year = ($row['for_year']!=null &&$row['for_year']!='0000-00-00' && $row['for_year']!='1970-01-01')?date('d/m/Y',strtotime($row['for_year'])):'-';
                echo $row['serial_number'] . "\t" . $row['application_number'] . "\t" .$row['student_name'] . "\t" .$for_year . "\t". $row['application_date'] . "\t" . $row['course_type_name'] . "\t" . $row['course_completed_year'] . "\t". $row['received_amount'] . "\t" . $row['repayment_completed_year'] . "\t" . $row['profile_link'] . "\n";
            }
        exit;
    }

}
