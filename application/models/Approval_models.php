<?php

class Approval_models extends CI_Model
{
    public function getDataApproval($roleId)
    {
        return $this->db->select('a.*, b.desc,d.*, e.*, f.*')
            ->from('complaint a')
            ->join('status_complaint b', 'a.`status` = b.id')
            ->join('master_tower d', 'a.tower_id = d.tower_id')
            ->join('master_floor e', 'a.floor_id = e.floor_id')
            ->join('master_unit f', 'a.unit_id = f.unit_id')
            ->where(array('a.assign' => $roleId))
            ->order_by('a.id DESC')
            ->get()->result_array();
    }

    public function updateWorker($id, $employee_id, $paid, $roleId)
    {
        $this->db->update('complaint', array('worker' => $employee_id, 'status' => '2', 'paid' => $paid), array('id' => $id));

        $dataLog = array(
            'complaint_id' => $id,
            'assign' => $roleId,
            'worker' => $employee_id,
            'status' => '2',
            'time' => date('d-m-Y H:i:s')
        );

        return $this->db->insert('log_history', $dataLog);
    }

    public function updateDone($id, $roleId)
    {
        $this->db->update('complaint', array('status' => '3'), array('id' => $id));

        $dataLog = array(
            'complaint_id' => $id,
            'assign' => $roleId,
            'worker' => 'Admin',
            'status' => '3',
            'time' => date('d-m-Y H:i:s')
        );

        return $this->db->insert('log_history', $dataLog);
    }

    public function getEmployee($roleId, $siteId)
    {
        return $this->db->get_where('master_employee', array('departement_id' => $roleId, 'site_id' => $siteId))->result_array();
    }
}