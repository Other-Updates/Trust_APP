<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sponsors extends MX_Controller {

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

        $this->load->model('sponsors/sponsors_model');
        //$this->template->write_view('session_msg', 'users/session_msg');
        //$data_msg_notify['new_message'] = $this->user_auth->get_new_message();
        //$this->template->write_view('popup', 'users/messageboard_notify', $data_msg_notify);
    }

    function index() {

        $this->template->write_view('content', 'sponsors/sponsors_list');
        $this->template->render();
    }

    function getSponsors() {
        $searchQuery = $this->input->post('query');
        $searchString = "";
        if (!(empty($searchQuery['generalSearch'])) && $searchQuery['generalSearch'] != "") {
            $searchString = $searchQuery['generalSearch'];
        }

        $query = $this->input->post('query');
        $forYearFrom = "";
        $forYearTo = "";

        if (isset($query['forYearFrom'])) {
            $forYearFrom = $query['forYearFrom'];
        }
        if (isset($query["forYearTo"])) {
            $forYearTo = $query["forYearTo"];
        }

        $search_paid = "";

        if (isset($query["search_paid"])) {
            $search_paid = $query["search_paid"];
        }


        $data['data'] = $this->sponsors_model->get_all_sponsors($searchString, $forYearFrom, $forYearTo, $search_paid);

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
        $this->template->write_view('content', 'sponsors/add_sponsor');
        $this->template->render();
    }

    function get_country() {
        $data['country'] = $this->sponsors_model->get_all_country();
        echo json_encode($data);
    }

    function get_gender() {
        $data['gender'] = $this->sponsors_model->get_all_gender();
        echo json_encode($data);
    }

    function add_new_sponsor() {

        $created_date = date('Y-m-d H:i:s');

        $sponsor_data = array(
            'sponsor_name' => $this->input->post('sponsor_name'),
            'gender_id' => $this->input->post('gender_id'),
            'mobile_no' => $this->input->post('mobile_no'),
            'email' => $this->input->post('email'),
            'landline_no' => $this->input->post('landline_no'),
            'door_no' => $this->input->post('door_no'),
            'street_name' => $this->input->post('street'),
            'address' => $this->input->post('address'),
            'residing_country' => $this->input->post('residing_country'),
            //'commitment' => $this->input->post('commitment'),
            //'paid' => $this->input->post('paid'),
            //'amount' => $this->input->post('amount'),
            //'for_year' => $this->input->post('for_year'),
            'status' => $this->input->post('status'),
            'created_date' => $created_date
        );
        $sponsor_id = $this->sponsors_model->insert_sponsor($sponsor_data);
        $this->session->set_flashdata('flashSuccess', 'Sponsor Added');
        $profile_image_status = "none";
        if ($sponsor_id) {

            $insert_status = "success";

            if (file_exists("attachments/sponsors_profile_image/" . $sponsor_id)) {
                $upload_path = "attachments/sponsors_profile_image/" . $sponsor_id . "/";
            } else {
                if (!is_dir("attachments/sponsors_profile_image/" . $sponsor_id . "/")) {
                    mkdir("attachments/sponsors_profile_image/" . $sponsor_id . "/");
                }
                $upload_path = "attachments/sponsors_profile_image/" . $sponsor_id . "/";
            }

            if (file_exists("attachments/sponsors_profile_image/thumb/" . $sponsor_id)) {
                $upload_path_thumb = "attachments/sponsors_profile_image/thumb/" . $sponsor_id . "/";
            } else {
                if (!is_dir("attachments/sponsors_profile_image/thumb/" . $sponsor_id . "/")) {
                    mkdir("attachments/sponsors_profile_image/thumb/" . $sponsor_id . "/");
                }
                $upload_path_thumb = "attachments/sponsors_profile_image/thumb/" . $sponsor_id . "/";
            }


            $filename = $_FILES['profile_picture']['name'];
            $profile_image = NULL;
            $config['upload_path'] = $upload_path;
            $allowed_types = array('jpg', 'jpeg', 'png', 'svg');
            $config['allowed_types'] = implode('|', $allowed_types);
            //$config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!empty($_FILES['profile_picture']['name'])) {
                $_FILES['profile_picture'] = array(
                    'name' => $_FILES['profile_picture']['name'],
                    'type' => $_FILES['profile_picture']['type'],
                    'tmp_name' => $_FILES['profile_picture']['tmp_name'],
                    'error' => $_FILES['profile_picture']['error'],
                    'size' => $_FILES['profile_picture']['size']
                );

                $random_hash = substr(str_shuffle(time()), 0, 3) . strrev(mt_rand(100000, 999999));
                $extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
                $config['file_name'] = 'SPI_' . $random_hash . '.' . $extension;
                $this->upload->initialize($config);
                $this->upload->do_upload('profile_picture');
                $upload_data = $this->upload->data();

                // Make thumbnail image

                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = FCPATH . 'attachments/sponsors_profile_image/' . $sponsor_id . "/" . $upload_data['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 150;
                $config['height'] = 150;
                $config['new_image'] = FCPATH . 'attachments/sponsors_profile_image/thumb/' . $sponsor_id . "/" . $upload_data['file_name'];
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                //$profile_image = base_url() . 'attachments/profile_image/' . $upload_data['file_name'];
                $profile_image = $upload_data['file_name'];
            }
            if ($profile_image) {
                $update_image['profile_picture'] = $profile_image;
                $update = $this->sponsors_model->update_sponsor_image($sponsor_id, $update_image);
                $profile_image_status = "profile_image_updated";
            } else {
                $profile_image_status = "profile_image_update_failed";
            }
        } else {
            $insert_status = "failed";
        }
        $data['status'] = $insert_status;
        $data['profile_image_status'] = $profile_image_status;

        echo json_encode($data);
    }

    public function edit($id) {
        $this->template->write_view('content', 'sponsors/edit_sponsor');
        $this->template->render();
    }

    public function getSponsorData() {
        $id = $this->input->get("id");

        $data['sponsor_details'] = $this->sponsors_model->get_sponsor_by_id($id);
        $data['sponsor_commitments'] = $this->sponsors_model->get_sponsor_commitments_sponsor_id($id);
        $data['sponsor_receipts'] = $this->sponsors_model->get_receipt_by_sponsor_id($id);
        $data['dynamic_entry_sponsor'] = $this->sponsors_model->get_dynamic_by_sponsor_id($id);
        echo json_encode($data);
    }

    public function edit_sponsor() {

        $date = date('Y-m-d H:i:s');
        $profile_image_status = "";
        $scanned_image_status = "";

        $sponsor_id = $this->input->post('sponsor_id');

        $sponsor_data = array(
            'sponsor_name' => $this->input->post('sponsor_name'),
            'gender_id' => $this->input->post('gender_id'),
            'mobile_no' => $this->input->post('mobile_no'),
            'email' => $this->input->post('email'),
            'landline_no' => $this->input->post('landline_no'),
            'door_no' => $this->input->post('door_no'),
            'street_name' => $this->input->post('street'),
            'address' => $this->input->post('address'),
            'residing_country' => $this->input->post('residing_country'),
            //'commitment' => $this->input->post('commitment'),
            //'paid' => $this->input->post('paid'),
            //'amount' => $this->input->post('amount'),
            //'for_year' => $this->input->post('for_year'),
            'status' => $this->input->post('status'),
                //'updated_date' => $updated_date
        );
        $update_sponsor_val = $this->sponsors_model->update_sponsor($sponsor_data, $sponsor_id);
        $this->session->set_flashdata('flashSuccess', 'Expense category Added');
        if ($update_sponsor_val) {
            $update_status = "success";



            if (!empty($_FILES['profile_picture']['name'])) {

                if (file_exists("attachments/sponsors_profile_image/" . $sponsor_id)) {
                    $upload_path = "attachments/sponsors_profile_image/" . $sponsor_id . "/";
                } else {
                    if (!is_dir("attachments/sponsors_profile_image/" . $sponsor_id . "/")) {
                        mkdir("attachments/sponsors_profile_image/" . $sponsor_id . "/");
                    }
                    $upload_path = "attachments/sponsors_profile_image/" . $sponsor_id . "/";
                }

                if (file_exists("attachments/sponsors_profile_image/thumb/" . $sponsor_id)) {
                    $upload_path_thumb = "attachments/sponsors_profile_image/thumb/" . $sponsor_id . "/";
                } else {
                    if (!is_dir("attachments/sponsors_profile_image/thumb/" . $sponsor_id . "/")) {
                        mkdir("attachments/sponsors_profile_image/thumb/" . $sponsor_id . "/");
                    }
                    $upload_path_thumb = "attachments/sponsors_profile_image/thumb/" . $sponsor_id . "/";
                }


                $filename = $_FILES['profile_picture']['name'];
                $profile_image = NULL;
                $config['upload_path'] = $upload_path;
                $allowed_types = array('jpg', 'jpeg', 'png', 'svg');
                $config['allowed_types'] = implode('|', $allowed_types);
                //$config['max_size'] = '10000';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!empty($_FILES['profile_picture']['name'])) {
                    $_FILES['profile_picture'] = array(
                        'name' => $_FILES['profile_picture']['name'],
                        'type' => $_FILES['profile_picture']['type'],
                        'tmp_name' => $_FILES['profile_picture']['tmp_name'],
                        'error' => $_FILES['profile_picture']['error'],
                        'size' => $_FILES['profile_picture']['size']
                    );

                    $random_hash = substr(str_shuffle(time()), 0, 3) . strrev(mt_rand(100000, 999999));
                    $extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
                    $config['file_name'] = 'SPI_' . $random_hash . '.' . $extension;
                    $this->upload->initialize($config);
                    $this->upload->do_upload('profile_picture');
                    $upload_data = $this->upload->data();

                    // Make thumbnail image

                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = FCPATH . 'attachments/sponsors_profile_image/' . $sponsor_id . "/" . $upload_data['file_name'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 150;
                    $config['height'] = 150;
                    $config['new_image'] = FCPATH . 'attachments/sponsors_profile_image/thumb/' . $sponsor_id . "/" . $upload_data['file_name'];
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    //$profile_image = base_url() . 'attachments/profile_image/' . $upload_data['file_name'];
                    $profile_image = $upload_data['file_name'];
                }
                if ($profile_image) {
                    $update_image['profile_picture'] = $profile_image;
                    $update = $this->sponsors_model->update_sponsor_image($sponsor_id, $update_image);
                    $profile_image_status = "profile_image_updated";
                } else {
                    $profile_image_status = "profile_image_update_failed";
                }
            }
        } else {
            $update_status = "failed";
        }
        $data['status'] = $update_status;
        $data['profile_image_status'] = $profile_image_status;

        echo json_encode($data);
    }

    public function delete() {
        $id = $this->input->post("id");
        $data = array('is_deleted' => 1);
        $delete = $this->sponsors_model->delete_sponsor($id, $data);

        if ($delete == 1) {
            $this->session->set_flashdata('flashSuccess', 'Expense category deleted!');
            echo '1';
        } else {
            $this->session->set_flashdata('flashError', 'Operation Failed!');

            echo '0';
        }
    }

    public function getProfile_image() {
        $id = $this->input->post('id');
        $profile_image = $this->scholarship_model->get_profile_img($id);
        if (!empty($profile_image) && is_array($profile_image)) {
            $data['has_img'] = "1";
            $data['name'] = $profile_image;
        } else {
            $data['has_img'] = "0";
        }
        echo json_encode($data);
    }

    public function get_receipt_details() {
        $sponsor_id = $this->input->get("sponsor_id");
        $data['sponsor_details'] = $this->sponsors_model->get_receipt_by_sponsor_id($sponsor_id);
        echo json_encode($data);
    }

    public function add_commitment() {
        $for_year = $this->input->post("for_year");
        $amount = $this->input->post("amount");
        //$paid_date = $this->input->post("paid_date");
        $paid = $this->input->post("paid");
        $receipt_no = $this->input->post("receipt_no");
        $remarks = $this->input->post("remarks");
        $sponsor_id = $this->input->post("sponsor_id");
        $created_date = date("Y-m-d");

        $data_commitment = array(
            'amount' => $amount,
            'for_year' => $for_year,
            'paid' => $paid,
            //'paid_date' => $paid_date,
            'receipt_no' => $receipt_no,
            'remarks' => $remarks,
            'sponsor_details_id' => $sponsor_id,
            'created_date' => $created_date
        );
        $commitment_id = $this->sponsors_model->insert_sponsor_commitment($data_commitment);
        $result = array();
        if ($commitment_id) {
            //echo "1";
            $result['status'] = "1";
            $result['commitment_id'] = $commitment_id;
            $sponsor_data = $this->sponsors_model->get_sponsor_by_id($sponsor_id);
            if ($sponsor_data[0]['for_year'] != "0000") {
                if ($paid == "1") {
                    if ($sponsor_data[0]['paid'] == 1) {
                        if ($for_year >= $sponsor_data[0]['for_year']) {
                            $update_sponsor = array(
                                'for_year' => $for_year,
                                'paid' => $paid
                            );
                            $update_commitment_in_sponsor = $this->sponsors_model->update_commitment_in_sponsor($update_sponsor, $sponsor_id);
                        }
                    } else {

                        $update_sponsor = array(
                            'for_year' => $for_year,
                            'paid' => $paid
                        );
                        $update_commitment_in_sponsor = $this->sponsors_model->update_commitment_in_sponsor($update_sponsor, $sponsor_id);
                    }
                }
//                else {
//                    if ($sponsor_data[0]['paid'] != 1) {
//                        if ($for_year >= $sponsor_data[0]['for_year']) {
//                            $update_sponsor = array(
//                                'for_year' => $for_year,
//                                'paid' => $paid
//                            );
//                            $update_commitment_in_sponsor = $this->sponsors_model->update_commitment_in_sponsor($update_sponsor, $sponsor_id);
//                        }
//                    } else {
//                        if ($for_year == $sponsor_data[0]['for_year']) {
//                            $update_sponsor = array(
//                                'for_year' => $for_year,
//                                'paid' => $paid
//                            );
//                            $update_commitment_in_sponsor = $this->sponsors_model->update_commitment_in_sponsor($update_sponsor, $sponsor_id);
//                        }
//                    }
//                }
            } else {
                if ($paid == "1") {
                    $update_sponsor = array(
                        'for_year' => $for_year,
                        'paid' => $paid
                    );
                    $update_commitment_in_sponsor = $this->sponsors_model->update_commitment_in_sponsor($update_sponsor, $sponsor_id);
                }
            }
        } else {
            //echo "0";
            $result['status'] = "0";
        }
        echo json_encode($result);
    }

    public function update_commitment() {
        $for_year = $this->input->post("for_year");
        $amount = $this->input->post("amount");
        //$paid_date = $this->input->post("paid_date");
        $paid = $this->input->post("paid");
        $receipt_no = $this->input->post("receipt_no");
        $remarks = $this->input->post("remarks");
        $sponsor_id = $this->input->post("sponsor_id");
        $updated_date = date("Y-m-d");
        $commitment_id = $this->input->post("commitment_id");

        $data_commitment = array(
            'amount' => $amount,
            'for_year' => $for_year,
            'paid' => $paid,
            //'paid_date' => $paid_date,
            'receipt_no' => $receipt_no,
            'remarks' => $remarks,
            'sponsor_details_id' => $sponsor_id,
                //'updated_date' => $updated_date
        );

        $commitment_id = $this->sponsors_model->update_sponsor_commitment($data_commitment, $commitment_id);
        if ($commitment_id) {
            echo "1";
            $sponsor_data = $this->sponsors_model->get_sponsor_by_id($sponsor_id);
            if ($sponsor_data[0]['for_year'] != "0000") {
                if ($paid == "1") {
                    if ($sponsor_data[0]['paid'] == 1) {
                        if ($for_year >= $sponsor_data[0]['for_year']) {
                            $update_sponsor = array(
                                'for_year' => $for_year,
                                'paid' => $paid
                            );
                            $update_commitment_in_sponsor = $this->sponsors_model->update_commitment_in_sponsor($update_sponsor, $sponsor_id);
                        }
                    } else {
                        $update_sponsor = array(
                            'for_year' => $for_year,
                            'paid' => $paid
                        );
                        $update_commitment_in_sponsor = $this->sponsors_model->update_commitment_in_sponsor($update_sponsor, $sponsor_id);
                    }
                } else {

                    if ($for_year == $sponsor_data[0]['for_year']) {
                        $update_sponsor = array(
                            'for_year' => '0000',
                            'paid' => $paid
                        );
                        $update_commitment_in_sponsor = $this->sponsors_model->update_commitment_in_sponsor($update_sponsor, $sponsor_id);
                    }
//                    if ($sponsor_data[0]['paid'] != 1) {
//                        if ($for_year >= $sponsor_data[0]['for_year']) {
//                            $update_sponsor = array(
//                                'for_year' => $for_year,
//                                'paid' => $paid
//                            );
//                            $update_commitment_in_sponsor = $this->sponsors_model->update_commitment_in_sponsor($update_sponsor, $sponsor_id);
//                        }
//                    } else {
//                        if ($for_year == $sponsor_data[0]['for_year']) {
//                            $update_sponsor = array(
//                                'for_year' => $for_year,
//                                'paid' => $paid
//                            );
//                            $update_commitment_in_sponsor = $this->sponsors_model->update_commitment_in_sponsor($update_sponsor, $sponsor_id);
//                        }
//                    }
                }
            } else {
                if ($paid == "1") {
                    $update_sponsor = array(
                        'for_year' => $for_year,
                        'paid' => $paid
                    );
                    $update_commitment_in_sponsor = $this->sponsors_model->update_commitment_in_sponsor($update_sponsor, $sponsor_id);
                }
            }
        } else {
            echo "0";
        }
    }

    function delete_commitment() {
        $id = $this->input->post("commitment_id");
        $data = array('is_deleted' => 1);
        $delete = $this->sponsors_model->delete_commitment_entry($id, $data);

        if ($delete == 1) {
            $this->session->set_flashdata('flashSuccess', 'Commitment deleted!');
            echo '1';
        } else {
            $this->session->set_flashdata('flashError', 'Operation Failed!');

            echo '0';
        }
    }

    public function view($id) {
        $this->template->write_view('content', 'sponsors/view_sponsor');
        $this->template->render();
    }

    public function add_custom_entry() {

        $custom_label = $this->input->post("custom_label");
        $custom_value = $this->input->post("custom_value");
        $sponsor_id = $this->input->post("sponsor_id");
        $created_date = date("Y-m-d H:i:s");

        $data_custom_entry = array(
            'label_name' => $custom_label,
            'value' => $custom_value,
            'sponsor_id' => $sponsor_id,
            'created_on' => $created_date
        );
        $custom_entry_id = $this->sponsors_model->insert_sponsor_custom_entry($data_custom_entry);
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
        $sponsor_id = $this->input->post("sponsor_id");
        $custom_entry_id = $this->input->post("entry_id");

        $data_custom_entry = array(
            'label_name' => $custom_label,
            'value' => $custom_value,
            'sponsor_id' => $sponsor_id,
        );

        $custom_entry_id = $this->sponsors_model->update_sponsor_custom_entry($data_custom_entry, $custom_entry_id);
        if ($custom_entry_id) {
            $result['status'] = "1";
            $result['sponsor_id'] = $sponsor_id;
        } else {
            $result['status'] = "0";
        }
        echo json_encode($result);
    }

    public function delete_custom_entry_update() {
        $id = $this->input->post("entry_id");
        //$data = array('is_deleted' => 1);
        $delete = $this->sponsors_model->delete_sponsor_custom_entry($id);
        if ($delete) {
            echo "1";
        } else {
            echo "0";
        }
    }

    function get_street_list() {
        $data['street'] = $this->sponsors_model->get_all_street();
        echo json_encode($data);
    }

    function sponsor_report() {
        $search_data = $_GET['search'];
        $decode_data = json_decode($search_data);

        $searchString = $decode_data[0]->searchString;

        $data = $this->sponsors_model->export_all_sponsors_list($searchString, "", "", "");

        $this->export_all_sponsors($data);
        echo json_encode($data);
    }

    function export_all_sponsors($query, $timezones = array()) {
        // output headers so that the file is downloaded rather than displayed
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Sponsors_list.xls");

        $heading = array('S.No', 'Sponsor Name', 'Country', 'Mobile');

        echo implode("\t", $heading) . "\n";
        //$heading = false;
        if (!empty($query))
            foreach ($query as $row) {
                //print_r($row);
                //array_keys($row)
                //echo implode("\t", array_values($row)) . "\n";
                echo $row['serial_number'] . "\t" . $row['sponsor_name'] . "\t" . $row['countries_name'] . "\t" . $row['mobile_no'] . "\n";
            }
        exit;
    }
    function validate_commitment(){	
        $for_year = $this->input->post("for_year");	
        $remarks = $this->input->post("remarks");	
        $sponsor_id = $this->input->post("sponsor_id");	
        $commitment_id = $this->input->post("commitment_id");	
        $custom_entry_id = $this->sponsors_model->validate_commitment_model($for_year, $remarks,$sponsor_id,$commitment_id);	
        if (count($custom_entry_id)) {	
            $result['status'] = "1";	
        } else {	
            $result['status'] = "0";	
        }	
        echo json_encode($result);	
    }

}
