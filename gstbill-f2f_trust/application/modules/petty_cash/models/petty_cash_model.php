<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Petty_cash_model extends CI_Model {

    public $table_name = 'petty_cash';
    private $expense_category = "expense_category";
    private $users = "users";
    private $sponsor_details = "sponsor_details";
    private $scholarship_details = "scholarship_details";
    private $zakaathamount = "zakaathamount";
    private $organization_amount = "organization_amount";
    private $sponsor_commitments = "sponsor_commitments";
    private $subscription_history = "subscription_history";
    var $column_search = array('EC.expense_category', 'PC.date', 'PC.expense_type', 'PC.cash_in', 'PC.cash_out');

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_receipts() {
        $this->db->select($this->table_name . '.*');
        $this->db->where($this->table_name . '.is_deleted', 0);
        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return NULL;
    }

    function get_all_petty_cash_list($searchString, $from_date = "", $to_date = "") {

        $this->db->select('PC.id AS petty_cash_id, PC.expense_type,PC.expense_id, PC.cash_in, PC.cash_out,PC.date as petty_cash_date,PC.transaction_type,PC.created_date,PC.updated_date, EC.expense_category AS expense_category_name');
        $this->db->join($this->expense_category . ' AS EC', 'PC.expense_id = EC.id', 'LEFT');

        // $this->db->join($this->users . ' AS U', '(R.receipt_type_id = "1") AND (U.id = R.member_id)', 'LEFT');
        // $this->db->join($this->sponsor_details . ' AS S', 'R.receipt_type_id = 2 AND S.id = R.sponsor_details_id', 'LEFT');
        // $this->db->join($this->scholarship_details . ' AS Sch', 'R.receipt_type_id = 3 AND Sch.id = R.scholarship_details_id', 'LEFT');

        $where = "";

        if ($searchString) {


            $i = 0;
            foreach ($this->column_search as $item) { // loop column
                if ($i == 0) { // first loop
                    $where .="(";
                }
                if ($searchString == "v" || $searchString == "va" || $searchString == "var" || $searchString == "vari" || $searchString == "varia" || $searchString == "variab" || $searchString == "varabl" || $searchString == "variable") {
                    $where .= "PC.expense_type= '2'";
                } else if ($searchString == "f" || $searchString == "fi" || $searchString == "fix" || $searchString == "fixe" || $searchString == "fixed") {
                    $where .= "PC.expense_type= '1'";
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
        //$this->db->where('R.is_deleted', 0);
        if ($from_date != "" && $to_date != "") {
            $this->db->where('DATE_FORMAT(PC.date,"%Y-%m-%d")>=', $from_date);
            $this->db->where('DATE_FORMAT(PC.date,"%Y-%m-%d")<=', $to_date);
        }

        $this->db->order_by("PC.id", "asc");
        $query = $this->db->get($this->table_name . ' AS PC');

        if ($query->num_rows() > 0) {

            //echo $this->db->last_query();
            //exit;

            return $query->result_array();
        }

        return NULL;
    }

    function insert_petty_cash($data) {
        if ($this->db->insert($this->table_name, $data)) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
            exit;
        }
        return FALSE;
    }

    function update_petty_cash($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_petty_cash_by_id($id) {
        $this->db->select($this->table_name . '.*');
        $this->db->where($this->table_name . '.id', $id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return NULL;
    }

    function get_expense_category() {
        $this->db->select($this->expense_category . '.*');
        $this->db->where("status = 1");
        $this->db->where("is_deleted = 0");
        $query = $this->db->get($this->expense_category);
        if ($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    function add_organization_amount($amount) {
        $date = date("Y-m-d");
        $query = $this->db->query("UPDATE " . $this->organization_amount . " SET amount = amount + " . $amount . ", updated_date = '" . $date . "' WHERE id = 1");


        if ($query) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    function subtract_organization_amount($amount) {
        $date = date("Y-m-d");
        $query = $this->db->query("UPDATE " . $this->organization_amount . " SET amount = amount - " . $amount . ", updated_date = '" . $date . "' WHERE id = 1");


        if ($query) {
            return TRUE;
        } else {
            return NULL;
        }
    }

    function delete_receipt($id, $data) {

        $this->db->where('id', $id);
        if ($this->db->update($this->table_name, $data)) {
            return true;
        }

        return false;
    }

    function export_all_petty_cash_list($searchString, $from_date = "", $to_date = "") {

        $this->db->select('@acount:=@acount+1 serial_number, PC.id AS petty_cash_id, PC.expense_type,PC.expense_id, PC.cash_in, PC.cash_out,PC.date as petty_cash_date,PC.transaction_type,PC.created_date,PC.updated_date, EC.expense_category AS expense_category_name', false);

        $this->db->select("(CASE WHEN (PC.expense_type = 1) THEN 'Fixed' WHEN (PC.expense_type = 2) THEN 'Variable' END) AS expenseType", false);
        $this->db->select("(CASE WHEN (PC.transaction_type = 1) THEN 'Cash In' WHEN (PC.transaction_type = 2) THEN 'Cash Out' END) AS transactionType", false);
        $this->db->join($this->expense_category . ' AS EC', 'PC.expense_id = EC.id', 'LEFT');

        // $this->db->join($this->users . ' AS U', '(R.receipt_type_id = "1") AND (U.id = R.member_id)', 'LEFT');
        // $this->db->join($this->sponsor_details . ' AS S', 'R.receipt_type_id = 2 AND S.id = R.sponsor_details_id', 'LEFT');
        // $this->db->join($this->scholarship_details . ' AS Sch', 'R.receipt_type_id = 3 AND Sch.id = R.scholarship_details_id', 'LEFT');

        $where = "";

        if ($searchString) {


            $i = 0;
            foreach ($this->column_search as $item) { // loop column
                if ($i == 0) { // first loop
                    $where .="(";
                }
                if ($searchString == "v" || $searchString == "va" || $searchString == "var" || $searchString == "vari" || $searchString == "varia" || $searchString == "variab" || $searchString == "varabl" || $searchString == "variable") {
                    $where .= "PC.expense_type= '2'";
                } else if ($searchString == "f" || $searchString == "fi" || $searchString == "fix" || $searchString == "fixe" || $searchString == "fixed") {
                    $where .= "PC.expense_type= '1'";
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
        //$this->db->where('R.is_deleted', 0);
        if ($from_date != "" && $to_date != "") {
            $this->db->where('DATE_FORMAT(PC.date,"%Y-%m-%d")>=', $from_date);
            $this->db->where('DATE_FORMAT(PC.date,"%Y-%m-%d")<=', $to_date);
        }

        $this->db->order_by("PC.id", "asc");
        $query = $this->db->get("(SELECT @acount:= 0) AS acount," . $this->table_name . ' AS PC');
        //echo $this->db->last_query();
        //exit;
        if ($query->num_rows() > 0) {



            return $query->result_array();
        }

        return NULL;
    }

    public function check_opening_balance($date = "") {
        $this->db->select("*");
        $this->db->where("expense_id = 1");
        $this->db->where("DATE_FORMAT(date,'%Y-%m-%d')", $date);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return NULL;
    }

    public function get_closing_balance() {
      
        $this->db->select("*");
        $this->db->where("expense_id = 2");
        $this->db->order_by("date","desc");
        $this->db->limit("1");
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0) {
            $query= $query->result_array();
            return $query[0]['cash_in'];
        }

        return NULL;
    }

    

    public function check_closing_balance($date = "") {

//        $this->db->select("*");
//        $this->db->where("DATE_FORMAT(tab_1.created_date,'%Y-%m-%d') = $date");
//        $this->db->where("expense_id = 2");
//        $petty_cash = $this->db->get($this->table_name . ' AS tab_1')->result_array();
//
//        if ($query->num_rows() > 0) {
//            return $petty_cash->result_array();
//        }
//        $this->db->select('*');
//        $this->db->where("DATE_FORMAT(tab_1.date,'%Y-%m-%d')", $date);
//        $this->db->where("expense_id = 2");
//        $check_closing_bal_entry = $this->db->get($this->table_name . ' AS tab_1');
//        //echo $this->db->last_query();
//        if ($check_closing_bal_entry->num_rows() > 0) {
//            $this->db->select('SUM(tab_1.cash_in) AS cash_in_amount');
//            $this->db->where("DATE_FORMAT(tab_1.date,'%Y-%m-%d')", $date);
//            $this->db->where("expense_id = 2");
//            $petty_cash = $this->db->get($this->table_name . ' AS tab_1')->result_array();
//            $closing_balance = $petty_cash[0]['cash_in_amount'];
//        } else {

        $this->db->select('SUM(tab_1.cash_in) AS cash_in_amount,SUM(tab_1.cash_out) AS cash_out_amount');
        $this->db->where("DATE_FORMAT(tab_1.date,'%Y-%m-%d')", $date);
        $this->db->where("expense_id != 2");
        $petty_cash = $this->db->get($this->table_name . ' AS tab_1')->result_array();



        $cash_in = $petty_cash[0]['cash_in_amount'];
        $cash_out = $petty_cash[0]['cash_out_amount'];
        if ($cash_in > $cash_out) {
            $closing_balance = $cash_in - $cash_out;
        } else {
            $closing_balance = 0;
        }

        //}


        return $closing_balance;
    }

}
