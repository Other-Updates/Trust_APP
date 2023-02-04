<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Application_type extends MX_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->user_auth->is_logged_in()) {
            redirect($this->config->item('base_url') . 'users/login');
        }

        $main_module = 'dashboard';
        $access_arr = array(
            'dashboard/index' => array('view'),
            'dashboard/add' => array('add'),
            'dashboard/delete' => array('delete'),
        );

//        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {
//            redirect($this->config->item('base_url'));
//        }

        $this->load->model('masters/application_type_model');
        $this->template->write_view('session_msg', 'users/session_msg');
    }

    function index() {

        $data = array();
        $data['title'] = 'Dashboard';

        $this->template->write_view('content', 'masters/application_type', $data);
        $this->template->render();
    }

    public function getApplicationType() {

        $searchQuery = $this->input->post('query');
        $searchString = "";
        if (!(empty($searchQuery['generalSearch'])) && $searchQuery['generalSearch'] != "") {
            $searchString = $searchQuery['generalSearch'];
        }

        $data['data'] = $this->application_type_model->get_all_receipt_types($searchString);
        $total_records = count($data['data']);
        $pages = ceil($total_records / 10);
        $data['meta'] = array(
            "page" => 1,
            "pages" => $pages,
            "perpage" => -1,
            "total" => $total_records,
            "sort" => "asc",
            "field" => "id"
        );
        //print_r($data);
        echo json_encode($data);
    }

    function add() {
//        $data = array();
//        $data['title'] = 'Masters - Add New Category';
//        if ($this->input->post('category', TRUE)) {
//            $category = $this->input->post('category');
//            $category['created_date'] = date('Y-m-d H:i:s');
//            $insert = $this->category_model->insert_category($category);
//            $this->session->set_flashdata('flashSuccess', 'New Category successfully added!');
//            redirect($this->config->item('base_url') . 'masters/category');
//        }

        $this->template->write_view('content', 'masters/add_application_type');
        $this->template->render();
    }

    function add_application_type() {
        $application_type = $this->input->post('application_type');	
        $application_type_status = $this->input->post('application_type_status');	
        $result = $this->application_type_model->is_application_type_available($application_type);

        if (!empty($result[0]['id'])) {
            //echo 'yes';
            $data['status'] = "applicationtype_exists";
        } else {
            //echo 'no';
            $created_date = date('Y-m-d H:i:s');
            $application_type_data = array(
                'name' => $application_type,
                'status' => $application_type_status,
                'created_date' => $created_date
            );
            $insert = $this->application_type_model->insert_application_type($application_type_data);
            $this->session->set_flashdata('flashSuccess', 'Application Type Added');
            if ($insert) {
                $status = "success";
            } else {
                $status = "failed";
            }
            $data['status'] = $status;
        }

        echo json_encode($data);
    }

    function edit($id) {
//        $data = array();
//        $data['title'] = 'Masters - Edit Category';
//        if ($this->input->post('category', TRUE)) {
//            $category = $this->input->post('category');
//            $category['updated_date'] = date('Y-m-d H:i:s');
//            $update = $this->category_model->update_category($category, $id);
//            $this->session->set_flashdata('flashSuccess', 'Category successfully updated!');
//            redirect($this->config->item('base_url') . 'masters/category');
//        }
//
//        $data['category'] = $this->category_model->get_category_by_id($id);

        $this->template->write_view('content', 'masters/edit_application_type');
        $this->template->render();
    }

    public function getApplicationTypeData() {
        $id = $this->input->get("id");
        $data = $this->application_type_model->get_application_type_by_id($id);
        echo json_encode($data);
    }

    public function edit_application_type() {
        $application_type = $this->input->post('application_type');	
        $status = $this->input->post('application_type_status');	
        $id = $this->input->post("application_type_id");	
        $client_id = $this->user_auth->get_user_id();	
        $result = $this->application_type_model->is_application_type_available($application_type, $id);	

        if (!empty($result[0]['id'])) {
            //echo 'yes';
            $data['status'] = "applicationtype_exists";
        } else {
            //echo 'no';
            $updated_date = date('Y-m-d H:i:s');
            $application_type_data = array(
                'name' => $application_type,
                'status' => $status,
                'updated_date' => $updated_date
            );

            $update = $this->application_type_model->update_application_type($application_type_data, $id);
            $this->session->set_flashdata('flashSuccess', 'Application Type Updated');
            if ($update) {
                $status = "success";
            } else {
                $status = "failed";
            }
            $data['status'] = $status;
        }
        echo json_encode($data);
    }

    function delete($id) {
        $id = $this->input->post("id");
        $data = array('is_deleted' => 1);
        $delete = $this->receipt_type_model->delete_receipt_type($id, $data);

        if ($delete == 1) {
            $this->session->set_flashdata('flashSuccess', 'Course successfully deleted!');
            echo '1';
        } else {
            $this->session->set_flashdata('flashError', 'Operation Failed!');

            echo '0';
        }
    }

    function view($id) {

        $this->template->write_view('content', 'masters/view_application_type');
        $this->template->render();
    }

}
