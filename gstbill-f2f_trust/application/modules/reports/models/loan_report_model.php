<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loan_report_model extends CI_Model {

    private $country_table = "country";
    private $table_name = "scholarship_details";
    private $member_type = "member_type";
    private $course_type = "course_type";
    private $receipts = "receipts";

    function __construct() {
        $this->load->database();
        parent::__construct();
    }

    function get_all_course_type() {
        $this->db->select($this->course_type . '.*');
        $query = $this->db->get($this->course_type);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_loan_report($all, $from_date = "", $to_date = "", $course_type = "", $from_course_complete_date = "", $to_course_complete_date = "") {
        $this->db->select('@acount:=@acount+1 serial_number,S.id AS scholarship_primary_id,R.receipt_date,R.for_year, S.scholarship_id as application_number,S.application_date,R.for_year, S.student_name,S.profile_picture,  S.course_completed_year, S.course_type_id,S.repayment_completed_year, CT.name AS course_type_name, CONCAT("' . base_url() . "scholarship/view/" . '",S.id )AS profile_link,ifnull(R1.received_amount,0.00) as received_amount', false);
        $this->db->join($this->receipts . " AS R", "(S.id = R.scholarship_details_id AND R.receipt_type_id = 3", "LEFT", false);
        $this->db->join($this->course_type . ' AS CT', 'S.course_type_id = CT.id', 'LEFT');
        $this->db->join('(SELECT SUM(amount) as received_amount,scholarship_details_id FROM receipts WHERE cancelled=0 and receipt_type_id=3 GROUP BY scholarship_details_id) AS R1', 'S.id = R1.scholarship_details_id', 'LEFT');


        //$this->db->where('S.application_type_id', 2);
        
        if ($from_date != "" && $to_date != "") {
            $this->db->where("((DATE_FORMAT(R.receipt_date,'%Y')>='$from_date' AND DATE_FORMAT(R.receipt_date,'%Y')<='$to_date'))");
        }
        if ($from_course_complete_date != "" && $to_course_complete_date != "") {
            $this->db->where("((DATE_FORMAT(S.course_completed_year,'%Y')>='$from_course_complete_date' AND DATE_FORMAT(S.course_completed_year,'%Y')<='$to_course_complete_date'))");
        }
        if ($course_type != "") {
            $this->db->where('S.course_type_id', $course_type);
        }
        $this->db->where('S.is_deleted', 0);
        $this->db->order_by("R.id", "desc");
        $this->db->group_by("R.scholarship_details_id");
        $query = $this->db->get("(SELECT @acount:= 0) AS acount," . $this->table_name . ' AS S');
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }



        return array();
    }

}
