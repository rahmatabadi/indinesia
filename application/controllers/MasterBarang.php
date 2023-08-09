<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterBarang extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Menu_models', 'menuModels');
                $this->load->model('Master_Barang_models', 'masterBarangModels');
                is_cekLogin();
        }

        public function index()
        {
                $roleId = $this->session->userdata('roleId');

                $data['title'] = 'Master Product';

                $data['fullname'] = $this->session->fullname;

                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
                $data['data'] = $this->masterBarangModels->getProduct($this->session->siteId);


                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/footer', $data);
                $this->load->view('masterBarang/index', $data);
        }

        public function createProduct()
        {
                $name = $this->input->post('name');
                $stock = $this->input->post('stock');
                $desc = $this->input->post('desc');

                $create = $this->masterBarangModels->createProduct($name, $stock, $desc, $this->session->siteId);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Create Data"));
                }

        }

        public function updateProduct()
        {
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $stock = $this->input->post('stock');
                $desc = $this->input->post('desc');

                $create = $this->masterBarangModels->updateProduct($id, $name, $stock, $desc);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Update Data"));
                }

        }

        public function deleteProduct()
        {
                $id = $this->input->post('id');

                $create = $this->masterBarangModels->deleteProduct($id);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Failed Delete Data"));
                }

        }
}