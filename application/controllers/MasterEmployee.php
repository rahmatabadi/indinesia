<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterEmployee extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Menu_models', 'menuModels');
                $this->load->model('Master_Employee_models', 'masterEmployeeModels');
                is_cekLogin();
        }

        public function index()
        {
                $roleId = $this->session->userdata('roleId');

                $data['title'] = 'Master Employee';
                $data['fullname'] = $this->session->fullname;

                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
                $data['departement'] = $this->masterEmployeeModels->getDepartement($this->session->siteId);
                $data['data'] = $this->masterEmployeeModels->getEmployee($this->session->siteId);

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('masterEmployee/index', $data);
        }

        public function createEmployee()
        {
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $departement = $this->input->post('departement');

                $create = $this->masterEmployeeModels->createEmployee($name, $phone, $address, $departement, $this->session->siteId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Create Data"));
                }
        }

        public function deleteEmployee()
        {
                $id = $this->input->post('id');

                $create = $this->masterEmployeeModels->deleteEmployee($id);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Delete Data"));
                }

        }
        public function updateEmployee()
        {
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $departementId = $this->input->post('departementId');

                $create = $this->masterEmployeeModels->updateEmployee($id, $name, $phone, $address, $departementId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Update Data"));
                }

        }
}