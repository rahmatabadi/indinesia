<?php

class Master_Unit_models extends CI_Model
{

    // Unit
    public function getTowerName($towerId)
    {
        return $this->db->select('tower_name')
            ->where(array('tower_id' => $towerId))
            ->get('master_tower')->row_array();
    }

    public function getFloorNumber($floorId)
    {
        return $this->db->select('floor_number')
            ->where(array('floor_id' => $floorId))
            ->get('master_floor')->row_array();
    }

    public function createUnit($number, $desc, $floorId, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'unit_number' => $number,
            'unit_desc' => $desc,
            'site_id' => $siteId,
            'floor_id' => $floorId,
            'date' => date('d-m-Y H:i:s')
        );

        return $this->db->insert('master_unit', $data);
    }

    public function getUnit($towerId, $floorId, $siteId)
    {
        return $this->db->select('*')
            ->from('master_tower a')
            ->join('master_floor b', 'a.tower_id = b.tower_id')
            ->join('master_unit c', 'b.floor_id = c.floor_id')
            ->where(array('a.tower_id' => $towerId, 'a.site_id' => $siteId, 'c.floor_id' => $floorId))
            ->get()->result_array();
    }

    public function updateUnit($unitId, $unitNumber, $unitDesc)
    {
        return $this->db->update('master_unit', array('unit_number' => $unitNumber, 'unit_desc' => $unitDesc), array('unit_id' => $unitId));
    }

    public function deleteUnit($unitId)
    {
        return $this->db->delete('master_unit', array('unit_id' => $unitId));
    }

}