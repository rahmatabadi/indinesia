<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        // $this->load->model('Auth_models', 'authModels');
	}
	
	public function index()
	{
		$this->load->view('templates/auth_header');
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
	}
}