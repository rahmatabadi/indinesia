<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterComplaint extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Menu_models', 'menuModels');
                $this->load->model('Master_Complaint_models', 'masterComplaintModels');
                is_cekLogin();
        }

        public function index()
        {
                $roleId = $this->session->userdata('roleId');

                $data['title'] = 'Master Category Complaint';
                $data['fullname'] = $this->session->fullname;

                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
                $data['departement'] = $this->masterComplaintModels->getDepartement($this->session->siteId);
                $data['data'] = $this->masterComplaintModels->getCategoryComplaint($this->session->siteId);

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('masterComplaint/index', $data);
        }

        public function createComplaint()
        {
                $name = $this->input->post('name');
                $desc = $this->input->post('desc');
                $departementId = $this->input->post('departement');

                $create = $this->masterComplaintModels->createComplaint($name, $desc, $departementId, $this->session->siteId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Create Data"));
                }

        }

        public function deleteComplaint()
        {
                $id = $this->input->post('id');

                $create = $this->masterComplaintModels->deleteComplaint($id);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Delete Data"));
                }

        }
        public function updateComplaint()
        {
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $desc = $this->input->post('desc');
                $departementId = $this->input->post('departement');

                $create = $this->masterComplaintModels->updateComplaint($id, $name, $desc, $departementId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Update Data"));
                }

        }
}