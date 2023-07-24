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
                $data['menu'] = $this->menuModels->getMenu($roleId);
                $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);

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

                $create = $this->complaintModels->createComplaint($name, $phone, $room, $message);

                // if ($validation) {
                //         $newdata = array(
                //                 'username' => $validation['username'],
                //                 'roleId' => $validation['role_id']
                //         );

                //         $this->session->set_userdata($newdata);
                //         echo json_encode(array("success" => $validation));
                // } else {
                //         echo json_encode(array("error" => "Data Tidak Ditemukan"));
                // }

        }
}