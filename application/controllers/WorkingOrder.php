<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WorkingOrder extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Menu_models', 'menuModels');
                $this->load->model('Working_Order_models', 'WOModels');
                $this->load->model('Complaint_models', 'complaintModels');
                is_cekLogin();
        }

        public function index()
        {
                $data['title'] = 'Working Order';
                $data['fullname'] = $this->session->fullname;
                $data['menu'] = $this->menuModels->getMenu($this->session->roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($this->session->roleId);
                $data['complaint'] = $this->WOModels->getDataComplaint($this->session->siteId);
                $data['data'] = $this->WOModels->getWorkOrder($this->session->siteId);
                $data['access_create'] = $this->WOModels->cekAccessCreate($this->session->roleId);

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('workingOrder/index', $data);
        }

        public function createWO()
        {
                $roleId = $this->session->userdata('roleId');
                //$this->session->siteId
                $data['title'] = 'Working Order';
                $data['fullname'] = $this->session->fullname;
                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
                $data['complaint'] = $this->WOModels->getDataComplaint($this->session->siteId);
                // var_dump($data['complaint']);
                // exit();
                // $data['data'] = $this->complaintModels->getDataComplaint();
                // $data['departement'] = $this->complaintModels->getDepartement($this->session->siteId);
                // $data['tower'] = $this->complaintModels->getTower($this->session->siteId);

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('workingOrder/createWO', $data);
        }

        public function insertWO()
        {
                $CRSelect = $this->input->post('CRSelect');
                $startDate = $this->input->post('startDate');
                $startTime = $this->input->post('startTime');

                $create = $this->WOModels->createWO($CRSelect, $startDate, $startTime, $this->session->siteId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Create Work Order"));
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