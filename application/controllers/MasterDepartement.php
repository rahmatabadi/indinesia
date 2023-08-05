<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterDepartement extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Menu_models', 'menuModels');
                $this->load->model('Master_Departement_models', 'masterDepartementModels');
                is_cekLogin();
        }

        public function index()
        {
                $roleId = $this->session->userdata('roleId');

                $data['title'] = 'Master Departement';
                $data['fullname'] = $this->session->fullname;

                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
                $data['data'] = $this->masterDepartementModels->getDepartement($this->session->siteId);

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('masterDepartement/index', $data);
        }

        public function createDepartement()
        {
                $name = $this->input->post('name');

                $create = $this->masterDepartementModels->createDepartement($name, $this->session->siteId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Create Data"));
                }

        }

        public function deleteDepartement()
        {
                $id = $this->input->post('id');

                $create = $this->masterDepartementModels->deleteDepartement($id);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Delete Data"));
                }

        }
        public function updateDepartement()
        {
                $id = $this->input->post('id');
                $name = $this->input->post('name');

                $create = $this->masterDepartementModels->updateDepartement($id, $name);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Update Data"));
                }

        }
}