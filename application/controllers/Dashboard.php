<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Menu_models', 'menuModels');
        }

        public function index()
        {
                $roleId = $this->session->userdata('roleId');

                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);

                $this->load->view('templates/header');
                $this->load->view('templates/topbar');
                $this->load->view('templates/sidebar', $data);
                $this->load->view('dashboard/index');
                $this->load->view('templates/footer');
        }
}