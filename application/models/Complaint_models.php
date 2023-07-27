<?php

class Complaint_models extends CI_Model
{
    public function getDataComplaint()
    {
        return $this->db->select('*')
            ->from('complaint a')
            ->join('status_complaint b', 'a.status = b.id')
            ->join('departement c', 'a.assign = c.id')
            ->get()->result_array();
    }

    public function getDepartement()
    {
        return $this->db->get('departement')->result_array();
    }

    public function createComplaint($name, $phone, $room, $message, $departement)
    {
        $data = array(
            'name' => $name,
            'phone' => $phone,
            'room' => $room,
            'message' => $message,
            'assign' => $departement,
            'status' => '1'
        );

        return $this->db->insert('complaint', $data);
    }
}