<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_models', 'menuModels');
        $this->load->model('Approval_models', 'approvalModels');
    }

    public function index()
    {
        $roleId = $this->session->userdata('roleId');

        $data['title'] = 'Approval';
        $data['fullname'] = $this->session->fullname;

        $data['menu'] = $this->menuModels->getMenu($roleId);
        $data['menuDetail'] = $this->menuModels->getMenuDetail($roleId);
        $data['data'] = $this->approvalModels->getDataApproval($roleId);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('approval/index', $data);
    }

    public function updateWorker()
    {
        $roleId = $this->session->userdata('roleId');
        $id = $this->input->post('id');
        $employee_id = $this->input->post('employee_id');
        $paid = $this->input->post('paid');
        $category = $this->input->post('category');

        $create = $this->approvalModels->updateWorker($id, $employee_id, $paid, $category, $roleId);

        if ($create) {
            echo json_encode(array("success" => "Success"));
        } else {
            echo json_encode(array("error" => "Data Tidak Ditemukan"));
        }
    }

    public function updateDone()
    {
        $roleId = $this->session->userdata('roleId');
        $id = $this->input->post('id');

        $create = $this->approvalModels->updateDone($id, $roleId);

        if ($create) {
            echo json_encode(array("success" => "Success"));
        } else {
            echo json_encode(array("error" => "Data Tidak Ditemukan"));
        }
    }

    public function getEmployee()
    {
        $roleId = $this->session->userdata('roleId');

        $getEmployee = $this->approvalModels->getEmployee($roleId, $this->session->siteId);

        if ($getEmployee) {
            echo json_encode(array("success" => "Success", "data" => $getEmployee));
        } else {
            echo json_encode(array("error" => "Empty Employee"));
        }
    }

    public function getCategoryComplaint()
    {
        $roleId = $this->session->userdata('roleId');

        $getEmployee = $this->approvalModels->getCategoryComplaint($roleId, $this->session->siteId);

        if ($getEmployee) {
            echo json_encode(array("success" => "Success", "data" => $getEmployee));
        } else {
            echo json_encode(array("error" => "Empty Category Complaint"));
        }
    }

    public function updateProcessDone()
    {
        $roleId = $this->session->userdata('roleId');
        $id = $this->input->post('id');
        $desc = $this->input->post('desc');

        $updateDone = $this->approvalModels->updateDoneNew($id, $desc, $roleId);

        if ($updateDone) {
            echo json_encode(array("success" => "Success"));
        } else {
            echo json_encode(array("error" => "Empty Category Complaint"));
        }
    }
}