<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterUnit extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Menu_models', 'menuModels');
                $this->load->model('Master_Unit_models', 'masterUnitModels');
                is_cekLogin();
        }

        public function index()
        {
                $roleId = $this->session->userdata('roleId');
                $data['floorId'] = $_GET['floorId'];
                $data['towerId'] = $_GET['towerId'];

                $towerName = $this->masterUnitModels->getTowerName($data['towerId']);
                $floorNumber = $this->masterUnitModels->getFloorNumber($data['floorId']);

                $data['title'] = 'Master Unit Tower ' . $towerName['tower_name'] . ' Floor ' . $floorNumber['floor_number'];

                $data['fullname'] = $this->session->fullname;

                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
                $data['data'] = $this->masterUnitModels->getUnit($data['towerId'], $data['floorId'], $this->session->siteId);


                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('masterUnit/index', $data);
        }

        public function createUnit()
        {
                $floorId = $this->input->post('floorId');
                $number = $this->input->post('number');
                $desc = $this->input->post('desc');

                $create = $this->masterUnitModels->createUnit($number, $desc, $floorId, $this->session->siteId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Create Data"));
                }

        }

        public function updateUnit()
        {
                $id = $this->input->post('id');
                $number = $this->input->post('number');
                $desc = $this->input->post('desc');

                $create = $this->masterUnitModels->updateUnit($id, $number, $desc);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Update Data"));
                }

        }

        public function deleteUnit()
        {
                $id = $this->input->post('id');

                $create = $this->masterUnitModels->deleteUnit($id);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Delete Data"));
                }

        }
}