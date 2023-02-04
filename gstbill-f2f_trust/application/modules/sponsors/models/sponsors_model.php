<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sponsors_model extends CI_Model {

    public $table_name = 'sponsor_details';
    private $country = "country";
    private $gender = "gender";
    private $user_permission_table = 'user_type_permission';
    private $user_modules_table = 'user_modules';
    private $user_sections_table = 'user_sections';
    private $country_table = "country";
    private $street_table = "street";
    private $supporting_document = "supporting_documents";
    private $scholarship_remarks = "scholarship_remarks";
    private $receipts = "receipts";
    private $sponsor_commitments = "sponsor_commitments";
    private $dynamic_entry_sponsor = "dynamic_entry_sponsor";
    //var $column_search = array('S.approved_year', 'S.scholarship_id', 'S.student_name', 'S.email', 'S.mobile_no', 'S.course_completed_year', 'S.payment_on_hold', 'S.repayment_completed_year', 'AT.application_type_name', 'CT.course_type_name');
    var $column_search = array('S.sponsor_name', 'S.residing_country', 'C.countries_name', 'S.for_year', 'S.paid', 'S.status');

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_sponsors($searchString, $forYearFrom, $forYearTo, $search_paid) {
        $this->db->select('S.id AS sponsor_id, S.street_name, S.residing_country, S.email, S.landline_no,  S.mobile_no, S.profile_picture,S.sponsor_name, S.gender_id, S.status, S.is_deleted, S.for_year, S.paid, C.countries_name, G.name AS gender_name');
        //$this->db->select('(CASE WHEN S.paid = "1" THEN "yes" ELSE "no" END) AS paid_status');

        $this->db->join($this->country . ' AS C', 'S.residing_country = C.id', 'LEFT');
        $this->db->join($this->gender . ' AS G', 'S.gender_id = G.id', 'LEFT');

        $where = "";
        if ($searchString) {
            $i = 0;
            foreach ($this->column_search as $item) { // loop column
                if ($i == 0) { // first loop
                    $where .="(";
                }
                if ($searchString == "y" || $searchString == "ye" || $searchString == "yes" && $item == "S.paid") {
                    $where .= '' . $item . " like '%1%'";
                } else if ($searchString == "n" || $searchString == "no" && $item == "S.paid") {
                    $where .= '' . $item . " like '%0%'";
                } else if ($searchString == "a" || $searchString == "ac" || $searchString == "act" || $searchString == "acti" || $searchString == "activ" || $searchString == "active" && $item == "S.status") {
                    $where .= '' . $item . " like '%1%'";
                } else if ($searchString == "i" || $searchString == "in" || $searchString == "ina" || $searchString == "inac" || $searchString == "inact" || $searchString == "inacti" || $searchString == "inactiv" || $searchString == "inactive" && $item == "S.status") {
                    $where .= '' . $item . " like '%0%'";
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
        $this->db->where('S.is_deleted', 0);
        if ($forYearFrom != "" && $forYearTo != "") {
            $this->db->where('DATE_FORMAT(S.for_year,"%Y-%m-%d")>=', $forYearFrom);
            $this->db->where('DATE_FORMAT(S.for_year,"%Y-%m-%d")<=', $forYearTo);
        }




        $this->db->order_by("S.id", "desc");
        $query = $this->db->get($this->table_name . ' AS S');
        //echo $this->db->last_query();
        //exit;
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }

        return NULL;
    }

    public function get_all_country() {
        $this->db->select($this->country . '.*');

        $query = $this->db->get($this->country);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    public function get_all_gender() {
        $this->db->select($this->gender . '.*');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        $query = $this->db->get($this->gender);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    public function insert_sponsor($data) {
        if ($this->db->insert($this->table_name, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function update_sponsor_image($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_sponsor_by_id($id) {
        $this->db->select($this->table_name . '.*');
        $this->db->where($this->table_name . '.id', $id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function update_sponsor($data, $id) {
        $data['updated_date'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return TRUE;
        }

        return FALSE;
    }

    function delete_sponsor($id, $data) {

        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return true;
        }

        return false;
    }

    function insert_remark($data) {
        if ($this->db->insert($this->scholarship_remarks, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function get_remarks_by_scholarship($id) {
        $this->db->select($this->scholarship_remarks . '.*');
        $this->db->where($this->scholarship_remarks . '.scholarship_details_id', $id);
        //$this->db->where($this->scholarship_remarks . '.is_deleted = 0');
        $query = $this->db->get($this->scholarship_remarks);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function get_profile_img($id) {
        $this->db->select("id,student_name,profile_picture");
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

    function get_receipt_by_sponsor_id($id) {

        $this->db->select($this->receipts . '.*');
        $this->db->where($this->receipts . '.sponsor_details_id', $id);
        //$this->db->where($this->receipts . '.is_deleted = 0');
        $query = $this->db->get($this->receipts);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function insert_sponsor_commitment($data) {
        if ($this->db->insert($this->sponsor_commitments, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function get_sponsor_commitments_sponsor_id($id) {
        $this->db->select('tab_1.*, tab_2.receipt_no as r_no,tab_1.remarks');
        $this->db->join($this->receipts . ' AS tab_2', 'tab_2.id = tab_1.receipt_no', 'left');
        $this->db->where('tab_1.sponsor_details_id', $id);
        $this->db->where('tab_1.is_deleted = 0');
        $query = $this->db->get($this->sponsor_commitments . ' AS tab_1');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function update_sponsor_commitment($data, $id) {
        $data['updated_date'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        if ($this->db->update($this->sponsor_commitments, $data)) {
            return TRUE;
        }

        return FALSE;
    }

    function delete_commitment_entry($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update($this->sponsor_commitments, $data)) {
            return true;
        }

        return false;
    }

    function update_commitment_in_sponsor($data, $id) {

        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return TRUE;
        }

        return FALSE;
    }

    function insert_sponsor_custom_entry($data) {
        if ($this->db->insert($this->dynamic_entry_sponsor, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function get_dynamic_by_sponsor_id($id) {
        $this->db->select("*");
        $this->db->where("sponsor_id", $id);
        $query = $this->db->get($this->dynamic_entry_sponsor);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function update_sponsor_custom_entry($data, $id) {
        $data['updated_on'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        if ($this->db->update($this->dynamic_entry_sponsor, $data)) {
            return TRUE;
        }

        return FALSE;
    }

    function delete_sponsor_custom_entry($id) {
        $this->db->where('id', $id);
        if ($this->db->delete($this->dynamic_entry_sponsor)) {
            return TRUE;
        }
        return FALSE;
    }

    function get_all_street() {
        $this->db->select($this->street_table . '.*');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        $this->db->order_by('name','asc');
        $query = $this->db->get($this->street_table);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    public function export_all_sponsors_list($searchString, $forYearFrom = "", $forYearTo = "", $search_paid = "") {
        $this->db->select('@acount:=@acount+1 serial_number, S.id AS sponsor_id, S.street_name, S.residing_country, S.email, S.landline_no,  S.mobile_no, S.profile_picture,S.sponsor_name, S.gender_id, S.status, S.is_deleted, S.for_year, S.paid, C.countries_name, G.name AS gender_name', false);
        //$this->db->select('(CASE WHEN S.paid = "1" THEN "yes" ELSE "no" END) AS paid_status');

        $this->db->join($this->country . ' AS C', 'S.residing_country = C.id', 'LEFT');
        $this->db->join($this->gender . ' AS G', 'S.gender_id = G.id', 'LEFT');

        $where = "";
        if ($searchString) {
            $i = 0;
            foreach ($this->column_search as $item) { // loop column
                if ($i == 0) { // first loop
                    $where .="(";
                }
                if ($searchString == "y" || $searchString == "ye" || $searchString == "yes" && $item == "S.paid") {
                    $where .= '' . $item . " like '%1%'";
                } else if ($searchString == "n" || $searchString == "no" && $item == "S.paid") {
                    $where .= '' . $item . " like '%0%'";
                } else if ($searchString == "a" || $searchString == "ac" || $searchString == "act" || $searchString == "acti" || $searchString == "activ" || $searchString == "active" && $item == "S.status") {
                    $where .= '' . $item . " like '%1%'";
                } else if ($searchString == "i" || $searchString == "in" || $searchString == "ina" || $searchString == "inac" || $searchString == "inact" || $searchString == "inacti" || $searchString == "inactiv" || $searchString == "inactive" && $item == "S.status") {
                    $where .= '' . $item . " like '%0%'";
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
        $this->db->where('S.is_deleted', 0);
        if ($forYearFrom != "" && $forYearTo != "") {
            $this->db->where('DATE_FORMAT(S.for_year,"%Y-%m-%d")>=', $forYearFrom);
            $this->db->where('DATE_FORMAT(S.for_year,"%Y-%m-%d")<=', $forYearTo);
        }




        //$this->db->order_by("S.id", "desc");
        $query = $this->db->get("(SELECT @acount:= 0) AS acount," . $this->table_name . ' AS S');
        //echo $this->db->last_query();
        //exit;
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }

        return NULL;
    }
    function validate_commitment_model($for_year,$remarks,$sponsor_id,$commitment_id="") {	
        $this->db->select('*');	
        $this->db->where("is_deleted = 0");	
        $this->db->where("for_year",$for_year);	
        $this->db->where("remarks",$remarks);	
        $this->db->where("sponsor_details_id",$sponsor_id);	
        if($commitment_id!='')	
            $this->db->where("id !=",$commitment_id);  	
        $query = $this->db->get($this->sponsor_commitments)->result_array();	
        return $query;	
         	
    }

}
