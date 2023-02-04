<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receipts extends MX_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->user_auth->is_logged_in()) {
            redirect($this->config->item('base_url') . 'users/login');
        }
//        $main_module = 'members';
//        $access_arr = array(
//            'dashboard/index' => array('view'),
//            'dashboard/add' => array('add'),
//            'dashboard/delete' => array('delete'),
//        );
//        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {
//            redirect($this->config->item('base_url'));
//        }

        $this->load->model('receipts/receipts_model');
        //$this->template->write_view('session_msg', 'users/session_msg');
        //$data_msg_notify['new_message'] = $this->user_auth->get_new_message();
        //$this->template->write_view('popup', 'users/messageboard_notify', $data_msg_notify);
    }

    function index() {
        $this->template->write_view('content', 'receipts/receipts_list');
        $this->template->render();
    }

    function getReceipts() {
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

        $data['data'] = $this->receipts_model->get_all_receipts_list($searchString, $from_date, $to_date);

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

        $this->template->write_view('content', 'receipts/add_receipt',$data);
        $this->template->render();
    }

    function check_commitment_amount() {
        $commitment_id = $this->input->post('commitment_id');
        $amount = $this->input->post('amount');
        $validate_amount = $this->receipts_model->get_commitment_id($commitment_id);
        //print_r($validate_amount);
        if ($validate_amount[0]['amount'] != $amount) {
            $data['status'] = "amount_not_match";
        } else {
            $data['status'] = "amount_match";
        }
        echo json_encode($data);
    }

    function add_new_receipt() {
        $post_data = $this->input->post();
        $receipt_no = "";
        $last_row = $this->receipts_model->get_last_receipt_no();

        $last_receipt_no = $last_row[0]['receipt_no'];

        $id_date = date("dmy");
        $id_count = 1;

        $split_id = explode("/", $last_receipt_no);
        if ($split_id[0] == $id_date) {
            $id_count = $split_id[1] + 1;
        }

        $id_count = str_pad($id_count, 3, '0', STR_PAD_LEFT);

        $receipt_no = $id_date . "/" . $id_count;

        $receipt_date = $this->input->post('receipt_date');
        $receipt_type_id = $this->input->post('receipt_type_id');
        $name = $this->input->post('name');
        $amount = $this->input->post('amount');
        $for_year = $this->input->post('for_year');
        $cancelled = $this->input->post('cancelled');
        $cancelled_reason = $this->input->post('cancelled_reason');
        $remark = $this->input->post('remark');

        $created_date = date('Y-m-d H:i:s');

        $member_id = 0;
        $sponsor_details_id = 0;
        $scholarship_details_id = 0;

        if ($receipt_type_id == "1") {
            $member_id = $name;
        }
        if ($receipt_type_id == "2" || $receipt_type_id == "5") {
            $sponsor_details_id = $name;
            $commitment_id = $this->input->post('commitment_id');
        }


        if ($receipt_type_id == "3" || $receipt_type_id == "4") {
            $scholarship_details_id = $name;
        }

       
        $receipt_data = array(
            'receipt_no' => $receipt_no,
            'amount' => $this->input->post('amount'),
            'for_year' => date('Y-m-d',strtotime($this->input->post('for_year'))),
            'name' => $this->input->post('selected_name'),
            'receipt_date' => $this->input->post('receipt_date'),
            'remarks' => ($remark != 'undefined') ? $remark : '',
            'receipt_type_id' => $this->input->post('receipt_type_id'),
            'scholarship_details_id' => $scholarship_details_id,
            'sponsor_details_id' => $sponsor_details_id,
            'member_id' => $member_id,
            'created_date' => $created_date
        );
        $insert = $this->receipts_model->insert_receipt($receipt_data);
        $this->session->set_flashdata('flashSuccess', 'Expense category Added');
        if ($insert) {
            $insert_status = "success";
            if ($receipt_type_id == "5") {
                $update_zakaath_amount = $this->receipts_model->add_zakaath_amount($amount);
            }
            if ($receipt_type_id == "2" || $receipt_type_id == "1" || $receipt_type_id == "4") {
                $update_org_amount = $this->receipts_model->add_organization_amount($amount);
            }
            if ($receipt_type_id == "3") {
                $update_org_amount = $this->receipts_model->subtract_organization_amount($amount);
            }
            if ($receipt_type_id == "4") {
                $check_first_repayment = $this->receipts_model->get_first_repayment($scholarship_details_id);
                $data_update_scholarship = array(	
                    'has_repayments' => "1",	
               );	
                if (is_array($check_first_repayment) && !empty($check_first_repayment)) {
                    if (count($check_first_repayment) == 1) {
                        $data_update_scholarship['repayment_start_year'] = $created_date;
                    }
                    $approved_amount = round($post_data['approved_amount']);
                    $total_paid_amount = round($post_data['paid_amount'] + $post_data['amount']);
                    if($approved_amount == $total_paid_amount)
                        $data_update_scholarship['repayment_completed_year'] = $created_date;
                }
                $update_scholarship = $this->receipts_model->update_scholarship_by_id($scholarship_details_id, $data_update_scholarship);
            }


            if ($receipt_type_id == "1") {
                $data_update_member = array(
                    'last_subscription_year' => $this->input->post('for_year'),
                    'last_subscription_amount' => $amount
                );
                $update_member = $this->receipts_model->update_member_by_id($member_id, $data_update_member);



                $data_subscription_history = array(
                    'member_id' => $member_id,
                    'amount' => $amount,
                    'receipt_id' => $insert,
                    'for_year' => $this->input->post('for_year'),
                    'created_on' => $created_date
                );
                $insert_subscription_history = $this->receipts_model->insert_subscrption_history($data_subscription_history);
            }

            if ($receipt_type_id == "2") {
                $data_update_commitment = array(
                    'paid' => "1",
                    'receipt_no' => $insert,
                        //'amount' => $amount
                );
                $update_commitment = $this->receipts_model->update_commitment_by_id($commitment_id, $data_update_commitment);
            }
        } else {

            $insert_status = "failed";
        }
        $data['status'] = $insert_status;
        echo json_encode($data);
    }

    function edit($id) {

        $this->template->write_view('content', 'receipts/edit_receipt');
        $this->template->render();
    }

    function edit_receipt_details() {

        $post_data = $this->input->post();
        $receipt_id = $this->input->post('receipt_id');
        $receipt_date = $this->input->post('receipt_date');
        $receipt_type_id = $this->input->post('receipt_type_id');
        $name = $this->input->post('name');
        $amount = $this->input->post('amount');
        $for_year = $this->input->post('for_year');
        $cancelled = $this->input->post('cancelled');
        $cancelled_reason = $this->input->post('cancelled_reason');
        $remark = $this->input->post('remark');

        $receipt_details = $this->receipts_model->get_receipt_by_id($receipt_id);
        $oldstatus = $receipt_details[0]['cancelled'];

        $created_date = date('Y-m-d H:i:s');
        $updated_date = date('Y-m-d H:i:s');

        $member_id = 0;
        $sponsor_details_id = 0;
        $scholarship_details_id = 0;

        if ($receipt_type_id == "1") {
            $member_id = $name;
        }
        if ($receipt_type_id == "2" || $receipt_type_id == "5") {
            $sponsor_details_id = $name;
            $commitment_id = $this->input->post('commitment_id');
        }

        if ($receipt_type_id == "3" || $receipt_type_id == "4") {
            $scholarship_details_id = $name;
        }

        $receipt_data = array(
            'amount' => $this->input->post('amount'),
            'cancelled' => $this->input->post('cancelled'),
            'cancelled_reason' => $this->input->post('cancelled_reason'),
            'for_year' => $this->input->post('for_year'),
            'name' => $this->input->post('selected_name'),
            'receipt_date' => $this->input->post('receipt_date'),
            'remarks' => ($this->input->post('remark') != 'undefined') ? $this->input->post('remark') : '',
            'receipt_type_id' => $this->input->post('receipt_type_id'),
            'scholarship_details_id' => $scholarship_details_id,
            'sponsor_details_id' => $sponsor_details_id,
            'member_id' => $member_id,
            'updated_date' => $updated_date
        );

        $update_receipt = $this->receipts_model->update_receipt($receipt_id, $receipt_data);
        $this->session->set_flashdata('flashSuccess', 'Expense category Added');
        if ($update_receipt) {
            $update_status = "success";
            if ($this->input->post('receipt_type_id') == "4") {
                if($cancelled != '1'){
                    $check_first_repayment = $this->receipts_model->get_first_repayment($scholarship_details_id,$receipt_id);
                    $data_update_scholarship = array(	
                        'has_repayments' => "1",	
                );	
                    if (is_array($check_first_repayment) && !empty($check_first_repayment)) {
                        if (count($check_first_repayment) == 1) {
                            $data_update_scholarship['repayment_start_year'] = $created_date;
                        }
                        $approved_amount = round($post_data['approved_amount']);
                        $total_paid_amount = round($post_data['paid_amount'] + $post_data['amount']);
                        if($approved_amount == $total_paid_amount)
                            $data_update_scholarship['repayment_completed_year'] = $created_date;
                    }
                    $update_scholarship = $this->receipts_model->update_scholarship_by_id($scholarship_details_id, $data_update_scholarship);
                }
            }

            if($oldstatus!=$cancelled){
                // if ($cancelled == "1") {
                     if ($receipt_type_id == "5") {
                         if ($cancelled == "1")
                              $update_zakaath_amount = $this->receipts_model->subtract_zakaath_amount($amount);
                         else
                             $update_zakaath_amount = $this->receipts_model->add_zakaath_amount($amount);
                     }
                     if ($receipt_type_id == "2" || $receipt_type_id == "1" || $receipt_type_id == "4") {
                         if ($cancelled == "1")
                             $update_org_amount = $this->receipts_model->subtract_organization_amount($amount);
                         else
                              $update_org_amount = $this->receipts_model->add_organization_amount($amount); 
                     }
                     if ($receipt_type_id == "3") {
                         if ($cancelled == "1"){
                             $update_org_amount = $this->receipts_model->add_organization_amount($amount);
                             $data_update_scholarship = array(
                                 'has_repayments' => "0",
                             );
                         }
                         else{
                             $update_org_amount = $this->receipts_model->subtract_organization_amount($amount);
                             $data_update_scholarship = array(
                                 'has_repayments' => "1",
                             );
                         }
                         $update_scholarship = $this->receipts_model->update_scholarship_by_id($scholarship_details_id, $data_update_scholarship);
                     }
 
                     if ($receipt_type_id == "1") {
                         if ($cancelled == "1"){
                             $data_update_member = array(
                                 'last_subscription_year' => "",
                                 'last_subscription_amount' => "0"
                             );
                         }else{
                             $data_update_member = array(
                                 'last_subscription_year' => $this->input->post('for_year'),
                                 'last_subscription_amount' => $amount
                             );
                         }
                         $update_member = $this->receipts_model->update_member_by_id($member_id, $data_update_member);
 
 
                         if ($cancelled == "1"){
                             $data_subscription_history = array(
                                 'member_id' => $member_id,
                                 'amount' => $amount,
                                 'for_year' => $this->input->post('for_year'),
                                 'created_on' => $created_date
                             );
                         }else{
                             $data_subscription_history = array(
                                 'member_id' => $member_id,
                                 'amount' => $amount,
                                 'for_year' => $this->input->post('for_year'),
                                 'updated_on' => $updated_date
                             );
                         }
 
                         $update_subscription_history = $this->receipts_model->update_subscrption_history($data_subscription_history, $receipt_id);
                     }
 
                     if ($receipt_type_id == "2") {
                         if ($cancelled == "1"){
                             $data_update_commitment = array(
                                 'paid' => "0",
                                 'receipt_no' => $receipt_id,
                                     //'amount' => $amount
                             );
                         }else{
                             $data_update_commitment = array(
                                 'paid' => "1",
                                 'receipt_no' => $receipt_id,
                                     //'amount' => $amount
                             );
                         }
                         $update_commitment = $this->receipts_model->update_commitment_by_id($commitment_id, $data_update_commitment);
                     }
                 //} 
            } else {
                 if ($receipt_type_id == "5") {
                     if ($receipt_details[0]['amount'] > $amount) {
                         $diff_amount = $receipt_details[0]['amount'] - $amount;
                         if($cancelled=='1')
                             $update_zakaath_amount = $this->receipts_model->add_zakaath_amount($diff_amount);
                         else
                              $update_zakaath_amount = $this->receipts_model->subtract_zakaath_amount($diff_amount);
                     } else {
                         $diff_amount = $amount - $receipt_details[0]['amount'];
                         if($cancelled=='1')
                              $update_zakaath_amount = $this->receipts_model->subtract_zakaath_amount($diff_amount);
                         else
                              $update_zakaath_amount = $this->receipts_model->add_zakaath_amount($diff_amount);
                     }
                 }
                 if ($receipt_type_id == "2" || $receipt_type_id == "1" || $receipt_type_id == "4") {
 
                     if ($receipt_details[0]['amount'] > $amount) {
                         $diff_amount = $receipt_details[0]['amount'] - $amount;
                         if($cancelled=='1')
                             $update_org_amount = $this->receipts_model->add_organization_amount($diff_amount);
                         else
                             $update_org_amount = $this->receipts_model->subtract_organization_amount($diff_amount);
                     } else {
                         $diff_amount = $amount - $receipt_details[0]['amount'];
                         if($cancelled=='1')
                             $update_org_amount = $this->receipts_model->subtract_organization_amount($diff_amount);
                         else
                             $update_org_amount = $this->receipts_model->add_organization_amount($diff_amount);
                     }
                 }
                 if ($receipt_type_id == "3") {
                     if ($receipt_details[0]['amount'] > $amount) {
                         $diff_amount = $receipt_details[0]['amount'] - $amount;
                         if($cancelled=='1')
                             $update_org_amount = $this->receipts_model->subtract_organization_amount($diff_amount);
                         else
                             $update_org_amount = $this->receipts_model->add_organization_amount($diff_amount);
                     } else {
                         $diff_amount = $amount - $receipt_details[0]['amount'];
                         if($cancelled=='1')
                             $update_org_amount = $this->receipts_model->add_organization_amount($diff_amount);
                         else
                             $update_org_amount = $this->receipts_model->subtract_organization_amount($diff_amount);
                     }
                     if($cancelled=='1'){
                         $data_update_scholarship = array(
                             'has_repayments' => "0",
                         );
                     }else{
                         $data_update_scholarship = array(
                             'has_repayments' => "1",
                         );
                     }
                     $update_scholarship = $this->receipts_model->update_scholarship_by_id($scholarship_details_id, $data_update_scholarship);
                 }
 
                 if ($receipt_type_id == "1") {
                     if($cancelled=='1'){
                         $data_update_member = array(
                             'last_subscription_year' => "",
                             'last_subscription_amount' => "0"
                         );
                     }else{
                         $data_update_member = array(
                             'last_subscription_year' => $this->input->post('for_year'),
                             'last_subscription_amount' => $amount
                         );
                     }
                     $update_member = $this->receipts_model->update_member_by_id($member_id, $data_update_member);
                     if($cancelled=='1'){
                         $data_subscription_history = array(
                             'member_id' => $member_id,
                             'amount' => $amount,
                             'for_year' => $this->input->post('for_year'),
                             'created_on' => $created_on
                         );
                     }else{
                         $data_subscription_history = array(
                             'member_id' => $member_id,
                             'amount' => $amount,
                             'for_year' => $this->input->post('for_year'),
                             'updated_on' => $updated_date
                         );
                     }
 
                     $insert_subscription_history = $this->receipts_model->update_subscrption_history($data_subscription_history, $receipt_id);
                 }
 
                 if ($receipt_type_id == "2") {
                     $data_update_commitment = array(
                         'paid' => "0",
                         'receipt_no' => "0",
                             //'amount' => $amount
                     );
 
                     $update_commitment = $this->receipts_model->update_commitment_by_receipt($data_update_commitment, $receipt_id);
                     if($cancelled=='1'){
                         $data_update_commitment = array(
                             'paid' => "0",
                             'receipt_no' => $receipt_id,
                                 //'amount' => $amount
                         );
                     }else{
                         $data_update_commitment = array(
                             'paid' => "1",
                             'receipt_no' => $receipt_id,
                                 //'amount' => $amount
                         );
                     }
                     $update_commitment = $this->receipts_model->update_commitment_by_id($commitment_id, $data_update_commitment);
                 }
            }
        } else {

            $update_status = "failed";
        }
        $data['status'] = $update_status;
        echo json_encode($data);
    }

    public function getReceiptData() {

        $id = $this->input->get("id");

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
            $data['sponsor_commitments'] = $details = $this->receipts_model->get_sponsor_commitments($sponsor_id);
            $data['commitment_id']='0';
            foreach($details as $detail){
                if($detail['for_year']==$data['receipts'][0]['for_year']){
                    $data['commitment_id'] = $detail['id'];
                }
            }
        }
        if ($data['receipts'][0]['receipt_type_id'] == "3") {
            $data['receipt_pay'] = $this->receipts_model->getScholarPaid($data['receipts'][0]['receipt_type_id'],$data['receipts'][0]['name'],$data['receipts'][0]['for_year'],$data['receipts'][0]['id']);
        }
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
        $receipt_no = "";	
        $last_row = $this->receipts_model->get_last_receipt_no();	
        $last_receipt_no = $last_row[0]['receipt_no'];	
        $id_date = date("dmy");	
        $id_count = 1;	
        $split_id = explode("/", $last_receipt_no);	
        if ($split_id[0] == $id_date) {	
            $id_count = $split_id[1] + 1;	
        }	
        $id_count = str_pad($id_count, 3, '0', STR_PAD_LEFT);	
        $data['receipt_no'] = $id_date . "/" . $id_count;
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
            $data['names'] = $this->receipts_model->get_all_scholarship_names($receipt_type);
        }

        echo json_encode($data);
    }

    function getProfileImg() {
        $receipt_type = $this->input->get("receipt_type_id");
        $profile_id = $this->input->get("name_id");
        $receipt_id = ($this->input->get("receipt_id")) ?  $this->input->get("receipt_id") : '';
        $data = array();
        if ($receipt_type == "1") {
            $data['profile_details'] = $this->receipts_model->get_user_by_id($profile_id);
        }
        if ($receipt_type == "2" || $receipt_type == "5") {
            $data['profile_details'] = $this->receipts_model->get_sponsor_by_id($profile_id);
            $data['sponsor_commitment'] = $this->receipts_model->get_sponsor_commitments($profile_id,$receipt_type,$receipt_id);
        }
        if ($receipt_type == "3" || $receipt_type == "4") {
            $data['profile_details'] = $this->receipts_model->get_scholarship_by_id($profile_id);
            $for_year = array();
            $foryear =  $data['profile_details']['approved_year'];
            for($i=0;$i<$data['profile_details'][0]['years_sponsored'];$i++){
               $year = date("Y-m-".date("d",$data['profile_details']['approved_year']), strtotime($foryear."+".$i." years"));
               $is_year = '';
               if($receipt_type == '3'){
                    $is_years = $this->receipts_model->check_year_pay($receipt_type,$profile_id,$year,$receipt_id);
                    if($is_years == false)
                        $is_year = $year;
               }
                if($receipt_type == '4')
                    $is_year = $year;
                if($is_year)
                    array_push($for_year,$year);
            }
            $data['for_year'] = $for_year;
        }
        echo json_encode($data);	
    }
    
    function check_payment(){
        $for_year = $this->input->post("for_year");	
        $receipt_type_id = $this->input->post("receipt_type_id");	
        $name = $this->input->post("name");	
        $data = $this->receipts_model->check_payment($for_year,$receipt_type_id,$name);
        echo json_encode($data);
    }
    function getRemarks(){	
        $id = $this->input->get("id");	
        $receipt_id = ($this->input->get("receipt_id")) ? $this->input->get("receipt_id") : null;
        $details = $this->receipts_model->getSponsorRemarks($id,$receipt_id);
        $data['remarks']=$details['remarks'];
        $data['amount']=$details['amount'];
        $data['paidamount']=$details['paidamount'];
        $data['for_year']=$details['for_year'];
        echo json_encode($data);
    }

    function getScholarPaid(){
        $for_year = $this->input->get("year");
        $name = $this->input->get("name");
        $receipt_type_id = $this->input->get("receipt_type_id");
        $receipt_id = ($this->input->get("receipt_id")) ? $this->input->get("receipt_id") : null;
        $details = $this->receipts_model->getScholarPaid($receipt_type_id,$name,$for_year,$receipt_id);
        $data['paidamount']=$details['paidamount'];
        echo json_encode($data);
    }

    function test_mail() {
        $data_email = array();
        $this->load->library('email');
        $config = array(
            'protocol' => 'mail',
            'charset' => 'utf-8',
            'wordwrap' => FALSE,
            'mailtype' => 'html'
        );
        $this->email->initialize($config);
        $data_email = array();
        //$data_email['id'] = urlencode(base64_encode($insert));

        $data_email['name'] = $name;
        $data_email['username'] = $username;
        $data_email['password'] = $password;

        //email template content

        $email = "ftwoftesting@gmail.com";
        $from_email_address = "f2ftestone@gmail.com";
        $from_name = "test";

        $htmlContent .= $this->load->view('members/new_user_mail.php', $data_email, TRUE);
        $this->email->from($from_email_address, $from_name);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($htmlContent);
        $t = $this->email->send();
        if ($t) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function position_history($id) {
        $this->template->write_view('content', 'members/position_history');
        $this->template->render();
    }

    public function getPositionHistory() {

        $id = $this->input->get("id");
        $data['member_data'] = $this->members_model->get_member_by_id($id);
        $data['position_history'] = $this->members_model->get_all_position_history_by_member_id($id);
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
        $this->template->write_view('content', 'receipts/view_receipt');
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

    function receipts_report() {
        $search_data = $_GET['search'];
        $decode_data = json_decode($search_data);

        $searchString = $decode_data[0]->searchString;

        $data = $this->receipts_model->export_all_receipts_list($searchString, $from_date = "", $to_date = "");

        $this->export_all_receipts($data);
        echo json_encode($data);
    }

    function export_all_receipts($query, $timezones = array()) {
        // output headers so that the file is downloaded rather than displayed
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Receipts_list.xls");

        $heading = array('S.No', 'Name', 'Receipt For', 'Amount', 'Receipt Date', 'Cancelled','Remarks');

        echo implode("\t", $heading) . "\n";
        //$heading = false;
        if (!empty($query))
            foreach ($query as $row) {
                //print_r($row);
                //array_keys($row)
                //echo implode("\t", array_values($row)) . "\n";
                $receipt_date = ($row['receipt_date'] != '0000-00-00') ? date('d-M-Y', strtotime($row['receipt_date'])) : '-';
                echo $row['serial_number'] . "\t" . $row['receipt_user_name'] . "\t" . $row['receipt_type_name'] . "\t" . $row['amount'] . "\t" . $receipt_date . "\t" . $row['receiptCancelled'] . "\t" . $row['remarks']. "\n";
            }
        exit;
    }

}
