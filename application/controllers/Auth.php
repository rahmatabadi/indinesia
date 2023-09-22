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
        if ($this->session->username) {
            redirect('dashboard');
        }
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
                'fullname' => $validation['fullname'],
                'roleId' => $validation['role_id'],
                'siteName' => $validation['site_name'],
                'siteId' => $validation['site_id'],
                'employeeId' => $validation['employee_id'],
            );

            $this->session->set_userdata($newdata);
            echo json_encode(array("success" => $validation));
        } else {
            echo json_encode(array("error" => "Data Tidak Ditemukan"));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('roleId');
        $this->session->unset_userdata('fullname');

        redirect('auth');
    }
}