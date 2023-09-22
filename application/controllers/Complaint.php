<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Complaint extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Menu_models', 'menuModels');
                $this->load->model('Complaint_models', 'complaintModels');
                is_cekLogin();
        }

        public function index()
        {
                $roleId = $this->session->userdata('roleId');
                //$this->session->siteId
                $data['title'] = 'Complaint';
                $data['fullname'] = $this->session->fullname;
                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
                $data['data'] = $this->complaintModels->getDataComplaint();
                $data['departement'] = $this->complaintModels->getDepartement($this->session->siteId, $roleId);
                $data['tower'] = $this->complaintModels->getTower($this->session->siteId);

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('complaint/index', $data);
        }

        public function createComplaint()
        {
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $tower = $this->input->post('tower');
                $floor = $this->input->post('floor');
                $unit = $this->input->post('unit');
                $message = $this->input->post('message');
                $departement = $this->input->post('departement');

                $create = $this->complaintModels->createComplaint($name, $phone, $tower, $floor, $unit, $message, $departement, $this->session->siteId);
                
                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Gagal Create Complaint"));
                }

        }

        public function getFloor()
        {
                $towerId = $this->input->post('towerId');

                $create = $this->complaintModels->getFloor($towerId);

                if ($create) {
                        echo json_encode(array("success" => "Success", "data" => $create));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }

        }

        public function getUnit()
        {
                $floorId = $this->input->post('floorId');

                $create = $this->complaintModels->getUnit($floorId);

                if ($create) {
                        echo json_encode(array("success" => "Success", "data" => $create));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }

        }
}