<?php

class Master_Room_models extends CI_Model
{
    public function getTower($siteId)
    {
        return $this->db->get_where('master_tower', array('site_id' => $siteId))->result_array();
    }

    public function createTower($name, $desc, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'tower_name' => $name,
            'tower_desc' => $desc,
            'site_id' => $siteId,
            'date' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('master_tower', $data);
    }

    public function deleteTower($towerId)
    {
        return $this->db->delete('master_tower', array('tower_id' => $towerId));
    }

    public function updateTower($towerId, $towerName, $towerDesc)
    {
        return $this->db->update('master_tower', array('tower_name' => $towerName, 'tower_desc' => $towerDesc), array('tower_id' => $towerId));
    }

}