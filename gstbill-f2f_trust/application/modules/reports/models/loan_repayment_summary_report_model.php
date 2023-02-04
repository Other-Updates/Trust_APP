<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loan_repayment_summary_report_model extends CI_Model {

    private $scholarship_details = "scholarship_details";
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

    function get_loan_repayment_summary_report($all, $from_date = "", $to_date = "", $course_type = "") {

        $this->db->select('@acount:=@acount+1 serial_number,R.receipt_date,DATE_FORMAT(R.receipt_date,"%Y") AS receipt_year, Sum(Case When R.receipt_type_id = "3" Then R.amount Else 0 End) scholarshipTotal,Sum(Case When R.receipt_type_id = "4" Then R.amount Else 0 End) repaymentTotal,ifnull(R1.no_of_application,0) as no_of_application,ifnull(R2.no_of_repayment_application,0) as no_of_repayment_application', false);
        $this->db->join('(SELECT COUNT(DISTINCT(scholarship_details_id)) AS no_of_application,YEAR(receipt_date) as year FROM receipts WHERE receipt_type_id=3 and cancelled=0 group by YEAR(receipt_date)) as R1', 'R1.year=YEAR(R.receipt_date)', 'LEFT');
        $this->db->join('(SELECT COUNT(DISTINCT(scholarship_details_id)) AS no_of_repayment_application,YEAR(receipt_date) as year FROM receipts WHERE receipt_type_id=4 and cancelled=0 group by YEAR(receipt_date)) as R2', 'R2.year=YEAR(R.receipt_date)', 'LEFT');
        if ($course_type != "") {

            $this->db->join($this->scholarship_details . " AS S", "R.scholarship_details_id = S.id", 'LEFT');
            $this->db->join($this->course_type . ' AS CT', 'S.course_type_id = CT.id', 'LEFT');
            $this->db->where('S.course_type_id', $course_type);
        }

        if ($from_date != "" && $to_date != "") {
            //$this->db->join($this->receipts . " AS R", "(S.id = R.scholarship_details_id AND R.receipt_type_id = 4", "RIGHT", false);
            $this->db->where("((DATE_FORMAT(R.receipt_date,'%Y')>='$from_date' AND DATE_FORMAT(R.receipt_date,'%Y')<='$to_date'))");
            //$this->db->group_by("R.scholarship_details_id");
        }

        $this->db->where("R.cancelled", 0);
        $this->db->group_by('YEAR(R.receipt_date)');

        $this->db->order_by("YEAR(R.receipt_date)", "desc");

        $query = $this->db->get("(SELECT @acount:= 0) AS acount," . $this->receipts . ' AS R');
        //echo $this->db->last_query();
        //exit;
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }



        return array();
    }

    function get_total_amount($all, $from_date = "", $to_date = "", $course_type = "") {
        $this->db->select('@acount:=@acount+1 serial_number, Sum(Case When R.receipt_type_id = "3" Then R.amount Else 0 End) scholarshipTotal,Sum(Case When R.receipt_type_id = "4" Then R.amount Else 0 End) repaymentTotal', false);

        if ($course_type != "") {

            $this->db->join($this->scholarship_details . " AS S", "R.scholarship_details_id = S.id", 'LEFT');
            $this->db->join($this->course_type . ' AS CT', 'S.course_type_id = CT.id', 'LEFT');
            $this->db->where('S.course_type_id', $course_type);
        }

        if ($from_date != "" && $to_date != "") {
            $this->db->where("((DATE_FORMAT(R.receipt_date,'%Y')>='$from_date' AND DATE_FORMAT(R.receipt_date,'%Y')<='$to_date'))");
        }

        $this->db->where("R.cancelled", 0);
        $query = $this->db->get("(SELECT @acount:= 0) AS acount," . $this->receipts . ' AS R');
        //echo $this->db->last_query();
        //exit;
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }

        return NULL;
    }

}
