<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function index() {
        $this->load->view('aimit/login');
    }
    public function processing() {
        if (!$this->input->post('submit')) {
            $this->session->set_flashdata('msg', 'Please Login');
            redirect('login');
        } else {
            $this->load->model('Auth_Model');
            $this->form_validation->set_rules('email', 'Eamil Id', 'required|valid_email|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == TRUE) {
                $this->Auth_Model->ProcessAuthentication($this->input->post('email'), $this->input->post('password'));
            } else {
                $this->load->view('aimit/login');
            }
        }
    }

    
}