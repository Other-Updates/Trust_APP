<?php

if (!defined('BASEPATH'))
    echo 'No Direct Access Allowed';

Class Api extends MX_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('api/api_model');
        $this->load->model('api/increment_model');
    }

}

?>