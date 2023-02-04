<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subscription_report_model extends CI_Model {

    private $country_table = "country";
    private $table_name = "users";
    private $member_type = "member_type";
    private $receipts = "receipts";
    private $receipt_type = "receipt_type";

    function __construct() {
        $this->load->database();
        parent::__construct();
    }

    function get_all_country() {
        $this->db->select($this->country_table . '.*');
        $query = $this->db->get($this->country_table);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_subscription_report($all, $from_date = "", $to_date = "", $country = "") {
        $this->db->select('@acount:=@acount+1 serial_number,(CASE When M.last_subscription_amount != " " Then M.last_subscription_amount ELSE "-" END) as last_subscription_amount,M.profile_picture,M.last_subscription_year,M.last_subscription_year as last_subscription_year_due,M.id AS member_id, M.email, M.mobile_number, M.name, M.member_type_id AS member_type_id,  MT.name as member_type_name,M.last_subscription_year,M.member_since,  C.countries_name,CONCAT("' . base_url() . "members/view/" . '",M.id ) AS profile_link', false);
        $this->db->join($this->member_type . ' AS MT', 'M.member_type_id = MT.id', 'LEFT');
        $this->db->join($this->country_table . ' AS C', 'M.residing_country = C.id', 'LEFT');
       // $this->db->join($this->receipts . ' AS R', 'R.residing_country = C.id', 'LEFT');

        
        if ($country != "") {
            $this->db->where('M.residing_country', $country);
        }
        $this->db->where('M.is_deleted', 0);
        //$this->db->where('M.life_member', 0);
        if($this->user_auth->get_user_type_id() == 2)
            $this->db->where('M.id',$this->user_auth->get_user_id());
        if ($from_date != "" && $to_date != "") {
            $this->db->where("((DATE_FORMAT(M.last_subscription_year,'%Y')>=$from_date AND DATE_FORMAT(M.last_subscription_year,'%Y')<=$to_date))");
        }
        $this->db->order_by("M.id", "desc");
        $query = $this->db->get("(SELECT @acount:= 0) AS acount," . $this->table_name . ' AS M');
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }



        return array();
    }


}
