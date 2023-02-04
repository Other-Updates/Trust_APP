<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Scholarship extends MX_Controller {

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

        $this->load->model('scholarship/scholarship_model');
        //$this->template->write_view('session_msg', 'users/session_msg');
        //$data_msg_notify['new_message'] = $this->user_auth->get_new_message();
        //$this->template->write_view('popup', 'users/messageboard_notify', $data_msg_notify);
    }

    function index() {


        $this->template->write_view('content', 'scholarship/scholarship_list');
        $this->template->render();
    }

    function getScholarships() {
        $searchQuery = $this->input->post('query');
        $searchString = "";
        if (!(empty($searchQuery['generalSearch'])) && $searchQuery['generalSearch'] != "") {
            $searchString = $searchQuery['generalSearch'];
        }

        $query = $this->input->post('query');
//        $approvedYearFrom = $query['approvedYearFrom'];
//        $approvedYearTo = $query["approvedYearTo"];
//        $repaymentYearFrom = $query["repaymentYearFrom"];
//        $repaymentYearTo = $query["repaymentYearTo"];
//        $courseCompletedYearFrom = $query["courseCompletedYearFrom"];
//        $courseCompletedYearTo = $query["courseCompletedYearTo"];

        $approvedYear = "";
        $repaymentYear = "";
        $courseCompletedYear = "";
        $applicationDate = "";

        $application_type = "";
        $payment_on_hold = "";
        $course_type = "";

        if (isset($query['approvedYear'])) {
            $approvedYear = $query['approvedYear'];
        }
        if (isset($query["repaymentYear"])) {
            $repaymentYear = $query["repaymentYear"];
        }

        if (isset($query["courseCompletedYear"])) {
            $courseCompletedYear = $query["courseCompletedYear"];
        }

        if (isset($query["applicationDate"])) {	
            $applicationDate = $query["applicationDate"];	
        }

        if (isset($query["application_type"])) {
            $application_type = $query["application_type"];
        }
        if (isset($query["payment_on_hold"])) {
            $payment_on_hold = $query["payment_on_hold"];
        }
        if (isset($query["course_type"])) {
            $course_type = $query["course_type"];
        }

//        $data['data'] = $this->scholarship_model->get_all_scholarships($searchString, $approvedYearFrom, $approvedYearTo, $repaymentYearFrom, $repaymentYearTo, $courseCompletedYearFrom, $courseCompletedYearTo, $application_type, $payment_on_hold, $course_type);
        $data['data'] = $this->scholarship_model->get_all_scholarships($searchString, $approvedYear, $repaymentYear, $courseCompletedYear,$applicationDate, $application_type, $payment_on_hold, $course_type);

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
        $this->template->write_view('content', 'scholarship/add_scholarship');
        $this->template->render();
    }

    function get_application_type() {
        $data['application_type'] = $this->scholarship_model->get_all_application_type();
        echo json_encode($data);
    }

    function get_gender() {
        $data['gender'] = $this->scholarship_model->get_all_gender();
        echo json_encode($data);
    }

    function get_course_type() {
        $data['course_type'] = $this->scholarship_model->get_all_course_type();
        echo json_encode($data);
    }

    function get_zakaath_amt() {
        $data['zakaath_amount_detail'] = $this->scholarship_model->get_zakaath_detail();
        echo json_encode($data);
    }

    function add_new_scholarship() {

        $iqra_scholarship_id = "";
        $last_row = $this->scholarship_model->get_last_iqra_id();

        $last_iqra_id = $last_row[0]['scholarship_id'];

        $id_date = date("dmy");
        $id_count = 1;

        $split_id = explode("/", $last_iqra_id);
        if ($split_id[0] == $id_date) {
            $id_count = $split_id[1] + 1;
        }
        $id = $id_date . "/" . $id_count;
        //echo $id;
        //print_r($_FILES);
        $created_date = date('Y-m-d H:i:s');

        $scholarship_data = array(
            'scholarship_id' => $id,
            'application_date' => $this->input->post('application_date'),
            'approved_amount' => $this->input->post('approved_amount'),
            'approved_year' => $this->input->post('approved_year'),
            'application_type_id' => $this->input->post('application_type_id'),
            'years_sponsored' => $this->input->post('years_sponsored'),
            'student_name' => $this->input->post('student_name'),
            'gender_id' => $this->input->post('gender_id'),
            'dob' => $this->input->post('dob'),
            'mobile_no' => $this->input->post('mobile_no'),
            'email' => $this->input->post('email'),
            'landline_no' => $this->input->post('landline_no'),
            'doorno' => $this->input->post('door_no'),
            'street' => $this->input->post('street'),
            'address' => $this->input->post('address'),
            'college_name' => $this->input->post('college_name'),
            'college_address' => $this->input->post('college_address'),
            'course_name' => $this->input->post('course_name'),
            'course_type_id' => $this->input->post('course_type_id'),
            'course_completed_year' => $this->input->post('course_completed_year'),
            'has_repayments' => $this->input->post('has_repayments'),
            'payment_on_hold' => $this->input->post('payment_on_hold'),
            'repayment_completed_year' => $this->input->post('repayment_completed_year'),
            'zakaath_amount' => $this->input->post('zakaath_amount'),
            'status' => "1",
            'created_date' => $created_date
        );
        if($this->input->post('scanned_copy_of_application_name'))
            $scholarship_data['scanned_copy_of_application_name'] = $this->input->post('scanned_copy_of_application_name');
        $scholarship_id = $this->scholarship_model->insert_scholarship($scholarship_data);
        $this->session->set_flashdata('flashSuccess', 'Expense category Added');
        $scanned_image_status = "none";
        $profile_image_status = "none";
        $supporting_doc_status = array();
        if ($scholarship_id) {


            $subtract_amt = $this->input->post('zakaath_amount');


            if ($this->input->post('zakaath_amount') > 0) {

                $update_zakaath_amount = $this->scholarship_model->subtract_zakaath_amount($subtract_amt);

                if ($update_zakaath_amount) {
                    $data_zakaathamt_history = array(
                        'scholarship_id' => $scholarship_id,
                        'amount' => $subtract_amt,
                        'action' => "Debited",
                        'date_created' => $created_date
                    );

                    $add_zakaathamt_history = $this->scholarship_model->add_zakaath_scholarship_history($data_zakaathamt_history);
                }
            }

            $user_id = $this->user_auth->get_user_id();

            if ($this->input->post('remark') != "") {
                $data_remark = array(
                    'remarks' => $this->input->post('remark'),
                    'scholarship_details_id' => $scholarship_id,
                    'member_id' => $user_id,
                    'created_date' => $created_date
                );

                $insert_remark = $this->scholarship_model->insert_remark($data_remark);
            }

            $insert_status = "success";

            if (file_exists("attachments/scholar_profile_pictures/" . $scholarship_id)) {
                $upload_path = "attachments/scholar_profile_pictures/" . $scholarship_id . "/";
            } else {
                if (!is_dir("attachments/scholar_profile_pictures/" . $scholarship_id . "/")) {
                    mkdir("attachments/scholar_profile_pictures/" . $scholarship_id . "/");
                }
                $upload_path = "attachments/scholar_profile_pictures/" . $scholarship_id . "/";
            }

            if (file_exists("attachments/scholar_profile_pictures/thumb/" . $scholarship_id)) {
                $upload_path_thumb = "attachments/scholar_profile_pictures/thumb/" . $scholarship_id . "/";
            } else {
                if (!is_dir("attachments/scholar_profile_pictures/thumb/" . $scholarship_id . "/")) {
                    mkdir("attachments/scholar_profile_pictures/thumb/" . $scholarship_id . "/");
                }
                $upload_path_thumb = "attachments/scholar_profile_pictures/thumb/" . $scholarship_id . "/";
            }


            $filename = $_FILES['profile_picture']['name'];
            $profile_image = NULL;
            $config['upload_path'] = $upload_path;
            $allowed_types = array('jpg', 'jpeg', 'png', 'svg', 'pdf', 'txt', 'xls', 'xlsx');
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
                $config['source_image'] = FCPATH . 'attachments/scholar_profile_pictures/' . $scholarship_id . "/" . $upload_data['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 150;
                $config['height'] = 150;
                $config['new_image'] = FCPATH . 'attachments/scholar_profile_pictures/thumb/' . $scholarship_id . "/" . $upload_data['file_name'];
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                //$profile_image = base_url() . 'attachments/profile_image/' . $upload_data['file_name'];
                $profile_image = $upload_data['file_name'];
            }
            if ($profile_image) {
                $update_image['profile_picture'] = $profile_image;
                $update = $this->scholarship_model->update_scholarship_image($scholarship_id, $update_image);
                $profile_image_status = "profile_image_updated";
            } else {
                $profile_image_status = "profile_image_update_failed";
            }



            if (file_exists("attachments/scanned_copy_of_application/" . $scholarship_id)) {
                $upload_path = "attachments/scanned_copy_of_application/" . $scholarship_id . "/";
            } else {
                if (!is_dir("attachments/scanned_copy_of_application/" . $scholarship_id . "/")) {
                    mkdir("attachments/scanned_copy_of_application/" . $scholarship_id . "/");
                }
                $upload_path = "attachments/scanned_copy_of_application/" . $scholarship_id . "/";
            }


            $filename = $_FILES['scanned_copy_of_application']['name'];
            $profile_image = NULL;
            $config['upload_path'] = $upload_path;
            $allowed_types = array('jpg', 'jpeg', 'png', 'svg', 'pdf', 'txt', 'xls', 'xlsx');
            $config['allowed_types'] = implode('|', $allowed_types);
            //$config['max_size'] = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!empty($_FILES['scanned_copy_of_application']['name'])) {
                $_FILES['scanned_copy_of_application'] = array(
                    'name' => $_FILES['scanned_copy_of_application']['name'],
                    'type' => $_FILES['scanned_copy_of_application']['type'],
                    'tmp_name' => $_FILES['scanned_copy_of_application']['tmp_name'],
                    'error' => $_FILES['scanned_copy_of_application']['error'],
                    'size' => $_FILES['scanned_copy_of_application']['size']
                );

                $random_hash = substr(str_shuffle(time()), 0, 3) . strrev(mt_rand(100000, 999999));
                $extension = pathinfo($_FILES['scanned_copy_of_application']['name'], PATHINFO_EXTENSION);
                $config['file_name'] = 'ACI_' . $random_hash . '.' . $extension;
                $this->upload->initialize($config);
                $this->upload->do_upload('scanned_copy_of_application');
                $upload_data = $this->upload->data();

                // Make thumbnail image

                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = FCPATH . 'attachments/scanned_copy_of_application/' . $scholarship_id . "/" . $upload_data['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 150;
                $config['height'] = 150;
                $config['new_image'] = FCPATH . 'attachments/scanned_copy_of_application/thumb/' . $scholarship_id . "/" . $upload_data['file_name'];
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                //$profile_image = base_url() . 'attachments/profile_image/' . $upload_data['file_name'];
                $scanned_copy_of_application = $upload_data['file_name'];
                $scan_filename = $_FILES['scanned_copy_of_application']['name'];
            }
            if ($scanned_copy_of_application) {
                if($scan_filename){
                    $scan_filename = explode('.',$scan_filename);
                    $update_image['scanned_copy_of_application_name']=$scan_filename[0];
                }
                $update_image['scanned_copy_of_application'] = $scanned_copy_of_application;
                $update = $this->scholarship_model->update_scholarship_image($scholarship_id, $update_image);
                $scanned_image_status = "scanned_image_updated";
            } else {
                $scanned_image_status = "scanned_image_update_failed";
            }


            $total = count($_FILES['supporting_documents']['name']);

            $data['file_count'] = $total;

            if (file_exists("attachments/supporting_documents/" . $scholarship_id)) {
                $upload_path = "attachments/supporting_documents/" . $scholarship_id . "/";
            } else {
                if (!is_dir("attachments/supporting_documents/" . $scholarship_id . "/")) {
                    mkdir("attachments/supporting_documents/" . $scholarship_id . "/");
                }
                $upload_path = "attachments/supporting_documents/" . $scholarship_id . "/";
            }

            if(!empty($this->input->post('supporting_documentName'))){
                $document_name=explode(',',$this->input->post('supporting_documentName'));
                $document_name = $document_name[0];
            } 
            // Loop through each file
            for ($i = 0; $i < $total; $i++) {

                //Get the temp file path
                $tmpFilePath = $_FILES['supporting_documents']['tmp_name'][$i];

                //Make sure we have a file path
                if ($tmpFilePath != "") {

                    $support_filename = $_FILES['supporting_documents']['name'][$i];
                    $profile_image = NULL;
                    $config['upload_path'] = $upload_path;
                    //$allowed_types = array('jpg', 'jpeg', 'png');
                    //$config['allowed_types'] = implode('|', $allowed_types);
                    //$config['max_size'] = '10000';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!empty($_FILES['supporting_documents']['name'][$i])) {
                        $_FILES['supporting_documents_list'] = array(
                            'name' => $_FILES['supporting_documents']['name'][$i],
                            'type' => $_FILES['supporting_documents']['type'][$i],
                            'tmp_name' => $_FILES['supporting_documents']['tmp_name'][$i],
                            'error' => $_FILES['supporting_documents']['error'][$i],
                            'size' => $_FILES['supporting_documents']['size'][$i]
                        );

                        //print_r($_FILES['supporting_documents']);

                        $random_hash = substr(str_shuffle(time()), 0, 3) . strrev(mt_rand(100000, 999999));
                        $extension = pathinfo($_FILES['supporting_documents']['name'][$i], PATHINFO_EXTENSION);
                        $config['file_name'] = 'SDI_' . $random_hash . '.' . $extension;
                        $this->upload->initialize($config);
                        $this->upload->do_upload('supporting_documents_list');
                        $upload_data = $this->upload->data();

                        // Make thumbnail image

                        $this->load->library('image_lib');
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = FCPATH . 'attachments/supporting_documents/' . $scholarship_id . "/" . $upload_data['file_name'];
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = FALSE;
                        $config['width'] = 150;
                        $config['height'] = 150;
                        $config['new_image'] = FCPATH . 'attachments/supporting_documents/thumb/' . $scholarship_id . "/" . $upload_data['file_name'];
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        //$profile_image = base_url() . 'attachments/profile_image/' . $upload_data['file_name'];
                        $supporting_documents = $upload_data['file_name'];
                    }
                    if ($supporting_documents) {
                        if($support_filename){
                            $support_filename = explode('.',$support_filename);
                            $insert_image['document_name']=$support_filename[0];
                        }
                        $insert_image['document'] = $supporting_documents;
                        $insert_image['scholarship_details_id'] = $scholarship_id;
                        $insert_image['created_date'] = $created_date;
                        $insert_document = $this->scholarship_model->insert_supporting_document($insert_image);
                        $supporting_doc_status[$i] = "success";
                    } else {
                        $supporting_doc_status[$i] = "failed";
                    }
                }
            }
        } else {
            $insert_status = "failed";
        }
        $data['status'] = $insert_status;
        $data['profile_image_status'] = $profile_image_status;
        $data['scanned_image_status'] = $scanned_image_status;
        $data['supporting_document_status'] = $supporting_doc_status;

        echo json_encode($data);
    }

    public function edit($id) {
        $this->template->write_view('content', 'scholarship/edit_scholarship');
        $this->template->render();
    }

    public function getScholarshipData() {
        $id = $this->input->get("id");

        $data['scholarship_details'] = $this->scholarship_model->get_scholarship_by_id($id);
        $data['supporting_document'] = $this->scholarship_model->get_supporting_doc_by_scholarship($id);
        $data['remarks'] = $this->scholarship_model->get_remarks_by_scholarship($id);
        //$data['dynamic_entry_scholarship'] = $this->scholarship_model->get_dynamic_entry_scholarship($id);
        echo json_encode($data);
    }

    public function edit_scholarship() {

        $date = date('Y-m-d H:i:s');
        $created_date = date('Y-m-d H:i:s');
        $profile_image_status = "";
        $scanned_image_status = "";

        $scholarship_id = $this->input->post('scholarship_id');

        $previous_scholarship_details = $this->scholarship_model->get_scholarship_by_id($scholarship_id);
        $previous_zakaath_amt = $previous_scholarship_details[0]['zakaath_amount'];

        $scholarship_data = array(
            'application_date' => $this->input->post('application_date'),
            'approved_amount' => $this->input->post('approved_amount'),
            'approved_year' => $this->input->post('approved_year'),
            'application_type_id' => $this->input->post('application_type_id'),
            'years_sponsored' => $this->input->post('years_sponsored'),
            'student_name' => $this->input->post('student_name'),
            'gender_id' => $this->input->post('gender_id'),
            'dob' => $this->input->post('dob'),
            'mobile_no' => $this->input->post('mobile_no'),
            'email' => $this->input->post('email'),
            'landline_no' => $this->input->post('landline_no'),
            'doorno' => $this->input->post('door_no'),
            'street' => $this->input->post('street'),
            'address' => $this->input->post('address'),
            'college_name' => $this->input->post('college_name'),
            'college_address' => $this->input->post('college_address'),
            'course_name' => $this->input->post('course_name'),
            'course_type_id' => $this->input->post('course_type_id'),
            'course_completed_year' => $this->input->post('course_completed_year'),
            'has_repayments' => $this->input->post('has_repayments'),
            'payment_on_hold' => $this->input->post('payment_on_hold'),
            'repayment_completed_year' => $this->input->post('repayment_completed_year'),
            'zakaath_amount' => $this->input->post('zakaath_amount')
                //'status' => $this->input->post('status'),
                //'updated_date' => $updated_date
        );
        if($this->input->post('scanned_copy_of_application_name'))
            $scholarship_data['scanned_copy_of_application_name'] = $this->input->post('scanned_copy_of_application_name');
        $update_scholarship_val = $this->scholarship_model->update_scholarship($scholarship_data, $scholarship_id);
        $this->session->set_flashdata('flashSuccess', 'Expense category Added');
        if ($update_scholarship_val) {
            $update_status = "success";

            $subtract_amt = $this->input->post('zakaath_amount');


            if ($this->input->post('zakaath_amount') > 0) {

                $zakaath_amt_details = $this->scholarship_model->get_zakaath_detail();


                if ((double) $this->input->post('zakaath_amount') > (double) $previous_zakaath_amt) {
                    $difference_amt = (double) $this->input->post('zakaath_amount') - (double) $previous_zakaath_amt;
                    $update_zakaath_amount = $this->scholarship_model->subtract_zakaath_amount($difference_amt);

                    if ($update_zakaath_amount) {
                        $data_zakaathamt_history = array(
                            'scholarship_id' => $scholarship_id,
                            'amount' => $subtract_amt,
                            'action' => "Debited",
                            'date_created' => $created_date
                        );

                        $add_zakaathamt_history = $this->scholarship_model->add_zakaath_scholarship_history($data_zakaathamt_history);
                    }
                } else {
                    $difference_amt = (double) $previous_zakaath_amt - (double) $this->input->post('zakaath_amount');
                    $update_zakaath_amount = $this->scholarship_model->add_zakaath_amount($difference_amt);

                    if ($update_zakaath_amount) {
                        $data_zakaathamt_history = array(
                            'scholarship_id' => $scholarship_id,
                            'amount' => $subtract_amt,
                            'action' => "Credited",
                            'date_created' => $created_date
                        );

                        $add_zakaathamt_history = $this->scholarship_model->add_zakaath_scholarship_history($data_zakaathamt_history);
                    }
                }
            }


            $user_id = $this->user_auth->get_user_id();

            if ($this->input->post('remark') != "") {
                $data_remark = array(
                    'remarks' => $this->input->post('remark'),
                    'scholarship_details_id' => $scholarship_id,
                    'member_id' => $user_id,
                    'created_date' => $date
                );

                $insert_remark = $this->scholarship_model->insert_remark($data_remark);
            }

            if (!empty($_FILES['profile_picture']['name'])) {

                if (file_exists("attachments/scholar_profile_pictures/" . $scholarship_id)) {
                    $upload_path = "attachments/scholar_profile_pictures/" . $scholarship_id . "/";
                } else {
                    if (!is_dir("attachments/scholar_profile_pictures/" . $scholarship_id . "/")) {
                        mkdir("attachments/scholar_profile_pictures/" . $scholarship_id . "/");
                    }
                    $upload_path = "attachments/scholar_profile_pictures/" . $scholarship_id . "/";
                }

                if (file_exists("attachments/scholar_profile_pictures/thumb/" . $scholarship_id)) {
                    $upload_path_thumb = "attachments/scholar_profile_pictures/thumb/" . $scholarship_id . "/";
                } else {
                    if (!is_dir("attachments/scholar_profile_pictures/thumb/" . $scholarship_id . "/")) {
                        mkdir("attachments/scholar_profile_pictures/thumb/" . $scholarship_id . "/");
                    }
                    $upload_path_thumb = "attachments/scholar_profile_pictures/thumb/" . $scholarship_id . "/";
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
                    $config['source_image'] = FCPATH . 'attachments/scholar_profile_pictures/' . $scholarship_id . "/" . $upload_data['file_name'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 150;
                    $config['height'] = 150;
                    $config['new_image'] = FCPATH . 'attachments/scholar_profile_pictures/thumb/' . $scholarship_id . "/" . $upload_data['file_name'];
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    //$profile_image = base_url() . 'attachments/profile_image/' . $upload_data['file_name'];
                    $profile_image = $upload_data['file_name'];
                }
                if ($profile_image) {
                    $update_image['profile_picture'] = $profile_image;
                    $update = $this->scholarship_model->update_scholarship_image($scholarship_id, $update_image);
                } else {
                    $profile_image_status = "profile_image_update_failed";
                }
            }

            if (!empty($_FILES['scanned_copy_of_application']['name'])) {

                if (file_exists("attachments/scanned_copy_of_application/" . $scholarship_id)) {
                    $upload_path = "attachments/scanned_copy_of_application/" . $scholarship_id . "/";
                } else {
                    if (!is_dir("attachments/scanned_copy_of_application/" . $scholarship_id . "/")) {
                        mkdir("attachments/scanned_copy_of_application/" . $scholarship_id . "/");
                    }
                    $upload_path = "attachments/scanned_copy_of_application/" . $scholarship_id . "/";
                }


                $filename = $_FILES['scanned_copy_of_application']['name'];
                $profile_image = NULL;
                $config['upload_path'] = $upload_path;
                $allowed_types = array('jpg', 'jpeg', 'png', 'svg', 'pdf', 'txt', 'xls', 'xlsx');
                $config['allowed_types'] = implode('|', $allowed_types);
                // $config['max_size'] = '10000';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!empty($_FILES['scanned_copy_of_application']['name'])) {
                    $_FILES['scanned_copy_of_application'] = array(
                        'name' => $_FILES['scanned_copy_of_application']['name'],
                        'type' => $_FILES['scanned_copy_of_application']['type'],
                        'tmp_name' => $_FILES['scanned_copy_of_application']['tmp_name'],
                        'error' => $_FILES['scanned_copy_of_application']['error'],
                        'size' => $_FILES['scanned_copy_of_application']['size']
                    );

                    $random_hash = substr(str_shuffle(time()), 0, 3) . strrev(mt_rand(100000, 999999));
                    $extension = pathinfo($_FILES['scanned_copy_of_application']['name'], PATHINFO_EXTENSION);
                    $config['file_name'] = 'SPI_' . $random_hash . '.' . $extension;
                    $this->upload->initialize($config);
                    $this->upload->do_upload('scanned_copy_of_application');
                    $upload_data = $this->upload->data();

                    // Make thumbnail image

                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = FCPATH . 'attachments/scanned_copy_of_application/' . $scholarship_id . "/" . $upload_data['file_name'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width'] = 150;
                    $config['height'] = 150;
                    $config['new_image'] = FCPATH . 'attachments/scanned_copy_of_application/thumb/' . $scholarship_id . "/" . $upload_data['file_name'];
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    //$profile_image = base_url() . 'attachments/profile_image/' . $upload_data['file_name'];
                    $scanned_copy_of_application = $upload_data['file_name'];
                    $scan_filename = $_FILES['scanned_copy_of_application']['name'];
                }
                if ($scanned_copy_of_application) {
                    if($scan_filename){
                        $scan_filename = explode('.',$scan_filename);
                        $update_image['scanned_copy_of_application_name']=$scan_filename[0];
                    }
                    $update_image['scanned_copy_of_application'] = $scanned_copy_of_application;
                    $update = $this->scholarship_model->update_scholarship_image($scholarship_id, $update_image);
                } else {
                    $scanned_image_status = "scanned_image_update_failed";
                }
            }

            if(!empty($this->input->post('supporting_documentName'))){
                $doc_id=explode(',',$this->input->post('supporting_documentid'));
                $document_name=explode(',',$this->input->post('supporting_documentName'));
                foreach($document_name as $key=>$doc){
                    $update_support_image['document_name'] = $doc;
                    $update = $this->scholarship_model->update_scholarship_support_image($doc_id[$key], $update_support_image);
                }
            }

            if (!empty($_FILES['supporting_documents']['name'])) {
                $total = count($_FILES['supporting_documents']['name']);

                $data['file_count'] = $total;

                if (file_exists("attachments/supporting_documents/" . $scholarship_id)) {
                    $upload_path = "attachments/supporting_documents/" . $scholarship_id . "/";
                } else {
                    if (!is_dir("attachments/supporting_documents/" . $scholarship_id . "/")) {
                        mkdir("attachments/supporting_documents/" . $scholarship_id . "/");
                    }
                    $upload_path = "attachments/supporting_documents/" . $scholarship_id . "/";
                }

                // Loop through each file
                for ($i = 0; $i < $total; $i++) {

                    //Get the temp file path
                    $tmpFilePath = $_FILES['supporting_documents']['tmp_name'][$i];

                    //Make sure we have a file path
                    if ($tmpFilePath != "") {

                        $filename = $_FILES['supporting_documents']['name'][$i];
                        $profile_image = NULL;
                        $config['upload_path'] = $upload_path;
                        //$allowed_types = array('jpg', 'jpeg', 'png');
                        //$config['allowed_types'] = implode('|', $allowed_types);
                        $config['allowed_types'] = '*';
                        $config['max_size'] = '10000';
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if (!empty($_FILES['supporting_documents']['name'][$i])) {
                            $_FILES['supporting_documents_list'] = array(
                                'name' => $_FILES['supporting_documents']['name'][$i],
                                'type' => $_FILES['supporting_documents']['type'][$i],
                                'tmp_name' => $_FILES['supporting_documents']['tmp_name'][$i],
                                'error' => $_FILES['supporting_documents']['error'][$i],
                                'size' => $_FILES['supporting_documents']['size'][$i]
                            );
                            $random_hash = substr(str_shuffle(time()), 0, 3) . strrev(mt_rand(100000, 999999));
                            $extension = pathinfo($_FILES['supporting_documents']['name'][$i], PATHINFO_EXTENSION);
                            $config['file_name'] = 'SDI_' . $random_hash . '.' . $extension;
                            $this->upload->initialize($config);
                            $this->upload->do_upload('supporting_documents_list');
                            $upload_data = $this->upload->data();

                            // Make thumbnail image

                            $this->load->library('image_lib');
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = FCPATH . 'attachments/supporting_documents/' . $scholarship_id . "/" . $upload_data['file_name'];
                            $config['create_thumb'] = TRUE;
                            $config['maintain_ratio'] = FALSE;
                            $config['width'] = 150;
                            $config['height'] = 150;
                            $config['new_image'] = FCPATH . 'attachments/supporting_documents/thumb/' . $scholarship_id . "/" . $upload_data['file_name'];
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            //$profile_image = base_url() . 'attachments/profile_image/' . $upload_data['file_name'];
                            $supporting_documents = $upload_data['file_name'];
                        }
                        if ($supporting_documents) {
                            $filename = explode('.',$filename);
                            $insert_image['document'] = $supporting_documents;
                            $insert_image['document_name']=$filename[0];
                            $insert_image['scholarship_details_id'] = $scholarship_id;
                            $insert_image['created_date'] = $created_date;
                            $insert_document = $this->scholarship_model->insert_supporting_document($insert_image);
                            $supporting_doc_status[$i] = "success";
                        } else {
                            $supporting_doc_status[$i] = "failed";
                        }
                    }
                }
            }
            
        } else {
            $update_status = "failed";
        }
        $data['status'] = $update_status;
        $data['profile_image_status'] = $profile_image_status;
        $data['scanned_image_status'] = $scanned_image_status;

        echo json_encode($data);
    }

    public function delete() {
        $id = $this->input->post("id");
        $data = array('is_deleted' => 1);
        $delete = $this->scholarship_model->delete_scholarship($id, $data);

        if ($delete == 1) {
            $this->session->set_flashdata('flashSuccess', 'Expense category deleted!');
            echo '1';
        } else {
            $this->session->set_flashdata('flashError', 'Operation Failed!');

            echo '0';
        }
    }

    public function deleteSupportingDoc() {
        $id = $this->input->get("id");

        $supporting_doc_data = $this->scholarship_model->get_supporting_doc_by_id($id);

        $data = array('is_deleted' => 1);
        $delete = $this->scholarship_model->delete_supporting_doc($id, $data);

        if ($delete == 1) {
            $path = FCPATH . "attachments\\supporting_documents\\" . $supporting_doc_data[0]['scholarship_details_id'] . "\\" . $supporting_doc_data[0]['document'];
            //echo $path;
            unlink($path);
            echo '1';
        } else {
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

    public function checkZakaathAmt() {
        $amount = $this->input->get("amount");
        $zakaath_amount_detail = $this->scholarship_model->get_zakaath_detail();
        if (!empty($zakaath_amount_detail) && is_array($zakaath_amount_detail)) {
            $data['zakaathamount_details'] = $zakaath_amount_detail;
        } else {

            $data['zakaathamount_details'] = null;
        }
        echo json_encode($data);
    }

//    public function checkZakaathAmtOnUpdate($amount, $scholarship_id) {
//        $amount = $this->input->get("amount");
//        $zakaath_amount_detail = $this->scholarship_model->get_zakaath_detail();
//
//        $previous_scholarship_details = $this->scholarship_model->get_scholarship_by_id($scholarship_id);
//        $previous_zakaath_amt = $previous_scholarship_details[0]['zakaath_amount'];
//
//
//        if ((double) $amount > (double) $previous_zakaath_amt) {
//
//        }
//
//        if (!empty($zakaath_amount_detail) && is_array($zakaath_amount_detail)) {
//            $data['zakaathamount_details'] = $zakaath_amount_detail;
//        } else {
//
//            $data['zakaathamount_details'] = null;
//        }
//        echo json_encode($data);
//    }

    public function view($id) {
        $this->template->write_view('content', 'scholarship/view_scholarship');
        $this->template->render();
    }

    public function add_custom_entry() {

        $custom_label = $this->input->post("custom_label");
        $custom_value = $this->input->post("custom_value");
        $scholarship_id = $this->input->post("scholarship_id");
        $created_date = date("Y-m-d H:i:s");

        $data_custom_entry = array(
            'label_name' => $custom_label,
            'value' => $custom_value,
            'scholarship_id' => $scholarship_id,
            'created_on' => $created_date
        );
        $custom_entry_id = $this->scholarship_model->insert_scholarship_custom_entry($data_custom_entry);
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
        $scholarship_id = $this->input->post("scholarship_id");
        $custom_entry_id = $this->input->post("entry_id");

        $data_custom_entry = array(
            'label_name' => $custom_label,
            'value' => $custom_value,
            'scholarship_id' => $scholarship_id,
        );

        $custom_entry_id = $this->scholarship_model->update_scholarship_custom_entry($data_custom_entry, $custom_entry_id);
        if ($custom_entry_id) {
            $result['status'] = "1";
            $result['scholarship_id'] = $scholarship_id;
        } else {
            $result['status'] = "0";
        }
        echo json_encode($result);
    }

    public function delete_custom_entry_update() {
        $id = $this->input->post("entry_id");
        //$data = array('is_deleted' => 1);
        $delete = $this->scholarship_model->delete_scholarship_custom_entry($id);
        if ($delete) {
            echo "1";
        } else {
            echo "0";
        }
    }

    function get_street_list() {
        $data['street'] = $this->scholarship_model->get_all_street();
        echo json_encode($data);
    }

    function scholarship_report() {
        $search_data = $_GET['search'];
        $decode_data = json_decode($search_data);

        $searchString = $decode_data[0]->searchString;

        $application_type = $decode_data[1]->application_type;
        $payment_on_hold = $decode_data[2]->payment_on_hold;
        $course_type = $decode_data[3]->course_type;
        $application_date = $decode_data[4]->application_date;
        $course_completed_year = $decode_data[5]->course_completed_year;
        $approved_year = $decode_data[6]->approved_year;

        $data = $this->scholarship_model->export_all_scholarships_list($searchString, $approved_year, "", $course_completed_year,$application_date, $application_type, $payment_on_hold, $course_type);


        $this->export_all_scholarship($data);
        echo json_encode($data);
    }

    function export_all_scholarship($query, $timezones = array()) {
        // output headers so that the file is downloaded rather than displayed
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Scholarship_list.xls");

        $heading = array('S.No', 'Std. Name','Date Of Birth','Email ID','Mobile Number','Address','College Name','College Address', 'Application Date', 'Approved Year','Approved Amount', 'Application Type','Years Sponsored', 'Course Completed Year', 'Course Type', 'Repayment Completed Year', 'Payment Hold', 'Status');

        echo implode("\t", $heading) . "\n";
        //$heading = false;
        if (!empty($query))
            foreach ($query as $row) {
                //print_r($row);
                //array_keys($row)
                //echo implode("\t", array_values($row)) . "\n";
                $course_completed_year = ($row['course_completed_year'] != '0000-00-00') ? date('d-M-Y', strtotime($row['course_completed_year'])) : '-';
                $repayment_completed_year = ($row['repayment_completed_year'] != '0000-00-00') ? date('d-M-Y', strtotime($row['repayment_completed_year'])) : '-';
                $application_date = ($row['application_date'] != '0000-00-00') ? date('d-M-Y', strtotime($row['application_date'])) : '-';
                $approved_year = ($row['approved_year'] != '0000-00-00') ? date('d-M-Y', strtotime($row['approved_year'])) : '-';
                $dob = ($row['dob'] != '0000-00-00') ? date('d-M-Y', strtotime($row['dob'])) : '-';
                echo $row['serial_number'] . "\t" . $row['student_name'] . "\t" . $dob . "\t" . $row['email'] . "\t". $row['mobile_no'] . "\t". $row['address'] . "\t". $row['college_name'] . "\t". $row['college_address'] . "\t". $application_date . "\t" . $approved_year . "\t" . $row['approved_amount'] . "\t" . $row['application_type_name'] . "\t". $row['years_sponsored'] . "\t" . $course_completed_year . "\t" . $row['course_type_name'] . "\t" . $repayment_completed_year . "\t" . $row['paymentOnHold'] . "\t" . $row['scholarshipStatus'] . "\n";
            }
        exit;
    }

}
