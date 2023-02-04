<?phpif (!defined('BASEPATH'))    exit('No direct script access allowed');class Course_type extends MX_Controller {    function __construct() {        parent::__construct();        if (!$this->user_auth->is_logged_in()) {            redirect($this->config->item('base_url') . 'users/login');        }        $main_module = 'dashboard';        $access_arr = array(            'dashboard/index' => array('view'),            'dashboard/add' => array('add'),            'dashboard/delete' => array('delete'),        );//        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {//            redirect($this->config->item('base_url'));//        }        $this->load->model('masters/course_type_model');        $this->template->write_view('session_msg', 'users/session_msg');    }    function index() {        $data = array();        $data['title'] = 'Dashboard';        $this->template->write_view('content', 'masters/course_type', $data);        $this->template->render();    }    public function getCourseType() {        $searchQuery = $this->input->post('query');        $searchString = "";        if (!(empty($searchQuery['generalSearch'])) && $searchQuery['generalSearch'] != "") {            $searchString = $searchQuery['generalSearch'];        }        $data['data'] = $this->course_type_model->get_all_course_types($searchString);        $total_records = count($data['data']);        $pages = ceil($total_records / 10);        $data['meta'] = array(            "page" => 1,            "pages" => $pages,            "perpage" => -1,            "total" => $total_records,            "sort" => "asc",            "field" => "id"        );        //print_r($data);        echo json_encode($data);    }    function add() {//        $data = array();//        $data['title'] = 'Masters - Add New Category';//        if ($this->input->post('category', TRUE)) {//            $category = $this->input->post('category');//            $category['created_date'] = date('Y-m-d H:i:s');//            $insert = $this->category_model->insert_category($category);//            $this->session->set_flashdata('flashSuccess', 'New Category successfully added!');//            redirect($this->config->item('base_url') . 'masters/category');//        }        $this->template->write_view('content', 'masters/add_course_type');        $this->template->render();    }    function add_course_type() {        $course_type = $this->input->post('course_type');        $course_type_status = $this->input->post('course_type_status');        $result = $this->course_type_model->is_course_type_available($course_type);        if (!empty($result[0]['id'])) {            //echo 'yes';            $data['status'] = "coursetype_exists";        } else {            //echo 'no';            $created_date = date('Y-m-d H:i:s');            $course_type_data = array(                'name' => $course_type,                'status' => $course_type_status,                'created_date' => $created_date            );            $insert = $this->course_type_model->insert_course_type($course_type_data);            $this->session->set_flashdata('flashSuccess', 'User Type Added');            if ($insert) {                $status = "success";            } else {                $status = "failed";            }            $data['status'] = $status;        }        echo json_encode($data);    }    function edit($id) {//        $data = array();//        $data['title'] = 'Masters - Edit Category';//        if ($this->input->post('category', TRUE)) {//            $category = $this->input->post('category');//            $category['updated_date'] = date('Y-m-d H:i:s');//            $update = $this->category_model->update_category($category, $id);//            $this->session->set_flashdata('flashSuccess', 'Category successfully updated!');//            redirect($this->config->item('base_url') . 'masters/category');//        }////        $data['category'] = $this->category_model->get_category_by_id($id);        $this->template->write_view('content', 'masters/edit_course_type');        $this->template->render();    }    public function edit_course_type() {        $course_type = $this->input->post('course_type');        $status = $this->input->post('course_type_status');        $id = $this->input->post("course_type_id");        $client_id = $this->user_auth->get_user_id();        $result = $this->course_type_model->is_course_type_available($course_type, $id);        if (!empty($result[0]['id'])) {            //echo 'yes';            $data['status'] = "coursetype_exists";        } else {            //echo 'no';            $updated_date = date('Y-m-d H:i:s');            $course_type = array(                'name' => $course_type,                'status' => $status,                'updated_date' => $updated_date            );            $update = $this->course_type_model->update_course_type($course_type, $id);            $this->session->set_flashdata('flashSuccess', 'Course Type Updated');            if ($update) {                $status = "success";            } else {                $status = "failed";            }            $data['status'] = $status;        }        echo json_encode($data);    }    function getCourseTypeData() {        $id = $this->input->get("id");        $data = $this->course_type_model->get_course_type_by_id($id);        echo json_encode($data);    }    function delete() {        $id = $this->input->post("id");        $data = array('is_deleted' => 1);        $delete = $this->course_type_model->delete_course_type($id, $data);        if ($delete == 1) {            $this->session->set_flashdata('flashSuccess', 'Course successfully deleted!');            echo '1';        } else {            $this->session->set_flashdata('flashError', 'Operation Failed!');            echo '0';        }    }    function add_category_name_available() {        $category_name = $this->input->post('category_name');        $result = $this->category_model->is_category_name_available($category_name);        echo json_encode($result);    }    function edit_category_name_available() {        $id = $this->input->post('id');        $category_name = $this->input->post('category_name');        $result = $this->category_model->edit_is_category_name_available($category_name, $id);        echo json_encode($result);    }    function view($id) {        $this->template->write_view('content', 'masters/view_course_type');        $this->template->render();    }}