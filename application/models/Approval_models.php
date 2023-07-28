<?php

class Approval_models extends CI_Model
{
    public function getDataApproval($roleId)
    {
        return $this->db->select('a.*, b.desc')
            ->from('complaint a')
            ->join('status_complaint b', 'a.`status` = b.id')
            ->where(array('a.assign' => $roleId))
            ->get()->result_array();
    }

    public function updateWorker($id, $name, $roleId)
    {
        $this->db->update('complaint', array('worker' => $name, 'status' => '2'), array('id' => $id));

        $dataLog = array(
            'complaint_id' => $id,
            'assign' => $roleId,
            'worker' => $name,
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
}