<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Complaint extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Menu_models', 'menuModels');
                $this->load->model('Complaint_models', 'complaintModels');
        }

        public function index()
        {
                $roleId = $this->session->userdata('roleId');

                $data['title'] = 'Complaint';
                $data['fullname'] = $this->session->fullname;
                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
                $data['data'] = $this->complaintModels->getDataComplaint();
                $data['departement'] = $this->complaintModels->getDepartement();

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
                $room = $this->input->post('room');
                $message = $this->input->post('message');
                $departement = $this->input->post('departement');

                $create = $this->complaintModels->createComplaint($name, $phone, $room, $message, $departement);

                if ($create) {
                        echo json_encode(array("success" => "Success"));
                } else {
                        echo json_encode(array("error" => "Data Tidak Ditemukan"));
                }

        }
}