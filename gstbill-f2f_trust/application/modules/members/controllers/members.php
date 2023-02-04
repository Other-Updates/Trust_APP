<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Members extends MX_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->user_auth->is_logged_in()) {
            redirect($this->config->item('base_url') . 'users/login');
        }
//        $main_module = 'members';
//        $access_arr = array(
//            'dashboard/index' => array('view'),
//            'dashboard/add' => array('add'),
//            'dashboard/delete' => array('delete'),
//        );
//        if (!$this->user_auth->is_permission_allowed($access_arr, $main_module)) {
//            redirect($this->config->item('base_url'));
//        }

        $this->load->model('members/members_model');
        //$this->template->write_view('session_msg', 'users/session_msg');
        //$data_msg_notify['new_message'] = $this->user_auth->get_new_message();
        //$this->template->write_view('popup', 'users/messageboard_notify', $data_msg_notify);
    }

    function index() {


        $this->template->write_view('content', 'members/members_list');
        $this->template->render();
    }

    function getMembers() {
        //$data['data'] = $this->members_model->get_all_members();
        $searchQuery = $this->input->post('query');
        $searchString = "";
        if (!(empty($searchQuery['generalSearch'])) && $searchQuery['generalSearch'] != "") {
            $searchString = $searchQuery['generalSearch'];
        }

        $query = $this->input->post('query');
        $from_date = "";
        $to_date = "";

        if (isset($query['fromDate'])) {
            $from_date = $query['fromDate'];
        }
        if (isset($query["toDate"])) {
            $to_date = $query["toDate"];
        }

        $data['data'] = $this->members_model->get_all_members_list($searchString, $from_date, $to_date);

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

        echo json_encode($data);
    }

    function add() {

        $this->template->write_view('content', 'members/add_members');
        $this->template->render();
    }

    function add_new_member() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $position_id = $this->input->post('position_id');

        $check_username_exists = $this->members_model->is_username_available($username);
        if ($email != "") {
            $check_email_exists = $this->members_model->is_email_available($email);
        }
        if ($position_id != "") {
            $check_position_exists = $this->members_model->is_position_available($position_id);
        }

        if (!empty($check_username_exists[0]['id'])) {
            if ($check_username_exists[0]['is_deleted'] == "1") {
                $data['status'] = "username_deleted";
            } else {
                $data['status'] = "username_exists";
            }
        } else if (!empty($check_email_exists[0]['id'])) {
            if ($check_email_exists[0]['is_deleted'] == "1") {
                $data['status'] = "email_deleted";
            } else {
                $data['status'] = "email_exists";
            }
        } else if (!empty($check_position_exists[0]['id'])) {

            $data['status'] = "position_exists";
        } else {

            $name = $this->input->post('member_name');
            $dob = $this->input->post('dob');
            $lifetime_member = $this->input->post('lifetime_member');
            $door_no = $this->input->post('door_no');
            $street = $this->input->post('street');
            $country = $this->input->post('country');
            $qualification = $this->input->post('qualification');
            $occupation = $this->input->post('occupation');
            $member_since = $this->input->post('member_since');
            $mobile_number = $this->input->post('mobile_number');
            $landline_number = $this->input->post('landline_number');
            $status = $this->input->post('status');
            $member_type_id = $this->input->post('member_type_id');
            $position_id = $this->input->post('position_id');
            $user_type_id = $this->input->post('user_type_id');

            $created_date = date('Y-m-d H:i:s');

            if ($this->input->post('member_type_id') == "") {
                $member_type_id = NULL;
            }

            if ($this->input->post('user_type_id') == "") {
                $user_type_id = NULL;
            }

            if ($this->input->post('position_id') == "") {
                $position_id = NULL;
            }

            $member_data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'name' => $this->input->post('member_name'),
                'dob' => $this->input->post('dob'),
                'life_member' => $this->input->post('lifetime_member'),
                'door_no' => $this->input->post('door_no'),
                'street_name' => $this->input->post('street'),
                'address' => $this->input->post('address'),
                'residing_country' => $this->input->post('country'),
                'qualification' => $this->input->post('qualification'),
                'occupation' => $this->input->post('occupation'),
                'member_since' => $this->input->post('member_since'),
                'mobile_number' => $this->input->post('mobile_number'),
                'landline_number' => $this->input->post('landline_number'),
                'status' => $this->input->post('status'),
                'status_id' => $this->input->post('status'),
                'member_type_id' => $member_type_id,
                'position_id' => $position_id,
                'user_type_id' => $user_type_id,
                'is_new_user' => "1",
                'created_date' => $created_date
            );
            $insert = $this->members_model->insert_member($member_data);
            $this->session->set_flashdata('flashSuccess', 'Expense category Added');
            if ($insert) {
                $insert_status = "success";

                $date_from = date("Y-m-d");
                $position_history_data = array(
                    'user_id' => $insert,
                    'position_id' => $position_id,
                    'date_from' => $date_from,
                    'created_date' => $created_date
                );

                $position_history_insert_id = $this->members_model->insert_position_history($position_history_data);


                $data_email = array();
                $this->load->library('email');
                $config = array(
                    'protocol' => 'mail',
                    'charset' => 'utf-8',
                    'wordwrap' => FALSE,
                    'mailtype' => 'html'
                );
                $this->email->initialize($config);
                $data_email = array();
                //$data_email['id'] = urlencode(base64_encode($insert));

                $data_email['name'] = $name;
                $data_email['username'] = $username;
                $data_email['password'] = $password;

                //email template content

                $from_email_address = "iqrakpm@gmail.com";
                $from_name = "IQRA";


                $subject = "IQRA - New Member Registration";

                $htmlContent = $this->load->view('members/new_user_mail.php', $data_email, TRUE);
                $this->email->from($from_email_address, $from_name);
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($htmlContent);
                $t = $this->email->send();

                if ($t) {
                    $data['email_status'] = "1";
                } else {
                    $data['email_status'] = "0";
                }




                $filename = $_FILES['profile_image']['name'];
                $profile_image = NULL;
                $config['upload_path'] = './attachments/profile_image/';
                $allowed_types = array('jpg', 'jpeg', 'png', 'svg');
                $config['allowed_types'] = implode('|', $allowed_types);
                //$config['max_size'] = '10000';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!empty($_FILES['profile_image']['name'])) {
                    $_FILES['profile_image'] = array(
                        'name' => $_FILES['profile_image']['name'],
                        'type' => $_FILES['profile_image']['type'],
                        'tmp_name' => $_FILES['profile_image']['tmp_name'],
                        'error' => $_FILES['profile_image']['error'],
                        'size' => $_FILES['profile_image']['size']
                    );

                    $random_hash = substr(str_shuffle(time()), 0, 3) . strrev(mt_rand(100000, 999999));
                    $extension = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
                    $config['file_name'] = 'PI_' . $random_hash . '.' . $extension;
                    $this->upload->initialize($config);
                    $this->upload->do_upload('profile_image');
                    $upload_data = $this->upload->data();

                    // Make thumbnail image

                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = FCPATH . 'attachments/profile_image/' . $upload_data['file_name'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 150;
                    $config['height'] = 150;
                    $config['new_image'] = FCPATH . 'attachments/profile_image/thumb/' . $upload_data['file_name'];
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    //$profile_image = base_url() . 'attachments/profile_image/' . $upload_data['file_name'];
                    $profile_image = $upload_data['file_name'];
                }
                if ($profile_image) {
                    $update['profile_picture'] = $profile_image;
                    $update = $this->members_model->update_profile_image($insert, $update);
                }
            } else {
                $insert_status = "failed";
            }
            $data['status'] = $insert_status;
        }

        echo json_encode($data);
    }

    function edit($id) {

        $this->template->write_view('content', 'members/edit_members');
        $this->template->render();
    }

    public function getMemberData() {

        $id = $this->input->get("id");

        $data['member_details'] = $this->members_model->get_member_by_id($id);
        $data['dynamic_entry_member'] = $this->members_model->get_dynamic_entry_by_member_id($id);
        echo json_encode($data);
    }

    public function update_member_details() {
        $member_id = $this->input->post('member_id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $position_id = $this->input->post('position_id');

        $member_details = $this->members_model->get_member_by_id($member_id);

        $check_username_exists = $this->members_model->is_username_available($username, $member_id);

        $check_email_exists = "";
        $check_position_exists = "";
        if ($email != "") {
            $check_email_exists = $this->members_model->is_email_available($email, $member_id);
        }
        if ($position_id != "") {
            $check_position_exists = $this->members_model->is_position_available($position_id, $member_id);
        }

        if (!empty($check_username_exists[0]['id'])) {
            if ($check_username_exists[0]['is_deleted'] == "1") {
                $data['status'] = "username_deleted";
            } else {
                $data['status'] = "username_exists";
            }
        } else if (!empty($check_email_exists[0]['id'])) {
            if ($check_email_exists[0]['is_deleted'] == "1") {
                $data['status'] = "email_deleted";
            } else {
                $data['status'] = "email_exists";
            }
        } else if (!empty($check_position_exists[0]['id'])) {

            $data['status'] = "position_exists";
        } else {
            $name = $this->input->post('member_name');
            $password = $this->input->post('password');
            $dob = $this->input->post('dob');
            $lifetime_member = $this->input->post('lifetime_member');
            $door_no = $this->input->post('door_no');
            $street = $this->input->post('street');
            $country = $this->input->post('country');
            $qualification = $this->input->post('qualification');
            $occupation = $this->input->post('occupation');
            $member_since = $this->input->post('member_since');
            $mobile_number = $this->input->post('mobile_number');
            $landline_number = $this->input->post('landline_number');
            $status = $this->input->post('status');
            $member_type_id = $this->input->post('member_type_id');
            $user_type_id = $this->input->post('user_type_id');
            $position_id = $this->input->post('position_id');

            $date = date('Y-m-d H:i:s');

            if ($this->input->post('member_type_id') == "") {
                $member_type_id = NULL;
            }

            if ($this->input->post('user_type_id') == "") {
                $user_type_id = NULL;
            }

            if ($this->input->post('position_id') == "") {
                $position_id = NULL;
            }

            $member_data = array(
                'username' => $this->input->post('username'),
                //'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'name' => $this->input->post('member_name'),
                'dob' => $this->input->post('dob'),
                'life_member' => $this->input->post('lifetime_member'),
                'door_no' => $this->input->post('door_no'),
                'street_name' => $this->input->post('street'),
                'address' => $this->input->post('address'),
                'residing_country' => $this->input->post('country'),
                'qualification' => $this->input->post('qualification'),
                'occupation' => $this->input->post('occupation'),
                'member_since' => $this->input->post('member_since'),
                'mobile_number' => $this->input->post('mobile_number'),
                'landline_number' => $this->input->post('landline_number'),
                'status' => $this->input->post('status'),
                'status_id' => "1",
                'member_type_id' => $member_type_id,
                'user_type_id' => $user_type_id,
                'position_id' => $position_id,
                'updated_date' => $date
            );


            $update = $this->members_model->update_member($member_data, $member_id);
            if ($password != "") {
                $member_pwd_data = array(
                    'password' => $this->input->post('password'),
                );
                $update_pwd = $this->members_model->update_member($member_pwd_data, $member_id);
            }
            $this->session->set_flashdata('flashSuccess', 'Member Updates');
            if ($update) {
                $update_status = "success";

                if ($member_details[0]['position_id'] != $position_id) {

                    $position_history_data = $this->members_model->get_position_history_by_member_id($member_id);
                    $insert_position_history_data = array(
                        'user_id' => $member_id,
                        'position_id' => $position_id,
                        'date_from' => $date,
                        'created_date' => $date
                    );
                    $position_history_insert_id = $this->members_model->insert_position_history($insert_position_history_data);

                    $update_position_history_data = array(
                        'date_to' => $date,
                        'updated_date' => $date
                    );

                    $update_position_history = $this->members_model->update_position_history($update_position_history_data, $position_history_data[0]['id']);
                }

                if (isset($_FILES['profile_image']['name'])) {

                    $filename = $_FILES['profile_image']['name'];
                    $profile_image = NULL;
                    $config['upload_path'] = './attachments/profile_image/';
                    $allowed_types = array('jpg', 'jpeg', 'png', 'svg');
                    $config['allowed_types'] = implode('|', $allowed_types);
                    //$config['max_size'] = '10000';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!empty($_FILES['profile_image']['name'])) {
                        $_FILES['profile_image'] = array(
                            'name' => $_FILES['profile_image']['name'],
                            'type' => $_FILES['profile_image']['type'],
                            'tmp_name' => $_FILES['profile_image']['tmp_name'],
                            'error' => $_FILES['profile_image']['error'],
                            'size' => $_FILES['profile_image']['size']
                        );

                        $random_hash = substr(str_shuffle(time()), 0, 3) . strrev(mt_rand(100000, 999999));
                        $extension = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
                        $config['file_name'] = 'PI_' . $random_hash . '.' . $extension;
                        $this->upload->initialize($config);
                        $this->upload->do_upload('profile_image');
                        $upload_data = $this->upload->data();

                        // Make thumbnail image

                        $this->load->library('image_lib');
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = FCPATH . 'attachments/profile_image/' . $upload_data['file_name'];
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = FALSE;
                        $config['width'] = 150;
                        $config['height'] = 150;
                        $config['new_image'] = FCPATH . 'attachments/profile_image/thumb/' . $upload_data['file_name'];
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();

                        //$profile_image = base_url() . 'attachments/profile_image/' . $upload_data['file_name'];
                        $profile_image = $upload_data['file_name'];
                    }
                    if ($profile_image) {
                        $update_profile['profile_picture'] = $profile_image;
                        $update_result = $this->members_model->update_profile_image($member_id, $update_profile);
                    }
                }
            } else {
                $update_status = "failed";
            }
            $data['status'] = $update_status;
        }
        echo json_encode($data);
    }

    function delete($id) {
        $id = $this->input->post("id");
        $data = array('is_deleted' => 1);
        $delete = $this->members_model->delete_member($id, $data);

        if ($delete == 1) {
            $this->session->set_flashdata('flashSuccess', 'Expense category deleted!');
            echo '1';
        } else {
            $this->session->set_flashdata('flashError', 'Operation Failed!');

            echo '0';
        }
    }

    function get_country_list() {
        $data['country'] = $this->members_model->get_all_country();
        echo json_encode($data);
    }

    function get_street_list() {
        $data['street'] = $this->members_model->get_all_street();
        echo json_encode($data);
    }

    function get_member_type() {
        $data['member_type'] = $this->members_model->get_all_member_type();
        echo json_encode($data);
    }

    function get_user_type() {
        $data['user_type'] = $this->members_model->get_all_user_type();
        echo json_encode($data);
    }

    function get_position() {
        $data['position'] = $this->members_model->get_all_positions();
        echo json_encode($data);
    }

    function test_mail() {
        $data_email = array();
        $this->load->library('email');
        $config = array(
            'protocol' => 'mail',
            'charset' => 'utf-8',
            'wordwrap' => FALSE,
            'mailtype' => 'html'
        );
        $this->email->initialize($config);
        $data_email = array();
        //$data_email['id'] = urlencode(base64_encode($insert));

        $data_email['name'] = $name;
        $data_email['username'] = $username;
        $data_email['password'] = $password;

        //email template content

        $email = "ftwoftesting@gmail.com";
        $from_email_address = "f2ftestone@gmail.com";
        $from_name = "test";

        $htmlContent .= $this->load->view('members/new_user_mail.php', $data_email, TRUE);
        $this->email->from($from_email_address, $from_name);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($htmlContent);
        $t = $this->email->send();
        if ($t) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function position_history($id) {
        $this->template->write_view('content', 'members/position_history');
        $this->template->render();
    }

    public function getPositionHistory() {

        $id = $this->input->get("id");
        $data['member_data'] = $this->members_model->get_member_by_id($id);
        $data['position_history'] = $this->members_model->get_all_position_history_by_member_id($id);
        echo json_encode($data);
    }

    public function getProfile_image() {
        $id = $this->input->post('id');
        $profile_image = $this->members_model->get_profile_img($id);
        if (!empty($profile_image) && is_array($profile_image)) {
            $data['has_img'] = "1";
            $data['name'] = $profile_image;
        } else {
            $data['has_img'] = "0";
        }
        echo json_encode($data);
    }

    public function view($id) {
        $this->template->write_view('content', 'members/view_members');
        $this->template->render();
    }

    public function add_custom_entry() {

        $custom_label = $this->input->post("custom_label");
        $custom_value = $this->input->post("custom_value");
        $member_id = $this->input->post("member_id");
        $created_date = date("Y-m-d H:i:s");

        $data_custom_entry = array(
            'label_name' => $custom_label,
            'value' => $custom_value,
            'member_id' => $member_id,
            'created_on' => $created_date
        );
        $custom_entry_id = $this->members_model->insert_member_custom_entry($data_custom_entry);
        if ($custom_entry_id) {
            $result['status'] = "1";
            $result['custom_entry_id'] = $custom_entry_id;
        } else {
            $result['status'] = "0";
        }
        echo json_encode($result);
    }

    public function update_custom_entry() {
        $custom_label = $this->input->post("custom_label");
        $custom_value = $this->input->post("custom_value");
        $member_id = $this->input->post("member_id");
        $custom_entry_id = $this->input->post("entry_id");

        $data_custom_entry = array(
            'label_name' => $custom_label,
            'value' => $custom_value,
            'member_id' => $member_id,
        );

        $custom_entry_id = $this->members_model->update_member_custom_entry($data_custom_entry, $custom_entry_id);
        if ($custom_entry_id) {
            $result['status'] = "1";
            $result['member_id'] = $member_id;
        } else {
            $result['status'] = "0";
        }
        echo json_encode($result);
    }

    public function delete_custom_entry_update() {
        $id = $this->input->post("entry_id");
        //$data = array('is_deleted' => 1);
        $delete = $this->members_model->delete_member_custom_entry($id);
        if ($delete) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function excel_export_test() {
        $this->template->write_view('content', 'members/test_excel');
        $this->template->render();
        //$this->load->view("members/test_excel");
    }

    public function member_report() {

        $search_data = $_GET['search'];
        $decode_data = json_decode($search_data);

        $searchString = $decode_data[0]->searchString;

        $from_date = $decode_data[1]->from;
        $to_date = $decode_data[2]->to;

        $data = $this->members_model->export_all_members_list($searchString, $from_date, $to_date);


        $this->export_all_members($data);
        echo json_encode($data);
    }

    function export_all_members($query, $timezones = array()) {
        // output headers so that the file is downloaded rather than displayed
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Member_list.xls");

        $heading = array('S.No', 'Name', 'Member Type', 'Street', 'Country', 'Mobile', 'Position', 'Status');

        echo implode("\t", $heading) . "\n";
        //$heading = false;
        if (!empty($query))
            foreach ($query as $row) {
                //print_r($row);
                //array_keys($row)
                //echo implode("\t", array_values($row)) . "\n";
                echo $row['serial_number'] . "\t" . $row['name'] . "\t" . $row['member_type_name'] . "\t" . $row['streetname'] . "\t" . $row['countries_name'] . "\t" . $row['mobile_number'] . "\t" . $row['position_name'] . "\t" . $row['memberStatus'] . "\n";
            }
        exit;
    }

}
