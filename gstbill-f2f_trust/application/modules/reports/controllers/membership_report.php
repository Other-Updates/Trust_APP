<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Membership_report extends MX_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->user_auth->is_logged_in()) {
            redirect($this->config->item('base_url') . 'users/login');
        }

        $main_module = 'reports';
        $access_arr = array(
            'membership_report/index' => array('view'),
            'membership_report/get_country_list' => 'no_restriction',
            'membership_report/getMembershipReport' => 'no_restriction',
            'membership_report/get_export_membership_report' => 'no_restriction',
            'membership_report/export_mempership_report' => 'no_restriction',
        );

        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {
            redirect($this->config->item('base_url') . "users/my_profile");
        }
        $this->load->model('reports/membership_report_model');
    }

    function index() {

        $this->template->write_view('content', 'reports/membership_report');
        $this->template->render();
    }

    function get_country_list() {
        $data['country'] = $this->membership_report_model->get_all_country();
        echo json_encode($data);
    }

    function getMembershipReport() {
        
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

        if (isset($query["membership_type"])) {
            $membership_type = $query["membership_type"];
        }


        $data['data'] = $this->membership_report_model->get_membership_report($all,$from_date, $to_date, $country,$membership_type);

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

    function get_export_membership_report() {
        $pdf_data=array();
        $search_data = $_GET['search'];
        $decode_data = json_decode($search_data);

        //print_r($decode_data);
        //exit;

        $from_date = $decode_data[0]->from;
        $to_date = $decode_data[1]->to;
        $country = $decode_data[2]->country;
        $membership_type = $decode_data[3]->membership_type;
        $all = $decode_data[4]->all;
        $type = $decode_data[5]->type;

        $pdf_data['membership_details'] = $data = $this->membership_report_model->get_membership_report($all, $from_date, $to_date, $country,$membership_type);
       
        if($type=='pdf'){
            $data_header = array();
            $this->load->library("Pdf");
            $header = $this->load->view('receipts/pdf_header_view', $data_header, TRUE);
            $msg = $this->load->view('reports/membership_pdf', $pdf_data, TRUE);
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->AddPage();
            $pdf->SetTitle('Membership Report');
            $pdf->Header($header);
            $pdf->writeHTMLCell(0, 0, '', '', $msg, 0, 1, 0, true, '', true);
            $filename = 'Membership Report-' . date('d-M-Y-H-i-s') . '.pdf';
            $newFile = $this->config->item('theme_path') . $filename;
            $pdf->Output($newFile,'D');
        }else{
            $this->export_membership_report($data);
            echo json_encode($data);
        }
    }

    function export_membership_report($query) {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Membership-report.xls");

        $heading = array('S.No', 'Name', 'Member Type','Type Of Membership','Member Since', 'Country', 'Email ID', 'Mobile', 'Last Subscription','Status', 'Profile Link');

        echo implode("\t", $heading) . "\n";
        //$heading = false;


        if (!empty($query))
            foreach ($query as $row) {
                // print_r($row);
                //array_keys($row)
                //echo implode("\t", array_values($row)) . "\n";
                $member_since = '-';
                if($row['member_since'] && $row['member_since'] != null && $row['member_since'] != '0000-00-00'){
                    $member_since = date('d/m/Y',strtotime($row['member_since']));
                }
                $status=$row['status']=='1'?'Active':($row['status']=='2'?'Died':'In Active');
                echo $row['serial_number'] . "\t" . $row['name'] . "\t" . $row['member_type_name'] . "\t". $row['type_of_membership'] . "\t". $member_since . "\t" . $row['countries_name'] . "\t" . $row['email'] . "\t" . $row['mobile_number'] . "\t" . $row['last_subscription_year'] . "\t" . $status . "\t". $row['profile_link'] . "\n";
            }
        exit;
    }

}
