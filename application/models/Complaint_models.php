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

    public function getDepartement($siteId, $roleId)
    {
        return $this->db->get_where('departement', array('site_id' => $siteId, 'id !=' => '1'))->result_array();
    }

    public function getTower($siteId)
    {
        return $this->db->get_where('master_tower', array('site_id' => $siteId))->result_array();
    }

    public function createComplaint($name, $phone, $tower, $floor, $unit, $message, $departement, $date, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->trans_begin();
        $idComplaint = 'CR/' . date('Ymd') . '/' . $siteId . '/' . date('His');
        $data = array(
            'id' => $idComplaint,
            'name' => $name,
            'phone' => $phone,
            'tower_id' => $tower,
            'floor_id' => $floor,
            'unit_id' => $unit,
            'site_id' => $siteId,
            'message' => $message,
            'assign' => $departement,
            'status' => '1',
            'created_date' => $date,
            'date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('complaint', $data);

        $dataLog = array(
            'complaint_id' => $idComplaint,
            'assign' => $departement,
            'worker' => 'Admin',
            'status' => '1',
            'time' => date('Y-m-d H:i:s')
        );

        $this->db->insert('log_history', $dataLog);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }

    }

    public function getFloor($towerId)
    {
        return $this->db->get_where('master_floor', array('tower_id' => $towerId))->result_array();
    }

    public function getUnit($floorId)
    {
        return $this->db->get_where('master_unit', array('floor_id' => $floorId))->result_array();
    }

    public function getDataComplaintById($id)
    {
        return $this->db->select('a.id as id_c, a.*, b.*, c.*, d.*, e.*, f.*')
            ->from('complaint a')
            ->join('status_complaint b', 'a.status = b.id')
            ->join('departement c', 'a.assign = c.id')
            ->join('master_tower d', 'a.tower_id = d.tower_id')
            ->join('master_floor e', 'a.floor_id = e.floor_id')
            ->join('master_unit f', 'a.unit_id = f.unit_id')
            ->where(array('a.id' => $id))
            ->order_by('a.id DESC')
            ->get()->row_array();
    }

    public function deleteComplaint($id)
    {
        return $this->db->delete('complaint', array('id' => $id));
    }

    public function updateComplaint($id, $name, $phone, $tower, $floor, $unit, $message, $departement, $date, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->trans_begin();

        $this->db->update('complaint', array(
            'name' => $name,
            'phone' => $phone,
            'tower_id' => $tower,
            'floor_id' => $floor,
            'unit_id' => $unit,
            'site_id' => $siteId,
            'message' => $message,
            'assign' => $departement,
            'status' => '1',
            'created_date' => $date
        ), array('id' => $id));


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }

    }
}