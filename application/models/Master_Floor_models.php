<?php

class Master_Floor_models extends CI_Model
{

    // FLOOR
    public function getTowerName($towerId)
    {
        return $this->db->select('tower_name')
            ->where(array('tower_id' => $towerId))
            ->get('master_tower')->row_array();
    }
    public function createFloor($number, $desc, $towerId, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'floor_number' => $number,
            'floor_desc' => $desc,
            'site_id' => $siteId,
            'tower_id' => $towerId,
            'date' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('master_floor', $data);
    }

    public function getFloor($towerId)
    {
        return $this->db->select('*')
            ->from('master_tower a')
            ->join('master_floor b', 'a.tower_id = b.tower_id')
            ->where(array('a.tower_id' => $towerId))
            ->get()->result_array();
    }

    public function updateFloor($floorId, $floorNumber, $floorDesc)
    {
        return $this->db->update('master_floor', array('floor_number' => $floorNumber, 'floor_desc' => $floorDesc), array('floor_id' => $floorId));
    }

    public function deleteFloor($floorId)
    {
        return $this->db->delete('master_floor', array('floor_id' => $floorId));
    }

}