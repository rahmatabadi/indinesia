<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->model('Menu_models', 'menuModels');
	}
	
	public function index()
	{
        $data['menu'] = $this->menuModels->getMenu();

		$this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer');
	}
}