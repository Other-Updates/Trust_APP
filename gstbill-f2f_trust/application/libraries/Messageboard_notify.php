<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Messageboard_notify {

    private $error = array();
    private $app_name;

    function __construct() {
        $this->ci = & get_instance();
        $this->ci->load->database();
        //$this->ci->load->model('masters/users_model');
        $this->app_name = $this->ci->config->item('application_name');
        //$this->autologin();
    }

    function get_new_message() {
        //echo "1";
    }

}
