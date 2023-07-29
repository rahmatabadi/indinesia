<?php

class Complaint_models extends CI_Model
{
    public function getDataComplaint()
    {
        return $this->db->select('*')
            ->from('complaint a')
            ->join('status_complaint b', 'a.status = b.id')
            ->join('departement c', 'a.assign = c.id')
            ->order_by('a.id DESC')
            ->get()->result_array();
    }

    public function getDepartement()
    {
        return $this->db->get('departement')->result_array();
    }

    public function createComplaint($name, $phone, $room, $message, $departement)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'name' => $name,
            'phone' => $phone,
            'room' => $room,
            'message' => $message,
            'assign' => $departement,
            'status' => '1',
            'date' => date('d-m-Y H:i:s')
        );

        $this->db->insert('complaint', $data);

        $idComplaint = $this->db->insert_id();

        $dataLog = array(
            'complaint_id' => $idComplaint,
            'assign' => $departement,
            'worker' => 'Admin',
            'status' => '1',
            'time' => date('d-m-Y H:i:s')
        );

        return $this->db->insert('log_history', $dataLog);
    }
}