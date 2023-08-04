<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterRoom extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Menu_models', 'menuModels');
                $this->load->model('Master_Room_models', 'masterRoomModels');
        }

        public function index()
        {
                $roleId = $this->session->userdata('roleId');

                $data['title'] = 'Master Room';
                $data['fullname'] = $this->session->fullname;

                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
                $data['data'] = $this->masterRoomModels->getTower($this->session->siteId);


                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('masterRoom/index', $data);
        }

        public function createTower()
        {
                $name = $this->input->post('name');
                $desc = $this->input->post('desc');

                $create = $this->masterRoomModels->createTower($name, $desc, $this->session->siteId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Create Data"));
                }

        }

        public function deleteTower()
        {
                $id = $this->input->post('id');

                $create = $this->masterRoomModels->deleteTower($id);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Delete Data"));
                }

        }
        public function updateTower()
        {
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $desc = $this->input->post('desc');

                $create = $this->masterRoomModels->updateTower($id, $name, $desc);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Update Data"));
                }

        }

        public function detailTower()
        {
                $roleId = $this->session->userdata('roleId');

                $data['title'] = 'Master Room';
                $data['fullname'] = $this->session->fullname;

                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
                $data['data'] = $this->masterRoomModels->getTower($this->session->siteId);


                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('masterRoom/detailtower', $data);
        }
}