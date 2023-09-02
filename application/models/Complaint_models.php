<?php

class Complaint_models extends CI_Model
{
    public function getDataComplaint()
    {
        return $this->db->select('a.id as id_c, a.*, b.*, c.*, d.*, e.*, f.*')
            ->from('complaint a')
            ->join('status_complaint b', 'a.status = b.id')
            ->join('departement c', 'a.assign = c.id')
            ->join('master_tower d', 'a.tower_id = d.tower_id')
            ->join('master_floor e', 'a.floor_id = e.floor_id')
            ->join('master_unit f', 'a.unit_id = f.unit_id')
            ->order_by('a.id DESC')
            ->get()->result_array();
    }

    public function getDepartement($siteId)
    {
        return $this->db->get_where('departement', array('site_id' => $siteId))->result_array();
    }

    public function getTower($siteId)
    {
        return $this->db->get_where('master_tower', array('site_id' => $siteId))->result_array();
    }

    public function createComplaint($name, $phone, $tower, $floor, $unit, $message, $departement, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id' => 'CR/' . date('Ymd') . '/' . $siteId . '/' . date('His'),
            'name' => $name,
            'phone' => $phone,
            'tower_id' => $tower,
            'floor_id' => $floor,
            'unit_id' => $unit,
            'site_id' => $siteId,
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

    public function getFloor($towerId)
    {
        return $this->db->get_where('master_floor', array('tower_id' => $towerId))->result_array();
    }

    public function getUnit($floorId)
    {
        return $this->db->get_where('master_unit', array('floor_id' => $floorId))->result_array();
    }
}