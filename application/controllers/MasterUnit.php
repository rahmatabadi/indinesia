<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterUnit extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Menu_models', 'menuModels');
                $this->load->model('Master_Floor_models', 'masterFloorModels');
                $this->load->model('Master_Unit_models', 'masterUnitModels');
                is_cekLogin();
        }

        public function index()
        {
                $roleId = $this->session->userdata('roleId');
                $data['floorId'] = $_GET['floorId'];

                $towerName = $this->masterFloorModels->getTowerName($data['towerId']);

                $data['title'] = 'Master Unit Tower ' . $towerName['tower_name'] . ' Floor Id';

                $data['fullname'] = $this->session->fullname;

                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
                //$data['data'] = $this->masterFloorModels->getFloor($data['floorId']);


                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('masterFloor/index', $data);
        }

        public function createFloor()
        {
                $towerId = $this->input->post('towerId');
                $number = $this->input->post('number');
                $desc = $this->input->post('desc');

                $create = $this->masterFloorModels->createFloor($number, $desc, $towerId, $this->session->siteId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Create Data"));
                }

        }

        public function updateFloor()
        {
                $id = $this->input->post('id');
                $number = $this->input->post('number');
                $desc = $this->input->post('desc');

                $create = $this->masterFloorModels->updateFloor($id, $number, $desc);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Update Data"));
                }

        }

        public function deleteFloor()
        {
                $id = $this->input->post('id');

                $create = $this->masterFloorModels->deleteFloor($id);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Delete Data"));
                }

        }
}