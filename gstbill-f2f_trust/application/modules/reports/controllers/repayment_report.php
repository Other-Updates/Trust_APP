<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Repayment_report extends MX_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->user_auth->is_logged_in()) {
            redirect($this->config->item('base_url') . 'users/login');
        }

        $main_module = 'reports';
        $access_arr = array(
            'repayment_report/index' => array('view'),
            'repayment_report/get_course_list' => 'no_restriction',
            'repayment_report/getrepaymentReport' => 'no_restriction',
            'repayment_report/get_export_repayment_report' => 'no_restriction',
            'repayment_report/export_repayment_report' => 'no_restriction',
        );

        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {
            redirect($this->config->item('base_url') . "users/my_profile");
        }
        //$this->load->library(array('session', 'javascript', 'pagination', 'form_validation', 'session_view'));
        $this->load->model('reports/repayment_report_model');
        //$this->template->write_view('session_msg', 'users/session_msg');
        //$data_msg_notify['new_message'] = $this->user_auth->get_new_message();
        //$this->template->write_view('popup', 'users/messageboard_notify', $data_msg_notify);
    }

    function index() {

        $this->template->write_view('content', 'reports/repayment_report');
        $this->template->render();
    }

    function get_course_list() {
        $data['course'] = $this->repayment_report_model->get_all_course();
        echo json_encode($data);
    }

    function getrepaymentReport() {
        //$data['data'] = $this->members_model->get_all_members();

        $searchQuery = $this->input->post('query');
        $all = "";
        if (isset($searchQuery['all'])) {
            $all = true;
        } else {
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
        if (isset($query["courseType"])) {
            $course_type = $query["courseType"];
        }

        $data['data'] = $this->repayment_report_model->get_repayment_report($all, $from_date, $to_date, $course_type);



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

    function get_export_repayment_report() {
        $pdf_data=array();
        $search_data = $_GET['search'];
        $decode_data = json_decode($search_data);



        $from_date = $decode_data[0]->from;
        $to_date = $decode_data[1]->to;
        $course_type = $decode_data[2]->course_type;
        $all = $decode_data[3]->all;
        $type = $decode_data[4]->type;

        $pdf_data['repayment_details']=$data = $this->repayment_report_model->get_repayment_report($all, $from_date, $to_date, $course_type);

        if($type=='pdf'){
            $data_header = array();
            $this->load->library("Pdf");
            $header = $this->load->view('receipts/pdf_header_view', $data_header, TRUE);
            $msg = $this->load->view('reports/repayment_pdf', $pdf_data, TRUE);
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->AddPage();
            $pdf->SetTitle('Repayment Report');
            $pdf->Header($header);
            $pdf->writeHTMLCell(0, 0, '', '', $msg, 0, 1, 0, true, '', true);
            $filename = 'Loan Repayment Report-' . date('d-M-Y-H-i-s') . '.pdf';
            $newFile = $this->config->item('theme_path') . $filename;
            $pdf->Output($newFile,'D');
        }else{
            $this->export_repayment_report($data);
            echo json_encode($data);
        }
    }

    function export_repayment_report($query) {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Loan Repayment Report.xls");

        $heading = array('S.No','Application Number', 'Student Name', 'Application Date', 'Course Completed Year', 'Course Type', 'Repayment Completed Year','Repayment Amount','Repayment Date', 'Profile Link');

        echo implode("\t", $heading) . "\n";
        //$heading = false;


        if (!empty($query))
            foreach ($query as $row) {
                // print_r($row);
                //array_keys($row)
                //echo implode("\t", array_values($row)) . "\n";
                $repayment_date=($row['repayment_date']!='0000:00:00'&&$row['repayment_date']!="")?date('d-m-Y',strtotime($row['repayment_date'])):'-';
                echo $row['serial_number'] . "\t" .$row['application_number'] . "\t" . $row['student_name'] . "\t" . $row['application_date'] . "\t" . $row['course_completed_year'] . "\t" . $row['course_name'] . "\t" . $row['repayment_completed_year'] . "\t". $row['repayment_amount'] . "\t". $repayment_date . "\t" . $row['profile_link'] . "\n";
            }
        exit;
    }

}
