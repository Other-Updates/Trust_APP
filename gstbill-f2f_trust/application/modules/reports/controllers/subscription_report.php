<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subscription_report extends MX_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->user_auth->is_logged_in()) {
            redirect($this->config->item('base_url') . 'users/login');
        }

        $main_module = 'reports';
        $access_arr = array(
            'subscription_report/index' => array('view'),
            'subscription_report/get_country_list' => 'no_restriction',
            'subscription_report/getSubscriptionReport' => 'no_restriction',
            'subscription_report/get_export_subscription_report' => 'no_restriction',
            'subscription_report/export_subscription_report' => 'no_restriction',
        );

        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {
            redirect($this->config->item('base_url') . "users/my_profile");
        }
        //$this->load->library(array('session', 'javascript', 'pagination', 'form_validation', 'session_view'));
        $this->load->model('reports/subscription_report_model');
        //$this->template->write_view('session_msg', 'users/session_msg');
        //$data_msg_notify['new_message'] = $this->user_auth->get_new_message();
        //$this->template->write_view('popup', 'users/messageboard_notify', $data_msg_notify);
    }

    function index() {

        $this->template->write_view('content', 'reports/subscription_report');
        $this->template->render();
    }

    function get_country_list() {
        $data['country'] = $this->subscription_report_model->get_all_country();
        echo json_encode($data);
    }

    function getSubscriptionReport() {
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

        if (isset($query['fromDate'])) {
            $from_date = $query['fromDate'];
        }
        if (isset($query["toDate"])) {
            $to_date = $query["toDate"];
        }
        if (isset($query["country"])) {
            $country = $query["country"];
        }


        $data['data'] = $this->subscription_report_model->get_subscription_report($all, $from_date, $to_date, $country);

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

    function get_export_subscription_report() {
        $pdf_data=array();
        $search_data = $_GET['search'];
        $decode_data = json_decode($search_data);

        //print_r($decode_data);
        //exit;

        $from_date = $decode_data[0]->from;
        $to_date = $decode_data[1]->to;
        $country = $decode_data[2]->country;
        $all = $decode_data[3]->all;
        $type = $decode_data[4]->type;

        $pdf_data['subscription_details'] = $data = $this->subscription_report_model->get_subscription_report($all, $from_date, $to_date, $country);
        if($type=='pdf'){	
            $data_header = array();	
            $this->load->library("Pdf");	
            $header = $this->load->view('receipts/pdf_header_view', $data_header, TRUE);	
            $msg = $this->load->view('reports/subscription_pdf', $pdf_data, TRUE);	
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);	
            $pdf->AddPage();	
            $pdf->SetTitle('Subscription Report');	
            $pdf->Header($header);	
            $pdf->writeHTMLCell(0, 0, '', '', $msg, 0, 1, 0, true, '', true);	
            $filename = 'Subscription Report-' . date('d-M-Y-H-i-s') . '.pdf';	
            $newFile = $this->config->item('theme_path') . $filename;	
            $pdf->Output($newFile,'D');	
        }else{
            $this->export_subscription_report($data);
            echo json_encode($data);
        }
    }

    function export_subscription_report($query) {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Subscription-report.xls");

        $heading = array('S.No', 'Name', 'Member Type', 'Country', 'Last Subscription Date', 'Last Subscription Amount', 'Subscription Due', 'Profile Link');

        echo implode("\t", $heading) . "\n";
        //$heading = false;


        if (!empty($query))
            foreach ($query as $row) {
                // print_r($row);
                //array_keys($row)
                //echo implode("\t", array_values($row)) . "\n";
                $last_subscription_year = date('d/m/Y',strtotime($row['last_subscription_year']));
                if($row['last_subscription_year']){
                    $split_date = explode('-',$row['last_subscription_year']);
                    $converted_date =$split_date[0];
                    $current_year = date('Y');
                    if($current_year == $converted_date){
                        $due =  'No Due';
                    }else{
                        $due = $current_year - $converted_date; 
                        if($due > 1)
                            $due =  $due." Years";
                        else
                        $due =  $due. " Year";
                    }
                }else{
                    $due = 'No Due';
                }
                echo $row['serial_number'] . "\t" . $row['name'] . "\t" . $row['member_type_name'] . "\t" . $row['countries_name'] . "\t" . $last_subscription_year . "\t" . $row['last_subscription_amount'] . "\t" . $due . "\t" . $row['profile_link'] . "\n";
            }
        exit;
    }

}
