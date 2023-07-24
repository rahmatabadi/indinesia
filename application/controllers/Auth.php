<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_models', 'authModels');
    }

    public function index()
    {
        $this->load->view('templates/auth_header');
        $this->load->view('templates/auth_footer');
        $this->load->view('auth/login');
    }

    public function validation()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $validation = $this->authModels->validation($username, $password);

        if ($validation) {
            $newdata = array(
                'username' => $validation['username'],
                'roleId' => $validation['role_id']
            );

            $this->session->set_userdata($newdata);
            echo json_encode(array("success" => $validation));
        } else {
            echo json_encode(array("error" => "Data Tidak Ditemukan"));
        }
    }
}