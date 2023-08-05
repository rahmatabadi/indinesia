<?php

class Master_Departement_models extends CI_Model
{
    public function getDepartement($siteId)
    {
        return $this->db->get_where('departement', array('site_id' => $siteId))->result_array();
    }

    public function createDepartement($name, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'departement_name' => $name,
            'site_id' => $siteId
        );

        return $this->db->insert('departement', $data);
    }

    public function deleteDepartement($id)
    {
        return $this->db->delete('departement', array('id' => $id));
    }

    public function updateDepartement($id, $departementName)
    {
        return $this->db->update('departement', array('departement_name' => $departementName), array('id' => $id));
    }

}