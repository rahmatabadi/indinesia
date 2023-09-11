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
                $data['data'] = $this->WOModels->getWorkOrder($this->session->siteId, $this->session->roleId);
                $data['access_create'] = $this->WOModels->cekAccessCreate($this->session->roleId);
                $data['access_action'] = $this->WOModels->cekAccessAction($this->session->roleId);

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('workingOrder/index', $data);
        }

        public function createWO()
        {
                $data['title'] = 'Working Order';
                $data['fullname'] = $this->session->fullname;
                $data['menu'] = $this->menuModels->getMenu($this->session->roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($this->session->roleId);
                $data['complaint'] = $this->WOModels->getDataComplaint($this->session->siteId);

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('workingOrder/createWO', $data);
        }

        public function createWOInternal()
        {
                $data['title'] = 'Working Order';
                $data['fullname'] = $this->session->fullname;
                $data['menu'] = $this->menuModels->getMenu($this->session->roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($this->session->roleId);
                $data['complaint'] = $this->WOModels->getDataComplaint($this->session->siteId);
                $data['departement'] = $this->complaintModels->getDepartement($this->session->siteId, $this->session->roleId);
                $data['tower'] = $this->complaintModels->getTower($this->session->siteId);

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('workingOrder/createWOInternal', $data);
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

        public function createWOIn()
        {
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $tower = $this->input->post('tower');
                $floor = $this->input->post('floor');
                $unit = $this->input->post('unit');
                $message = $this->input->post('message');
                $departement = $this->input->post('departement');
                $startDate = $this->input->post('startDate');
                $startTime = $this->input->post('startTime');

                $create = $this->WOModels->createWOIn($name, $phone, $tower, $floor, $unit, $message, $departement, $startDate, $startTime, $this->session->siteId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }

        }

        public function getEmployee()
        {
                $roleId = $this->session->userdata('roleId');

                $getEmployee = $this->WOModels->getEmployee($roleId, $this->session->siteId);

                if ($getEmployee) {
                        echo json_encode(array("success" => "Success", "data" => $getEmployee));
                } else {
                        echo json_encode(array("error" => "Empty Employee"));
                }
        }

        public function getCategoryComplaint()
        {
                $roleId = $this->session->userdata('roleId');

                $getEmployee = $this->WOModels->getCategoryComplaint($roleId, $this->session->siteId);

                if ($getEmployee) {
                        echo json_encode(array("success" => "Success", "data" => $getEmployee));
                } else {
                        echo json_encode(array("error" => "Empty Category Complaint"));
                }
        }

        public function updateWorker()
        {
                $roleId = $this->session->userdata('roleId');
                $id = $this->input->post('id');
                $employee_id = $this->input->post('employee_id');
                $category = $this->input->post('category');

                $create = $this->WOModels->updateWorker($id, $employee_id, $category, $roleId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }
        }

        public function updateWorkerDone()
        {

                $id = $this->input->post('id');
                $finishDate = $this->input->post('finsih_date');
                $finishTime = $this->input->post('finsih_time');

                $create = $this->WOModels->updateWorkerDone($id, $finishDate, $finishTime);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }
        }
}