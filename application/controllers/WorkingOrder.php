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
                $data['data'] = $this->WOModels->getWorkOrder($this->session->siteId, $this->session->roleId, $this->session->employeeId);
                $data['access_create'] = $this->WOModels->cekAccessCreate($this->session->roleId);
                $data['access_action'] = $this->WOModels->cekAccessAction($this->session->roleId);
                $data['employeeId'] = $this->session->employeeId;
                $data['departement'] = $this->complaintModels->getDepartement($this->session->siteId, $this->session->roleId);

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

                $create = $this->WOModels->createWO($CRSelect, $this->session->siteId);

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

                $create = $this->WOModels->createWOIn($name, $phone, $tower, $floor, $unit, $message, $departement, $this->session->siteId);

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
                $finishDate = $this->input->post('finish_date');

                $create = $this->WOModels->updateWorkerDone($id, $finishDate);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }
        }

        public function updateWorkerStart()
        {

                $id = $this->input->post('id');
                $startDate = $this->input->post('start_date');
                $create = $this->WOModels->updateWorkerStart($id, $startDate);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }
        }

        public function getDetailCR()
        {
                $cr = $this->input->post('cr');

                $data = $this->WOModels->getDetailCR($cr);

                if ($data) {
                        echo json_encode(array("success" => "Success", "data" => $data));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }

        }

        public function getDetailWO()
        {
                $id = $this->input->post('id');

                $data = $this->WOModels->getDetailWO($id);

                if ($data) {
                        echo json_encode(array("success" => "Success", "data" => $data));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }

        }

        public function deleteWO()
        {
                $id = $this->input->post('id');

                $delete = $this->WOModels->deleteWorkOrder($id);

                if ($delete) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }

        }

        public function updateWO()
        {
                $idCR = $this->input->post('idCR');
                $idWO = $this->input->post('idWO');
                $departement = $this->input->post('departement');

                $update = $this->WOModels->updateWO($idCR, $idWO, $departement);

                if ($update) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }

        }
}