<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Repayment_report_model extends CI_Model {

    private $course_table = "course_type";
    private $table_name = "scholarship_details";
    private $receipts = "receipts";

    function __construct() {
        $this->load->database();
        parent::__construct();
    }

    function get_all_course() {
        $this->db->select('tab_1.*');
        $this->db->where('tab_1.is_deleted', 0);
        $this->db->where('tab_1.status', 1);
        $query = $this->db->get($this->course_table . ' AS tab_1');
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_repayment_report($all = "", $from_date, $to_date, $course_type) {
        $this->db->select('@acount:=@acount+1 serial_number,S.*,S.scholarship_id as application_number,S.id AS scholarship_primary_id,C.name AS course_name, CONCAT("' . base_url() . "scholarship/view/" . '",S.id )AS profile_link,S.profile_picture,R.amount as repayment_amount,R.receipt_date as repayment_date', false);

        $this->db->join($this->course_table . ' AS C', 'C.id = S.course_type_id', 'LEFT');

        $this->db->where('S.is_deleted', 0);
        $this->db->where('S.status', 1);
        $this->db->where('S.has_repayments', 1);
        $this->db->join($this->receipts . " AS R", "R.scholarship_details_id=S.id and R.receipt_type_id=4 and cancelled=0", "left");
        if ($from_date != "" && $to_date != "") {
           // $this->db->join($this->receipts . " AS R", "R.scholarship_details_id=S.id", "RIGHT");
            $this->db->where('DATE_FORMAT(R.receipt_date,"%Y")>=', $from_date);
            $this->db->where('DATE_FORMAT(R.receipt_date,"%Y")<=', $to_date);
        }
        if ($course_type != "") {
            $this->db->where('S.course_type_id', $course_type);
        }

        //$this->db->order_by("S.id", "desc");
        $query = $this->db->get("(SELECT @acount:= 0) AS acount," . $this->table_name . ' AS S');
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }

        return array();
    }

}
