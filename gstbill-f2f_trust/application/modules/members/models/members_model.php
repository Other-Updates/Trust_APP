<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Members_model extends CI_Model {

    public $table_name = 'users';
    private $member_type = "member_type";
    private $user_type = "user_type";
    private $position = "position";
    private $position_history = "position_history";
    private $user_permission_table = 'user_type_permission';
    private $user_modules_table = 'user_modules';
    private $user_sections_table = 'user_sections';
    private $country_table = "country";
    private $street_table = "street";
    private $dynamic_entry_member = "dynamic_entry_member";
    var $column_search = array('M.email', 'M.mobile_number', 'M.name', 'M.position_id', 'MT.name', 'P.name', 'M.street_name', 'C.countries_name', 'M.status', 'S.name');

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_members() {
        $this->db->select($this->table_name . '.*');
        $this->db->where($this->table_name . '.is_deleted', 0);
        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return NULL;
    }

    function get_all_members_list($searchString, $from_date, $to_date) {
//        $this->db->select($this->table_name . '.*');
//        $this->db->where($this->table_name . '.is_deleted', 0);
//        $query = $this->db->get($this->table_name);
//
//        if ($query->num_rows() > 0) {
//            return $query->result_array();
//        }
//
//        return NULL;

        $this->db->select('M.id AS member_id, M.email, M.mobile_number, M.name, M.username, M.profile_picture, M.member_type_id AS member_type_id, M.position_id, M.status, M.is_deleted,M.street_name, MT.name as member_type_name,M.last_subscription_year, P.name as position_name, C.countries_name, S.name as streetname');
        $this->db->join($this->member_type . ' AS MT', 'M.member_type_id = MT.id', 'LEFT');
        $this->db->join($this->position . ' AS P', 'M.position_id = P.id', 'LEFT');
        $this->db->join($this->country_table . ' AS C', 'M.residing_country = C.id', 'LEFT');
        $this->db->join($this->street_table . ' AS S', 'M.street_name = S.id', 'LEFT');

        $where = "";
        if ($searchString) {
            $i = 0;
            foreach ($this->column_search as $item) { // loop column
                if ($i == 0) { // first loop
                    $where .="(";
                }
                if ($searchString == "a" || $searchString == "ac" || $searchString == "act" || $searchString == "acti" || $searchString == "activ" || $searchString == "active" && $item == "M.status") {
                    $where .= '' . $item . " like '%1%'";
                } else if ($searchString == "i" || $searchString == "in" || $searchString == "ina" || $searchString == "inac" || $searchString == "inact" || $searchString == "inacti" || $searchString == "inactiv" || $searchString == "inactive" && $item == "M.status") {
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
        $this->db->where('M.is_deleted', 0);
        if ($from_date != "" && $to_date != "") {
            $this->db->where('DATE_FORMAT(M.last_subscription_year,"%Y-%m-%d")>=', $from_date);
            $this->db->where('DATE_FORMAT(M.last_subscription_year,"%Y-%m-%d")<=', $to_date);
        }

        $this->db->order_by("M.id", "desc");
        $query = $this->db->get($this->table_name . ' AS M');
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }

        return NULL;
    }

    function is_username_available($username, $id = "") {

        $this->db->select($this->table_name . '.*');
        $this->db->where('LCASE(username)', strtolower($username));
        if ($id != '0' && $id != "") {
            $this->db->where('id != ', $id);
        }
        //$this->db->where('is_deleted', 0);
        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }


        return NULL;
    }

    function is_email_available($email, $id = "") {

        $this->db->select($this->table_name . '.*');
        $this->db->where('LCASE(email)', strtolower($email));
        if ($id != '0' && $id != "") {
            $this->db->where('id != ', $id);
        }
        //$this->db->where('is_deleted', 0);

        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function is_position_available($position_id, $id = "") {
        if ($position_id != "2" && $position_id != "") {
            $this->db->select($this->table_name . '.id');
            $this->db->where('position_id', $position_id);
            if ($id != '0' && $id != "") {
                $this->db->where('id != ', $id);
            }
            $this->db->where('is_deleted', 0);

            $query = $this->db->get($this->table_name);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }

        return NULL;
    }

    function insert_member($data) {
        if ($this->db->insert($this->table_name, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function update_profile_image($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_member_by_id($id) {

        $this->db->select($this->table_name . '.*');
        $this->db->where($this->table_name . '.id', $id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function update_member($data, $id) {

        $data['updated_date'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return TRUE;
        }

        return FALSE;
    }

    function delete_member($id, $data) {

        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return true;
        }

        return false;
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

    function get_all_member_type() {
        $this->db->select($this->member_type . '.*');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        $query = $this->db->get($this->member_type);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_all_user_type() {
        $this->db->select($this->user_type . '.*');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        $query = $this->db->get($this->user_type);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function get_all_positions() {
        $this->db->select($this->position . '.*');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        $query = $this->db->get($this->position);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function insert_position_history($data) {
        if ($this->db->insert($this->position_history, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function get_position_history_by_member_id($member_id) {
        $this->db->select($this->position_history . '.*');
        $this->db->where("user_id", $member_id);
        $this->db->order_by('id', "desc");
        $this->db->limit('1');
        $query = $this->db->get($this->position_history);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function update_position_history($data, $id) {
        $this->db->where('id', $id);
        if ($this->db->update($this->position_history, $data)) {
            return TRUE;
        }

        return FALSE;
    }

    function get_all_position_history_by_member_id($member_id) {
        $this->db->select('PH.id AS ph_id, PH.user_id, PH.position_id, PH.date_from, PH.date_to, P.name AS position_name, P.status, P.is_deleted');
        $this->db->join($this->position . ' AS P', 'PH.position_id = P.id', 'LEFT');

//
//
//        $this->db->select($this->position_history . '.*');
        $this->db->where("PH.user_id", $member_id);
        $this->db->order_by('PH.id', "desc");
        // $query = $this->db->get($this->position_history);

        $query = $this->db->get($this->position_history . ' AS PH');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
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

    function get_available_position($id = "") {

        $this->db->select($this->position . '.id');
        $this->db->where('position_id', $position_id);
        if ($id != '0' && $id != "") {
            $this->db->where('id != ', $id);
        }
        $this->db->where('is_deleted', 0);

        $query = $this->db->get($this->position);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }


        return NULL;
    }

    function insert_member_custom_entry($data) {
        if ($this->db->insert($this->dynamic_entry_member, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function get_dynamic_entry_by_member_id($id) {
        $this->db->select("*");
        $this->db->where("member_id", $id);
        $query = $this->db->get($this->dynamic_entry_member);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function update_member_custom_entry($data, $id) {
        $data['updated_on'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        if ($this->db->update($this->dynamic_entry_member, $data)) {
            return TRUE;
        }

        return FALSE;
    }

    function delete_member_custom_entry($id) {
        $this->db->where('id', $id);
        if ($this->db->delete($this->dynamic_entry_member)) {
            return TRUE;
        }
        return FALSE;
    }

    function export_all_members_list($searchString, $from_date, $to_date) {

        $this->db->select('@acount:=@acount+1 serial_number, M.id AS member_id, M.email, M.mobile_number, M.name, M.profile_picture, M.member_type_id AS member_type_id, M.position_id, M.status , M.is_deleted,M.street_name, MT.name as member_type_name,M.last_subscription_year, P.name as position_name, C.countries_name, S.name as streetname', false);

        $this->db->select("(CASE WHEN (M.status = 1) THEN 'Active' WHEN (M.status = 2) THEN 'Died' WHEN (M.status = 0) THEN 'In Active' END) AS memberStatus", false);

        $this->db->join($this->member_type . ' AS MT', 'M.member_type_id = MT.id', 'LEFT');
        $this->db->join($this->position . ' AS P', 'M.position_id = P.id', 'LEFT');
        $this->db->join($this->country_table . ' AS C', 'M.residing_country = C.id', 'LEFT');
        $this->db->join($this->street_table . ' AS S', 'M.street_name = S.id', 'LEFT');

        $where = "";
        if ($searchString) {
            $i = 0;
            foreach ($this->column_search as $item) { // loop column
                if ($i == 0) { // first loop
                    $where .="(";
                }
                if ($searchString == "a" || $searchString == "ac" || $searchString == "act" || $searchString == "acti" || $searchString == "activ" || $searchString == "active" && $item == "M.status") {
                    $where .= '' . $item . " like '%1%'";
                } else if ($searchString == "i" || $searchString == "in" || $searchString == "ina" || $searchString == "inac" || $searchString == "inact" || $searchString == "inacti" || $searchString == "inactiv" || $searchString == "inactive" && $item == "M.status") {
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
        $this->db->where('M.is_deleted', 0);
        if ($from_date != "" && $to_date != "") {
            $this->db->where('DATE_FORMAT(M.last_subscription_year,"%Y-%m-%d")>=', $from_date);
            $this->db->where('DATE_FORMAT(M.last_subscription_year,"%Y-%m-%d")<=', $to_date);
        }

        //$this->db->order_by("M.id", "desc");
        //$this->db->select("(SELECT @acount:= 0) AS acount");
        $query = $this->db->get("(SELECT @acount:= 0) AS acount," . $this->table_name . ' AS M');
        if ($query->num_rows() > 0) {

            return $query->result_array();
        }

        return NULL;
    }

}
