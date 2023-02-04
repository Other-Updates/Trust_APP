<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Scholarship_model extends CI_Model {

    public $table_name = 'scholarship_details';
    private $application_type = "application_type";
    private $course_type = "course_type";
    private $gender = "gender";
    private $user_permission_table = 'user_type_permission';
    private $user_modules_table = 'user_modules';
    private $user_sections_table = 'user_sections';
    private $country_table = "country";
    private $street_table = "street";
    private $supporting_document = "supporting_documents";
    private $scholarship_remarks = "scholarship_remarks";
    private $zakaathamount = "zakaathamount";
    private $zakaathamount_scholarship_history = "zakaathamount_scholarship_history";
    private $members = "users";
    private $dynamic_entry_scholarship = "dynamic_entry_scholarship";
    //var $column_search = array('S.approved_year', 'S.scholarship_id', 'S.student_name', 'S.email', 'S.mobile_no', 'S.course_completed_year', 'S.payment_on_hold', 'S.repayment_completed_year', 'AT.application_type_name', 'CT.course_type_name');
    var $column_search = array('S.scholarship_id', 'S.student_name', 'S.mobile_no', 'AT.name', 'CT.name', 'S.approved_year', 'S.repayment_completed_year', 'S.course_completed_year', 'S.payment_on_hold', 'S.status');

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //public function get_all_scholarships($searchString, $approvedYearFrom, $approvedYearTo, $repaymentYearFrom, $repaymentYearTo, $courseCompletedYearFrom, $courseCompletedYearTo, $application_type, $payment_on_hold, $course_type) {
    public function get_all_scholarships($searchString, $approvedYear = "", $repaymentYear = "", $courseCompletedYear = "",$applicationDate="", $application_type, $payment_on_hold, $course_type) {
        $this->db->select('S.id AS scholarship_primary_id, S.scholarship_id, S.application_date, S.approved_amount, S.approved_year, S.student_name, S.email, S.mobile_no,GT.name as gender,S.dob,S.years_sponsored,S.address,S.college_name,S.college_address,S.profile_picture,S.application_type_id, S.course_completed_year, S.course_type_id, S.payment_on_hold, S.repayment_completed_year, S.status, S.is_deleted,AT.name AS application_type_name, CT.name AS course_type_name');
        $this->db->join($this->application_type . ' AS AT', 'S.application_type_id = AT.id', 'LEFT');
        $this->db->join($this->course_type . ' AS CT', 'S.course_type_id = CT.id', 'LEFT');
        $this->db->join($this->gender . ' AS GT', 'S.gender_id = GT.id', 'LEFT');

        $where = "";
        if ($searchString) {
            $i = 0;
            foreach ($this->column_search as $item) { // loop column
                if ($i == 0) { // first loop
                    $where .="(";
                }
                if ($searchString == "y" || $searchString == "ye" || $searchString == "yes" && $item == "S.payment_on_hold") {
                    $where .= '' . $item . " like '%1%'";
                } else if ($searchString == "n" || $searchString == "no" && $item == "S.payment_on_hold") {
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
         if ($approvedYear != "") {
            $this->db->where('DATE_FORMAT(S.approved_year,"%Y") =', $approvedYear);
           // $where_approved_yr = 'S.approved_year' . " like '%" . $approvedYear . "%'";
            //$this->db->where($where_approved_yr);
       }
       if ($courseCompletedYear != "") {
            $this->db->where('DATE_FORMAT(S.course_completed_year,"%Y") =', $courseCompletedYear);
            //$where_cc_yr = 'S.course_completed_year' . " like '%" . $courseCompletedYear . "%'";
            //$this->db->where($where_cc_yr);
        }
        if ($applicationDate != "") {
            $this->db->where('DATE_FORMAT(S.application_date,"%Y-%m-%d") =', $applicationDate);
           // $where_application_date = 'S.application_date' . " like '%" . $applicationDate . "%'";
            //$this->db->where($where_application_date);
        }
        //echo $approvedYear;
//        if ($approvedYear != "") {
//            $where_approved_yr = 'S.approved_year' . " like '%" . $approvedYear . "%'";
//            $this->db->where($where);
//        }
//        if ($approvedYearFrom != "" && $approvedYearTo != "") {
//            $this->db->where('DATE_FORMAT(S.approved_year,"%Y-%m-%d")>=', $approvedYearFrom);
//            $this->db->where('DATE_FORMAT(S.approved_year,"%Y-%m-%d")<=', $approvedYearTo);
//        }
//
//        if ($repaymentYearFrom != "" && $repaymentYearTo != "") {
//            $this->db->where('DATE_FORMAT(S.repayment_completed_year,"%Y-%m-%d")>=', $repaymentYearFrom);
//            $this->db->where('DATE_FORMAT(S.repayment_completed_year,"%Y-%m-%d")<=', $repaymentYearTo);
//        }
//
//        if ($courseCompletedYearFrom != "" && $courseCompletedYearTo != "") {
//            $this->db->where('DATE_FORMAT(S.course_completed_year,"%Y-%m-%d")>=', $courseCompletedYearFrom);
//            $this->db->where('DATE_FORMAT(S.course_completed_year,"%Y-%m-%d")<=', $courseCompletedYearTo);
//        }
        if ($application_type != "") {
            $this->db->where('S.application_type_id =', $application_type);
        }
        if ($payment_on_hold != "") {
            $this->db->where('S.payment_on_hold =', $payment_on_hold);
        }
        if ($course_type != "") {
            $this->db->where('S.course_type_id =', $course_type);
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

    public function get_all_application_type() {
        $this->db->select($this->application_type . '.*');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        $query = $this->db->get($this->application_type);
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

    public function get_all_course_type() {
        $this->db->select($this->course_type . '.*');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        $query = $this->db->get($this->course_type);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    public function insert_scholarship($data) {
        if ($this->db->insert($this->table_name, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function update_scholarship_image($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_scholarship_by_id($id) {
        $this->db->select($this->table_name . '.*');
        $this->db->where($this->table_name . '.id', $id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function get_supporting_doc_by_scholarship($id) {
        $this->db->select($this->supporting_document . '.*');
        $this->db->where($this->supporting_document . '.scholarship_details_id', $id);
        $this->db->where($this->supporting_document . '.is_deleted = 0');
        $query = $this->db->get($this->supporting_document);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function get_supporting_doc_by_id($id) {
        $this->db->select($this->supporting_document . '.*');
        $this->db->where($this->supporting_document . '.id', $id);
        $this->db->where($this->supporting_document . '.is_deleted = 0');
        $query = $this->db->get($this->supporting_document);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function update_scholarship($data, $id) {
        $data['updated_date'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return TRUE;
        }

        return FALSE;
    }

    function delete_scholarship($id, $data) {

        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return true;
        }

        return false;
    }

    function get_last_iqra_id() {
        $this->db->select($this->table_name . '.*');
        $this->db->order_by("id", "desc");
        $this->db->limit("1");
        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return NULL;
    }

    function insert_supporting_document($data) {
        if ($this->db->insert($this->supporting_document, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function delete_supporting_doc($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update($this->supporting_document, $data)) {
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
        //$this->db->select($this->scholarship_remarks . '.*');
        //$this->db->where($this->scholarship_remarks . '.scholarship_details_id', $id);
        //$this->db->where($this->scholarship_remarks . '.is_deleted = 0');
        $this->db->select("SR.id, SR.remarks,SR.scholarship_details_id,SR.member_id,SR.created_date,SR.updated_date,M.name");
        $this->db->join($this->members . " AS M", "M.id = SR.member_id", "LEFT");
        $this->db->where('SR.scholarship_details_id', $id);
        $query = $this->db->get($this->scholarship_remarks . " AS SR");
        //print_r($query);
        //EXIT;
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

    function get_zakaath_detail() {
        $this->db->select("*");
        $query = $this->db->get($this->zakaathamount);
        if ($query->num_rows > 0) {
            return $query->result_array();
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

    function add_zakaath_amount($amount) {
        $date = date("Y-m-d");
        $query = $this->db->query("UPDATE " . $this->zakaathamount . " SET amount = amount + " . $amount . ", updated_date = '" . $date . "' WHERE id = 1");
        if ($query) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    function add_zakaath_scholarship_history($data) {
        if ($this->db->insert($this->zakaathamount_scholarship_history, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function insert_scholarship_custom_entry($data) {
        if ($this->db->insert($this->dynamic_entry_scholarship, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function get_dynamic_entry_scholarship($id) {
        $this->db->select("*");
        $this->db->where("scholarship_id", $id);
        $query = $this->db->get($this->dynamic_entry_scholarship);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function update_scholarship_custom_entry($data, $id) {
        $data['updated_on'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        if ($this->db->update($this->dynamic_entry_scholarship, $data)) {
            return TRUE;
        }

        return FALSE;
    }

    function delete_scholarship_custom_entry($id) {
        $this->db->where('id', $id);
        if ($this->db->delete($this->dynamic_entry_scholarship)) {
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

    public function export_all_scholarships_list($searchString, $approvedYear = "", $repaymentYear = "", $courseCompletedYear = "",$applicationDate="", $application_type, $payment_on_hold, $course_type) {
        $this->db->select('@acount:=@acount+1 serial_number,S.id AS scholarship_primary_id, S.scholarship_id, S.application_date, S.approved_amount, S.approved_year, S.student_name, S.email, S.mobile_no,S.dob,S.years_sponsored,S.address,S.college_name,S.college_address, S.profile_picture,S.application_type_id, S.course_completed_year, S.course_type_id, S.payment_on_hold, S.repayment_completed_year, S.status, S.is_deleted,AT.name AS application_type_name, CT.name AS course_type_name', false);
        $this->db->select("(CASE WHEN (S.status = 1) THEN 'Active' WHEN (S.status = 0) THEN 'In Active' END) AS scholarshipStatus", false);

        $this->db->select("(CASE WHEN (S.payment_on_hold = 1) THEN 'Yes' WHEN (S.payment_on_hold = 0) THEN 'No' END) AS paymentOnHold", false);

        $this->db->join($this->application_type . ' AS AT', 'S.application_type_id = AT.id', 'LEFT');
        $this->db->join($this->course_type . ' AS CT', 'S.course_type_id = CT.id', 'LEFT');

        $where = "";
        if ($searchString) {
            $i = 0;
            foreach ($this->column_search as $item) { // loop column
                if ($i == 0) { // first loop
                    $where .="(";
                }
                if ($searchString == "y" || $searchString == "ye" || $searchString == "yes" && $item == "S.payment_on_hold") {
                    $where .= '' . $item . " like '%1%'";
                } else if ($searchString == "n" || $searchString == "no" && $item == "S.payment_on_hold") {
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

        if ($application_type != "") {
            $this->db->where('S.application_type_id =', $application_type);
        }
        if ($payment_on_hold != "") {
            $this->db->where('S.payment_on_hold =', $payment_on_hold);
        }
        if ($course_type != "") {
            $this->db->where('S.course_type_id =', $course_type);
        }
        if ($approvedYear != "") {
            //$this->db->where('DATE_FORMAT(S.approved_year,"%Y") =', $approvedYear);	
           // $where_approved_yr = 'S.approved_year' . " like '%" . $approvedYear . "%'";	
            //$this->db->where($where_approved_yr);	
        }	
        if ($courseCompletedYear != "") {	
            //$this->db->where('DATE_FORMAT(S.course_completed_year,"%Y") =', $courseCompletedYear);
            // $where_cc_yr = 'S.course_completed_year' . " like '%" . $courseCompletedYear . "%'";	
             //$this->db->where($where_cc_yr);	
         }	
         if ($applicationDate != "") {	
            //$this->db->where('DATE_FORMAT(S.application_date,"%Y-%m-%d") =', $applicationDate);
            // $where_application_date = 'S.application_date' . " like '%" . $applicationDate . "%'";	
             //$this->db->where($where_application_date);	
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

    public function update_scholarship_support_image($id,$data){
        $this->db->where('id',$id);
        $this->db->update('supporting_documents',$data);
    }

}
