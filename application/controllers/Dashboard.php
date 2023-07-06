<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        // $this->load->model('Auth_models', 'authModels');
	}
	
	public function index()
	{
		$this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer');
	}
}