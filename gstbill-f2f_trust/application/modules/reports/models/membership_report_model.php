<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Membership_report_model extends CI_Model {

    private $country_table = "country";
    private $table_name = "users";
    private $member_type = "member_type";
    private $position = "position";

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

    function get_membership_report($all,$from_date = "", $to_date = "", $country = "", $membership_type = "") {
        $this->db->select('@acount:=@acount+1 serial_number,M.id AS member_id,M.profile_picture, M.email, M.mobile_number, M.name, M.member_type_id AS member_type_id,  MT.name as member_type_name,M.last_subscription_year,M.status,P.name as position_name,  C.countries_name,M.member_since, CONCAT("' . base_url() . "members/edit/" . '",M.id )AS profile_link', false);
        $this->db->select("(CASE WHEN (M.life_member = 1) THEN 'Lifetime Member' WHEN (M.life_member = 0) THEN 'Ordinary Member' END) AS type_of_membership", false);
        $this->db->join($this->member_type . ' AS MT', 'M.member_type_id = MT.id', 'LEFT');
        $this->db->join($this->country_table . ' AS C', 'M.residing_country = C.id', 'LEFT');
        $this->db->join($this->position . ' AS P', 'M.position_id = P.id', 'LEFT');
        if ($country != "") {
            $this->db->where('M.residing_country', $country);
        }
        if ($membership_type != "") {
            $this->db->where('MT.id', $membership_type);
        }
        if ($from_date != "" && $to_date != "") {
            $this->db->where("((DATE_FORMAT(M.last_subscription_year,'%Y')>='".date('Y', strtotime($from_date))."' AND DATE_FORMAT(M.last_subscription_year,'%Y')<='".date('Y', strtotime($to_date))."'))");
        }
        $this->db->where('M.is_deleted', 0);
        $this->db->order_by("M.id", "desc");
        $query = $this->db->get("(SELECT @acount:= 0) AS acount," . $this->table_name . ' AS M');
        // echo $this->db->last_query();
        // exit;
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }

        return NULL;
    }

}
