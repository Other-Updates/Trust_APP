<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receipts_model extends CI_Model {

    public $table_name = 'receipts';
    private $receipt_type = "receipt_type";
    private $user_permission_table = 'user_type_permission';
    private $user_modules_table = 'user_modules';
    private $user_sections_table = 'user_sections';
    private $country_table = "country";
    private $users = "users";
    private $sponsor_details = "sponsor_details";
    private $scholarship_details = "scholarship_details";
    private $zakaathamount = "zakaathamount";
    private $organization_amount = "organization_amount";
    private $sponsor_commitments = "sponsor_commitments";
    private $subscription_history = "subscription_history";
    var $column_search = array('R.receipt_no', 'R.receipt_date', 'R.name', 'R.for_year', 'R.cancelled', 'RT.name', 'R.amount');

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_receipts() {
        $this->db->select($this->table_name . '.*');
        $this->db->where($this->table_name . '.is_deleted', 0);
        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return NULL;
    }

    function get_all_receipts_list($searchString, $from_date = "", $to_date = "") {

        $this->db->select('R.id AS receipt_id, R.name AS receipt_user_name, R.receipt_type_id AS receipt_type_id, R.amount,R.receipt_date,R.scholarship_details_id,R.sponsor_details_id,R.member_id,R.created_date,R.updated_date, R.cancelled, RT.name AS receipt_type_name');
        $this->db->select('(CASE WHEN R.remarks = "" THEN "-" ELSE R.remarks END) AS remarks');
        $this->db->join($this->receipt_type . ' AS RT', 'R.receipt_type_id = RT.id', 'LEFT');

        // $this->db->join($this->users . ' AS U', '(R.receipt_type_id = "1") AND (U.id = R.member_id)', 'LEFT');
        // $this->db->join($this->sponsor_details . ' AS S', 'R.receipt_type_id = 2 AND S.id = R.sponsor_details_id', 'LEFT');
        // $this->db->join($this->scholarship_details . ' AS Sch', 'R.receipt_type_id = 3 AND Sch.id = R.scholarship_details_id', 'LEFT');

        $where = "";
        if ($searchString) {
            $i = 0;
            foreach ($this->column_search as $item) { // loop column
                if ($i == 0) { // first loop
                    $where .="(";
                }
                if ($searchString == "y" || $searchString == "ye" || $searchString == "yes") {
                    $where .= '' . $item . " = '1'";
                } else if ($searchString == "n" || $searchString == "no") {
                    $where .= '' . $item . " = '0'";
                } else {
                    $where .= '' . $item . " like '%" . $searchString . "%'";
                }
                if ((count($this->column_search) - 1) != $i)
                    $where .= ' OR ';
                if ((count($this->column_search) - 1) == $i)
                    $where .= ")";

                $i++;
            }
        }

        if ($where != '')
            $this->db->where($where);
        //$this->db->where('R.is_deleted', 0);
        if ($from_date != "" && $to_date != "") {
            $this->db->where('DATE_FORMAT(R.receipt_date,"%Y-%m-%d")>=', $from_date);
            $this->db->where('DATE_FORMAT(R.receipt_date,"%Y-%m-%d")<=', $to_date);
        }

        $this->db->order_by("R.id", "desc");
        $query = $this->db->get($this->table_name . ' AS R');

        if ($query->num_rows() > 0) {

            //echo $this->db->last_query();
            //exit;

            return $query->result_array();
        }

        return NULL;
    }

    function insert_receipt($data) {
        if ($this->db->insert($this->table_name, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function update_receipt($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_member_by_id($id) {

        $this->db->select($this->users . '.*');
        $this->db->where($this->users . '.id', $id);
        $query = $this->db->get($this->users);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function get_all_receipt_type() {
        $this->db->select($this->receipt_type . '.*');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        $query = $this->db->get($this->receipt_type);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_all_user_names() {

        $this->db->select($this->users . '.name, id');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        $this->db->where("is_new_user = 0");
        $query = $this->db->get($this->users);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_all_sponsor_names() {
        $this->db->select($this->sponsor_details . '.sponsor_name as name, id');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        $query = $this->db->get($this->sponsor_details);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_all_scholarship_names($receipt_type=null) {
        $this->db->select($this->scholarship_details . '.student_name as name, id');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        if($receipt_type == 4){
            //$this->db->where("has_repayments = 1");
            $this->db->where("application_type_id = 2");
        }
        if($receipt_type == 3){
            $this->db->where("course_completed_year = 0000-00-00");
            $this->db->where("payment_on_hold = 0");
        }
        $query = $this->db->get($this->scholarship_details);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_user_by_id($id) {
        $this->db->select($this->users . '.name, id,profile_picture');
        $this->db->where("id = " . $id);
        $query = $this->db->get($this->users);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_sponsor_by_id($id) {
        $this->db->select($this->sponsor_details . '.sponsor_name as name, '.$this->sponsor_details.'.id,profile_picture,SUM(SD.amount) as approved_amount');
        $this->db->join($this->sponsor_commitments . ' AS SD', $this->sponsor_details.'.id = SD.sponsor_details_id', 'LEFT',false);
        $this->db->where($this->sponsor_details.".id = " . $id);
        $this->db->group_by($this->sponsor_details.'.id');
        $query = $this->db->get($this->sponsor_details);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_scholarship_by_id($id) {
        $this->db->select($this->scholarship_details . '.student_name as name, id, profile_picture,approved_amount,scholarship_id,years_sponsored,approved_year');
        $this->db->where("id = " . $id);
        $query = $this->db->get($this->scholarship_details);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_profile_img($id) {
        $this->db->select("id,name,profile_picture");
        //$this->db->where("status = 1");
        //$this->db->where("is_deleted = 0");
        $this->db->where("id", $id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_last_receipt_no() {
        $this->db->select($this->table_name . '.*');
        $this->db->order_by("id", "desc");
        $this->db->limit("1");
        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return NULL;
    }

    function add_zakaath_amount($amount) {
        $date = date("Y-m-d");
        $query = $this->db->query("UPDATE " . $this->zakaathamount . " SET amount = amount + " . $amount . ", updated_date = '" . $date . "' WHERE id = 1");

        if ($query) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    function subtract_zakaath_amount($amount) {
        $date = date("Y-m-d");
        $query = $this->db->query("UPDATE " . $this->zakaathamount . " SET amount = amount - " . $amount . ", updated_date = '" . $date . "' WHERE id = 1");

        if ($query) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    function add_organization_amount($amount) {
        $date = date("Y-m-d");
        $query = $this->db->query("UPDATE " . $this->organization_amount . " SET amount = amount + " . $amount . ", updated_date = '" . $date . "' WHERE id = 1");


        if ($query) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    function subtract_organization_amount($amount) {
        $date = date("Y-m-d");
        $query = $this->db->query("UPDATE " . $this->organization_amount . " SET amount = amount - " . $amount . ", updated_date = '" . $date . "' WHERE id = 1");


        if ($query) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    function check_year_pay($receipt_type,$profile_id,$year,$receipt_id=null){
        $this->db->select('R.for_year');
        $this->db->where('R.receipt_type_id',$receipt_type);
        $this->db->where('R.scholarship_details_id',$profile_id);
        $this->db->where('R.for_year !=','');
        $this->db->where('R.for_year =',$year);
        $this->db->where('R.cancelled =','0');
        if($receipt_id)
            $this->db->where('R.id !=',$receipt_id);
        $check_year_pay=$this->db->get($this->table_name.' AS R')->result_array();
        if(count($check_year_pay) > 0)
            return true;
        else
            return false;
    }
    function get_sponsor_commitments($id,$receipt_type=null,$receipt_id='') {
        $paid_year='';
        if($receipt_type != null){
            $this->db->select('R.for_year,sum(R.amount) as paid_amount,sc.amount as approved_amount');
            $this->db->join($this->sponsor_commitments.' as sc','R.sponsor_details_id=sc.sponsor_details_id and R.for_year = sc.for_year','left',false);
            $this->db->where('R.receipt_type_id',$receipt_type);
            $this->db->where('R.sponsor_details_id',$id);
            $this->db->where('R.for_year !=','');
            $this->db->where('R.cancelled =','0');
            if($receipt_id)
                $this->db->where('R.id !=',$receipt_id);
            $this->db->group_by('R.for_year');
            $this->db->having('approved_amount<=paid_amount','',false);
            $get_paid_year_details=$this->db->get($this->table_name.' AS R')->result_array();
            
            $paid_year = array_map(function($get_paid_year_details){
                return $get_paid_year_details['for_year'];
            },$get_paid_year_details);
        }
        $this->db->select($this->sponsor_commitments . '.*');
        $this->db->where($this->sponsor_commitments . '.sponsor_details_id', $id);
        $this->db->where($this->sponsor_commitments . '.is_deleted = 0');
        if($paid_year){
            $this->db->where_not_in($this->sponsor_commitments . '.for_year',$paid_year);
        }
        $query = $this->db->get($this->sponsor_commitments);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function getSponsorRemarks($id,$receipt_id=null){	
        $this->db->select('SC.remarks,SC.amount,SUM(R.amount) as paidamount,SC.for_year');	
        $this->db->join($this->table_name . ' AS R', 'R.sponsor_details_id = SC.sponsor_details_id and R.for_year = SC.for_year and R.cancelled="0"', 'LEFT',false);
        $this->db->where('SC.id', $id);	
        $this->db->where('SC.is_deleted = 0');	
        if($receipt_id != null)
            $this->db->where('R.id !=',$receipt_id);
        $this->db->group_by('SC.sponsor_details_id');	
        $query = $this->db->get($this->sponsor_commitments.' AS SC');	
        if ($query->num_rows() > 0) {	
            $data =  $query->row_array();	
            return $data;	
        }	
        return NULL;	
    }

    function getScholarPaid($receipt_type_id,$name,$year,$receipt_id=null){
        $this->db->select('SUM(receipts.amount) as paidamount');
        $this->db->where('name',$name);
        $this->db->where('cancelled','0');
        $this->db->where('receipt_type_id',$receipt_type_id);
        if($receipt_type_id == '2' || $receipt_type_id == '3')
             $this->db->where('for_year =',$year);
        else
            $this->db->where('for_year !=','');
        if($receipt_id != null)
            $this->db->where('id !=',$receipt_id);
        $query=$this->db->get('receipts')->row_array();
        if ($query) {		
            return $query;	
        }	
        return NULL;
    }

    function check_payment($for_year,$receipt_type_id,$name,$receipt_id=null){
        $date_explode=explode('-',$for_year);
        $year = $date_explode[0];
        $this->db->select('SUM(receipts.amount) as paidamount');
        $this->db->where("DATE_FORMAT(receipts.for_year,'%Y') ='" . $year . "'");
        $this->db->where('name',$name);
        $this->db->where('cancelled','0');
        $this->db->where('receipt_type_id',$receipt_type_id);
        if($receipt_id != null)
            $this->db->where('id !=',$receipt_id);
        $query=$this->db->get('receipts')->row_array();
        if ($query['paidamount']!=''&&$query['paidamount']!=NULl) {		
            return true;	
        }	
        return false;
    }

    function update_member_by_id($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update($this->users, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update_scholarship_by_id($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update($this->scholarship_details, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update_commitment_by_id($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update($this->sponsor_commitments, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update_commitment_by_receipt($data, $receipt_id) {
        $this->db->where('receipt_no', $receipt_id);
        if ($this->db->update($this->sponsor_commitments, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function insert_subscrption_history($data_subscription_history) {

        if ($this->db->insert($this->subscription_history, $data_subscription_history)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function update_subscrption_history($data_subscription_history, $receipt_id) {
        $this->db->where('receipt_id', $receipt_id);
        if ($this->db->update($this->subscription_history, $data_subscription_history)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function get_receipt_by_id($id) {
        $this->db->select($this->table_name . '.*');
        $this->db->where($this->table_name . '.id', $id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function get_sponsor_details_by_id($id) {
        $this->db->select($this->sponsor_details . '.*');
        $this->db->where("id = " . $id);
        $query = $this->db->get($this->sponsor_details);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_commitment_id($id) {
        $this->db->select($this->sponsor_commitments . '.*');
        $this->db->where($this->sponsor_commitments . '.id', $id);
        $query = $this->db->get($this->sponsor_commitments);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function get_scholarship_details_by_id($id) {
        $this->db->select($this->scholarship_details . '.*');
        $this->db->where("id = " . $id);
        $query = $this->db->get($this->scholarship_details);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function delete_receipt($id, $data) {

        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return true;
        }

        return false;
    }

    function get_first_repayment($scholarship_details_id,$receipt_id=null) {
        $this->db->select($this->table_name . '.*');
        $this->db->where($this->table_name . '.receipt_type_id', 4);
        $this->db->where($this->table_name . '.scholarship_details_id', $scholarship_details_id);
        $this->db->where($this->table_name . '.cancelled', 0);
        if($receipt_id != null)
            $this->db->where($this->table_name . '.id !=', $receipt_id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function export_all_receipts_list($searchString, $from_date = "", $to_date = "") {

        $this->db->select('@acount:=@acount+1 serial_number, R.id AS receipt_id, R.name AS receipt_user_name, R.receipt_type_id AS receipt_type_id, R.amount,R.receipt_date,R.scholarship_details_id,R.sponsor_details_id,R.member_id,R.created_date,R.updated_date, R.cancelled, RT.name AS receipt_type_name', false);
        $this->db->select("(CASE WHEN (R.cancelled = 1) THEN 'Yes' WHEN (R.cancelled = 0) THEN 'No' END) AS receiptCancelled", false);
        $this->db->select('(CASE WHEN R.remarks = "" THEN "-" ELSE R.remarks END) AS remarks');
        $this->db->join($this->receipt_type . ' AS RT', 'R.receipt_type_id = RT.id', 'LEFT');

        $where = "";
        if ($searchString) {
            $i = 0;
            foreach ($this->column_search as $item) { // loop column
                if ($i == 0) { // first loop
                    $where .="(";
                }
                if ($searchString == "y" || $searchString == "ye" || $searchString == "yes") {
                    $where .= '' . $item . " = '1'";
                } else if ($searchString == "n" || $searchString == "no") {
                    $where .= '' . $item . " = '0'";
                } else {
                    $where .= '' . $item . " like '%" . $searchString . "%'";
                }
                if ((count($this->column_search) - 1) != $i)
                    $where .= ' OR ';
                if ((count($this->column_search) - 1) == $i)
                    $where .= ")";

                $i++;
            }
        }

        if ($where != '')
            $this->db->where($where);
        //$this->db->where('R.is_deleted', 0);
        if ($from_date != "" && $to_date != "") {
            $this->db->where('DATE_FORMAT(R.receipt_date,"%Y-%m-%d")>=', $from_date);
            $this->db->where('DATE_FORMAT(R.receipt_date,"%Y-%m-%d")<=', $to_date);
        }

        //$this->db->order_by("R.id", "desc");
        $query = $this->db->get("(SELECT @acount:= 0) AS acount," . $this->table_name . ' AS R');

        if ($query->num_rows() > 0) {

            //echo $this->db->last_query();
            //exit;

            return $query->result_array();
        }

        return NULL;
    }

}
