<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sponsor_report_model extends CI_Model {

    public $table_name = 'sponsor_details';
    private $country = "country";
    private $user_permission_table = 'user_type_permission';
    private $user_modules_table = 'user_modules';
    private $user_sections_table = 'user_sections';
    private $sponsor_commitments = "sponsor_commitments";
    var $column_search = array('S.sponsor_name', 'S.mobile_no', 'S.email', 'C.countries_name');

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

    function get_sponsor_report($all, $from_date = "", $to_date = "", $country = "") {
        $this->db->select('@acount:=@acount+1 serial_number, S.id AS sponsor_id, S.profile_picture,ifnull(SUM(SC2.amount),"No Commitments") as sponsor_full_amount, S.residing_country, S.email,  S.mobile_no, S.sponsor_name, C.countries_name, CONCAT("' . base_url() . "sponsors/view/" . '",S.id )AS profile_link,ifnull(SC2.for_year,"No Commitments") as last_commitment_year ,ifnull(SC2.amount,"No Commitments") as last_commitment_amount,ifnull(SC3.commitment_amount,"No Due") as commitment_due_amount,ifnull(SC3.commitment_due,"No Due") as commitment_due_for', false);
        $this->db->join($this->sponsor_commitments . ' AS SC', 'S.id = SC.sponsor_details_id', 'LEFT');
        $this->db->join('(SELECT max(id) as id,sponsor_details_id from sponsor_commitments where is_deleted="0" group by sponsor_details_id) as SC1', 'SC1.sponsor_details_id=S.id', 'LEFT');
        $this->db->join($this->sponsor_commitments . ' AS SC2', 'SC2.id=SC1.id and SC2.sponsor_details_id=S.id', 'LEFT');
        $this->db->join('(SELECT count(id) as commitment_due,SUM(amount) as commitment_amount,sponsor_details_id from sponsor_commitments where paid="0" and is_deleted="0" group by sponsor_details_id) as SC3', 'SC3.sponsor_details_id=S.id', 'LEFT');
        $this->db->join($this->country . ' AS C', 'S.residing_country = C.id', 'LEFT');
        if ($country != "") {
            $this->db->where('S.residing_country', $country);
        }
        if ($from_date != "" && $to_date != "") {
            $this->db->where("((DATE_FORMAT(SC2.for_year,'%Y')>='$from_date' AND DATE_FORMAT(SC2.for_year,'%Y')<='$to_date'))");
        }
        $this->db->order_by("S.id", "desc");
        $this->db->group_by('S.id');
     //   $this->db->group_by('SC.id');
        $query = $this->db->get("(SELECT @acount:= 0) AS acount," . $this->table_name . ' AS S');
     
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }

        return array();
    }

}
