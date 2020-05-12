<?php

class Authcontroller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('msg', 'Unauthorize access.');
            redirect('login', 'refresh');
        }
    }

}
