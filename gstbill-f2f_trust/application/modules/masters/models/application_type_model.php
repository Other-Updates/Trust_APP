<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Application_type_model extends CI_Model {

    private $table_name = 'application_type';
    private $user_permission_table = 'user_type_permission';
    private $user_modules_table = 'user_modules';
    private $user_sections_table = 'user_sections';
    var $column_search = array('name');

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_all_receipt_types($searchString) {
        $this->db->select($this->table_name . '.*');
        $this->db->where($this->table_name . '.is_deleted', 0);

        $where = "";
        if ($searchString) {
            $i = 0;
            foreach ($this->column_search as $item) { // loop column
                if ($i == 0) { // first loop
                    $where .="(";
                }
                $where .= '`' . $item . "` like '%" . $searchString . "%'";
                if ((count($this->column_search) - 1) != $i)
                    $where .= ' OR ';
                if ((count($this->column_search) - 1) == $i)
                    $where .= ")";

                $i++;
            }
        }

        if ($where != '')
            $this->db->where($where);

        $this->db->order_by("id", 'desc');
        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return NULL;
    }

    function get_application_type_by_id($id) {
        $this->db->select($this->table_name . '.*');
        $this->db->where($this->table_name . '.id', $id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function is_application_type_available($application_type_name, $id="") {

        //print_r($course_type_name);

        $this->db->select($this->table_name . '.id');
        $this->db->where('LCASE(name)', strtolower($application_type_name));
        $this->db->where('is_deleted != 1');
        if ($id != '0' && $id != "") {
            $this->db->where('id != ', $id);
        }

        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function insert_application_type($data) {
        if ($this->db->insert($this->table_name, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        return FALSE;
    }

    function update_application_type($data, $id) {

        $data['updated_date'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return TRUE;
        }

        return FALSE;
    }

    function delete_receipt_type($id, $data) {

        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return true;
        }

        return false;
    }

}
