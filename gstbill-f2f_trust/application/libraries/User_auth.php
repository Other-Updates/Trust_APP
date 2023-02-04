<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');

class User_auth {

    private $error = array();
    private $app_name;

    function __construct() {
        $this->ci = & get_instance();
        $this->ci->load->database();
        $this->ci->load->model('masters/users_model');
        $this->ci->load->model('masters/user_type_model');
        $this->ci->load->model('masters/session_model');
        $this->ci->load->model('messageboard/messageboard_model');
        //$this->ci->load->model('masters/users_model');
        $this->app_name = $this->ci->config->item('application_name');
        //$this->autologin();
    }

    function login($login, $password) {
        if ((strlen($login) > 0) AND ( strlen($password) > 0)) {
            $user = $this->ci->users_model->get_user_by_login($login, $password); // User Login

            if ($user) { // login ok
                if ($password == $user->password) { // password ok
                    if ($user->user_type_id == "0" || $user->user_type_id == "null" || $user->user_type_id == "") {
                        $sections = $this->ci->user_type_model->get_user_type_permissions_by_section($user->user_type_id);
                        $modules = $this->ci->user_type_model->get_user_type_permissions_by_module($user->user_type_id);

                        $timezone = 'Asia/kolkata';
                        $user_location = 'Not Available';
                        if (!empty($user->profile_picture)) {
                            $profile_image = $user->profile_picture;
                        } else {
                            $profile_image = base_url() . 'attachments/profile_image/default_profile_image.png';
                        }
                        $app = array(
                            'user_id' => $user->id,
                            'username' => $user->username,
                            'email' => $user->email,
                            'name' => $user->name,
                            'user_type_id' => $user->user_type_id,
                            'member_type_id' => $user->member_type_id,
                            'user_type_name' => $user->user_type_name,
                            'profile_picture' => $profile_image,
                            'status' => ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
                            'sections' => $sections,
                            'modules' => $modules,
                            'user_location' => $user_location,
                            'is_logged_in' => 1,
                            'is_member' => 1,
                            'login_time' => date('H:i:s'),
                            'login_timestamp' => time(),
                            'timezone' => $timezone,
                            'login_ip' => $_SERVER['REMOTE_ADDR'],
                            'browser' => $_SERVER['HTTP_USER_AGENT'],
                            'is_new_user' => 'no',
                        );

                        $this->store_in_session($app);
                        $response = array(
                            'status' => 'member',
                            'user_id' => $user->id,
                        );
                        return $response;
                    } else if ($user->status != 0 && $user->is_new_user != 1) {  // success
                        $sections = $this->ci->user_type_model->get_user_type_permissions_by_section($user->user_type_id);
                        $modules = $this->ci->user_type_model->get_user_type_permissions_by_module($user->user_type_id);

                        $timezone = 'Asia/kolkata';
                        $user_location = 'Not Available';
                        if (!empty($user->profile_picture)) {
                            $profile_image = $user->profile_picture;
                        } else {
                            $profile_image = base_url() . 'attachments/profile_image/default_profile_image.png';
                        }
                        $app = array(
                            'user_id' => $user->id,
                            'username' => $user->username,
                            'email' => $user->email,
                            'name' => $user->name,
                            'user_type_id' => $user->user_type_id,
                            'user_type_name' => $user->user_type_name,
                            'member_type_id' => $user->member_type_id,
                            'profile_picture' => $profile_image,
                            'status' => ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
                            'sections' => $sections,
                            'modules' => $modules,
                            'user_location' => $user_location,
                            'is_logged_in' => 1,
                            'is_member' => 1,
                            'login_time' => date('H:i:s'),
                            'login_timestamp' => time(),
                            'timezone' => $timezone,
                            'login_ip' => $_SERVER['REMOTE_ADDR'],
                            'browser' => $_SERVER['HTTP_USER_AGENT'],
                            'is_new_user' => 'no',
                        );

                        $this->store_in_session($app);


                        $response = array(
                            'status' => 'success',
                            'user_type' => $user->user_type_id,
                        );
                        return $response;
                    } else if ($user->is_new_user == 1) {
                        $this->error = array('is_new_user' => 'true'); // new user
//                        $data_update_temp_username = array(
//                            'temproary_username' => $user->username
//                        );
//                        $update_user = $this->ci->users_model->update_user($data_update_temp_username, $user->id);
                        $sections = $this->ci->user_type_model->get_user_type_permissions_by_section($user->user_type_id);
                        $modules = $this->ci->user_type_model->get_user_type_permissions_by_module($user->user_type_id);

                        $timezone = 'Asia/kolkata';
                        $user_location = 'Not Available';
                        if (!empty($user->profile_picture)) {
                            $profile_image = $user->profile_picture;
                        } else {
                            $profile_image = base_url() . 'attachments/profile_image/default_profile_image.png';
                        }
                        $app = array(
                            'user_id' => $user->id,
                            'username' => $user->username,
                            'email' => $user->email,
                            'name' => $user->name,
                            'user_type_id' => $user->user_type_id,
                            'user_type_name' => $user->user_type_name,
                            'member_type_id' => $user->member_type_id,
                            'profile_picture' => $profile_image,
                            'status' => ($user->status == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
                            'sections' => $sections,
                            'modules' => $modules,
                            'user_location' => $user_location,
                            'is_logged_in' => 1,
                            'is_member' => 1,
                            'login_time' => date('H:i:s'),
                            'login_timestamp' => time(),
                            'timezone' => $timezone,
                            'login_ip' => $_SERVER['REMOTE_ADDR'],
                            'browser' => $_SERVER['HTTP_USER_AGENT'],
                            'is_new_user' => 'yes',
                        );

                        $this->store_in_session($app);

                        $response = array(
                            'status' => 'new_user',
                            'user_id' => $user->id,
                        );
                        return $response;
                    } else {
                        $this->error = array('not_activated' => 'auth_not_activated'); // fail - not activated
                        return 'auth_not_activated';
                    }
                } else {
                    $this->error = array('password' => 'auth_incorrect_password'); // fail - wrong password
                    return 'auth_incorrect_password';
                }
            } else {
                $this->error = array('login' => 'auth_incorrect_login'); // fail - wrong login
                return 'auth_incorrect_login';
            }
        }
        return FALSE;
    }

    function logout() {
        //$this->delete_autologin();
        $this->ci->session->unset_userdata($this->app_name);
        $this->ci->session->sess_destroy();
    }

    function is_logged_in() {
        if ($this->get_from_session('is_logged_in') == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_user_id() {
        return $this->get_from_session('user_id');
    }

    function get_profile_image() {
        return $this->get_from_session('profile_image');
    }

    function get_username() {
        $username = $this->get_from_session('username');
        return $username;
    }

    function get_user_location() {
        $user_location = $this->get_from_session('user_location');
        return $user_location;
    }

    function get_email_address() {
        $email = $this->get_from_session('email_address');
        return $email;
    }

    function get_logintime() {
        return $this->get_from_session('login_time');
    }

    function get_user_permissions() {
        return $this->get_from_session('permissions');
    }

    function get_user_type_id() {
        return $this->get_from_session('user_type_id');
    }

    function get_member_type_id() {
        return $this->get_from_session('member_type_id');
    }

    function get_timezone() {
        if ($this->get_from_session('timezone')) {
            return $this->get_from_session('timezone');
        }
        return FALSE;
    }

    function is_admin() {
        if ($this->get_from_session('user_type_id') == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function is_permission_allowed($access_array = array(), $main_module = NULL) {
        $current_class = $this->ci->router->class;
        $current_method = $this->ci->router->method;
        $user_permission = $this->get_from_session('modules');

        $permission_arr = isset($access_array[$current_class . '/' . $current_method]) ? $access_array[$current_class . '/' . $current_method] : array();
        $is_allowed = 0;
        $sub_module = ($current_class == 'reports') ? $current_method : $current_class;

        if (!empty($permission_arr) && is_array($permission_arr)) {
            foreach ($permission_arr as $list) {
                if (isset($user_permission[$main_module][$sub_module][$list]) && $user_permission[$main_module][$sub_module][$list] == 1)
                    $is_allowed = 1;
            }
        } else if ($permission_arr == 'no_restriction') {
            $is_allowed = 1;
        }
        return $is_allowed;
    }

    function is_module_allowed($module_key = NULL) {
        $user_permission = $this->get_from_session('modules');

        $permission_arr = isset($user_permission[$module_key]) ? $user_permission[$module_key] : array();
        $is_allowed = 0;
        if (!empty($permission_arr) && is_array($permission_arr)) {
            foreach ($permission_arr as $section) {
                if (!empty($section) && is_array($section) && array_sum($section) > 0)
                    $is_allowed = 1;
            }
        }
        return $is_allowed;
    }

    function is_section_allowed($module_key = NULL, $section_key = NULL) {
        $user_permission = $this->get_from_session('modules');
        $section = isset($user_permission[$module_key][$section_key]) ? $user_permission[$module_key][$section_key] : array();
        $is_allowed = 0;
        if (is_array($section) && !empty($section) && array_sum($section) > 0) {
            $is_allowed = 1;
        }
        return $is_allowed;
    }

    function is_action_allowed($module = NULL, $section = NULL, $action = NULL) {
        $user_permission = $this->get_from_session('modules');
        //print_r($user_permission);
        $access = isset($user_permission[$module][$section][$action]) ? $user_permission[$module][$section][$action] : array();
        $is_allowed = 0;
        if (!empty($access) && $access == 1) {
            $is_allowed = 1;
        }
        return $is_allowed;
    }

    function store_in_session($array_to_store) {
        $user_data = $this->ci->session->userdata($this->app_name);
        $app_session = json_decode(json_encode($this->cryptography('decrypt', $user_data)), true);

        if (!empty($app_session)) {
            foreach ($array_to_store as $key => $val) {
                $app_session[$key] = $val;
            }
        } else {
            $app_session = $array_to_store;
        }
        $app_session = $this->cryptography('encrypt', $app_session);
        $this->ci->session->set_userdata($this->app_name, $app_session);
    }

    function get_from_session_table() {
        $session_data = $this->ci->session_model->get_all_sesion_data($_SERVER['REMOTE_ADDR']);
        return $session_data;
    }

    function get_from_session($key) {
        $user_data = $this->ci->session->userdata($this->app_name);
        $app_session = json_decode(json_encode($this->cryptography('decrypt', $user_data)), true);

        if (isset($app_session[$key]))
            return $app_session[$key];
        else
            return NULL;
    }

    function get_all_session() {
        $user_data = $this->ci->session->userdata($this->app_name);
        $app_session = json_decode(json_encode($this->cryptography('decrypt', $user_data)), true);
        return $app_session;
    }

    function cryptography($action, $data) {
        $salt = $this->ci->config->item('salt');
        if ($action == 'encrypt') {
            $data = json_encode($data);
            return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $data, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
        } else if ($action == 'decrypt') {
            $data = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($data), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
            return json_decode($data);
        }
    }

    function create_autologin($user_id) {
        $this->ci->load->helper('cookie');
        $user = $this->ci->users_model->get_user_by_id($user_id);
        $cookie_arr = array(
            'name' => $this->ci->config->item('autologin_cookie_name'),
            'value' => serialize(array('user_id' => $user_id, 'key' => md5($user->password))),
            'expire' => $this->ci->config->item('autologin_cookie_life'),
        );
        if (set_cookie($cookie_arr)) {
            return TRUE;
        }
        return FALSE;
    }

    function delete_autologin() {
        $this->ci->load->helper('cookie');
        if ($cookie = get_cookie($this->ci->config->item('autologin_cookie_name'), TRUE)) {
            $data = unserialize($cookie);
            delete_cookie($this->ci->config->item('autologin_cookie_name'));
        }
    }

    function autologin() {
        if (!$this->is_logged_in() AND ! $this->is_logged_in(FALSE)) {  // not logged in (as any user)
            $this->ci->load->helper('cookie');
            if ($cookie = get_cookie($this->ci->config->item('autologin_cookie_name'), TRUE)) {
                $data = unserialize($cookie);
                if (isset($data['user_id'])) {
                    if (!is_null($user = $this->ci->users_model->get_user_by_id($data['user_id'])) && ($data['key'] == md5($user->password))) {
                        // Login user
                        $this->ci->session->set_userdata(array(
                            'user_id' => $user->id,
                            'username' => $user->username,
                            'permission' => $user->permission,
                            'status' => STATUS_ACTIVATED,
                        ));

                        // Renew users cookie to prevent it from expiring
                        set_cookie(array(
                            'name' => $this->ci->config->item('autologin_cookie_name'),
                            'value' => $cookie,
                            'expire' => $this->ci->config->item('autologin_cookie_life'),
                        ));
                        return TRUE;
                    }
                }
                return FALSE;
            }
        }
        return FALSE;
    }

    function simple_encrypt($text, $salt = 'zimson_f2f_2017!') {
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }

    function simple_decrypt($text, $salt = 'zimson_f2f_2017!') {
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }

    function getUserIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //if from shared
            return $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //if from a proxy
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    function change_date_format($date) {
        $date_arr = explode('-', $date);
        return $date_arr[2] . '-' . $date_arr[0] . '-' . $date_arr[1];
    }

    function time_diff($from, $to) {
        $arrival_time = $from;
        $departure_time = $to;

        $d1 = strtotime($arrival_time);
        $d2 = strtotime($departure_time);

        $diff = $d2 - $d1;
        return $diff;
    }

    function hour_diff($date1, $date2) {
        $datetimeObj1 = new DateTime($date1);
        $datetimeObj2 = new DateTime($date2);
        $interval = $datetimeObj1->diff($datetimeObj2);

        if ($interval->format('%a') > 0) {
            $h1 = $interval->format('%a') * 24;
        }
        if ($interval->format('%H') > 0) {
            $h2 = $interval->format('%H');
        }
        if ($interval->format('%I') > 0) {
            $mins = $interval->format('%I');
        }
        $hours = (!isset($h1) && !isset($h2)) ? '00' : ((isset($h1) && isset($h2)) ? ($h1 + $h2) : ((isset($h1) && !isset($h2)) ? $h1 : $h2));
        $mins = (isset($mins)) ? $mins : '00';

        return $hours . ':' . $mins;
    }

    function format_datetime($date) {
        $date_arr_1 = explode(' ', $date);
        $date_arr_2 = explode('/', $date_arr_1[0]);
        $date_arr_3 = explode(':', $date_arr_1[1]);
        $prefix = $date_arr_2[1] . '/' . $date_arr_2[0] . '/' . $date_arr_2[2];
        $suffix = $date_arr_3[0] . ':' . $date_arr_3[1] . ':00';
        $new_date = $prefix . ' ' . $suffix;
        $new_date = date('Y-m-d H:i:s', strtotime($new_date));
        return $new_date;
    }

    function format_date($date) {
        $date_array = explode('/', $date);
        $new_date = $date_array[1] . '/' . $date_array[0] . '/' . $date_array[2];
        $new_date = date('Y-m-d', strtotime($new_date));
        return $new_date;
    }

    function random_color() {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    function get_new_message($id) {
        //echo "user_auth";
        //echo $this->get_user_id();
        $member_id = $this->get_user_id();
        $response['new_messages'] = $this->ci->messageboard_model->get_new_messages($member_id, $id);

        return $response;
    }

}
