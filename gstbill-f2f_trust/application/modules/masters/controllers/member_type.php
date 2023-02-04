<?phpif (!defined('BASEPATH'))    exit('No direct script access allowed');class Member_type extends MX_Controller {    function __construct() {        parent::__construct();        if (!$this->user_auth->is_logged_in()) {            redirect($this->config->item('base_url') . 'users/login');        }        $main_module = 'masters';        $access_arr = array(            'member_type/index' => array('view'),            'member_type/add' => array('add'),            'member_type/edit' => array('edit'),            'member_type/view' => array('view'),            'member_type/delete' => array('delete'),            'member_type/getMemberType' => "no_restriction",        );//        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {//            redirect($this->config->item('base_url'));//        }        $this->load->model('masters/member_type_model');        $this->template->write_view('session_msg', 'users/session_msg');    }    function index() {        $data = array();        $data['title'] = 'Dashboard';        $this->template->write_view('content', 'masters/member_type', $data);        $this->template->render();    }    public function getMemberType() {        $searchQuery = $this->input->post('query');        $searchString = "";        if (!(empty($searchQuery['generalSearch'])) && $searchQuery['generalSearch'] != "") {            $searchString = $searchQuery['generalSearch'];        }        $data['data'] = $this->member_type_model->get_all_member_types($searchString);        $total_records = count($data['data']);        $pages = ceil($total_records / 10);        $data['meta'] = array(            "page" => 1,            "pages" => $pages,            "perpage" => -1,            "total" => $total_records,            "sort" => "asc",            "field" => "id"        );        //print_r($data);        echo json_encode($data);    }    function add() {//        $data = array();//        $data['title'] = 'Masters - Add New Category';//        if ($this->input->post('category', TRUE)) {//            $category = $this->input->post('category');//            $category['created_date'] = date('Y-m-d H:i:s');//            $insert = $this->category_model->insert_category($category);//            $this->session->set_flashdata('flashSuccess', 'New Category successfully added!');//            redirect($this->config->item('base_url') . 'masters/category');//        }        $this->template->write_view('content', 'masters/add_member_type');        $this->template->render();    }    function add_member_type() {        $member_type = $this->input->post('member_type');        $member_type_status = $this->input->post('member_type_status');        $result = $this->member_type_model->is_member_type_available($member_type);        if (!empty($result[0]['id'])) {            //echo 'yes';            $data['status'] = "type_exists";        } else {            //echo 'no';            $created_date = date('Y-m-d H:i:s');            $member_type_data = array(                'name' => $member_type,                'status' => $member_type_status,                'created_date' => $created_date            );            $insert = $this->member_type_model->insert_member_type($member_type_data);            $this->session->set_flashdata('flashSuccess', 'User Type Added');            if ($insert) {                $status = "success";            } else {                $status = "failed";            }            $data['status'] = $status;        }        echo json_encode($data);    }    function edit($id) {//        $data = array();//        $data['title'] = 'Masters - Edit Category';//        if ($this->input->post('category', TRUE)) {//            $category = $this->input->post('category');//            $category['updated_date'] = date('Y-m-d H:i:s');//            $update = $this->category_model->update_category($category, $id);//            $this->session->set_flashdata('flashSuccess', 'Category successfully updated!');//            redirect($this->config->item('base_url') . 'masters/category');//        }////        $data['category'] = $this->category_model->get_category_by_id($id);        $this->template->write_view('content', 'masters/edit_member_type');        $this->template->render();    }    public function edit_member_type() {        $member_type = $this->input->post('member_type');        $status = $this->input->post('member_type_status');        $id = $this->input->post("member_type_id");        $client_id = $this->user_auth->get_user_id();        $result = $this->member_type_model->is_member_type_available($member_type, $id);        if (!empty($result[0]['id'])) {            //echo 'yes';            $data['status'] = "membertype_exists";        } else {            //echo 'no';            $updated_date = date('Y-m-d H:i:s');            $data = array(                'name' => $member_type,                'status' => $status,                'updated_date' => $updated_date            );            $update = $this->member_type_model->update_course_type($data, $id);            $this->session->set_flashdata('flashSuccess', 'Member Type Updated');            if ($update) {                $status = "success";            } else {                $status = "failed";            }            $data['status'] = $status;        }        echo json_encode($data);    }    function getMemberTypeData() {        $id = $this->input->get("id");        $data = $this->member_type_model->get_member_type_by_id($id);        echo json_encode($data);    }    function delete($id) {        $id = $this->input->post("id");        $data = array('is_deleted' => 1);        $delete = $this->member_type_model->delete_course_type($id, $data);        if ($delete == 1) {            $this->session->set_flashdata('flashSuccess', 'Course successfully deleted!');            echo '1';        } else {            $this->session->set_flashdata('flashError', 'Operation Failed!');            echo '0';        }    }    function add_category_name_available() {        $category_name = $this->input->post('category_name');        $result = $this->category_model->is_category_name_available($category_name);        echo json_encode($result);    }    function edit_category_name_available() {        $id = $this->input->post('id');        $category_name = $this->input->post('category_name');        $result = $this->category_model->edit_is_category_name_available($category_name, $id);        echo json_encode($result);    }    function view($id) {        $this->template->write_view('content', 'masters/view_member_type');        $this->template->render();    }}