<?php

class Master_Complaint_models extends CI_Model
{
    public function getDepartement($siteId)
    {
        return $this->db->get_where('departement', array('site_id' => $siteId))->result_array();
    }

    public function getCategoryComplaint($siteId)
    {
        return $this->db->select('*')
            ->from('master_category_complaint a')
            ->join('departement b', 'a.departement_id = b.id')
            ->where(array('a.site_id' => $siteId))
            ->get()->result_array();
    }
    public function createComplaint($name, $desc, $departementId, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'category_complaint_name' => $name,
            'category_complaint_desc' => $desc,
            'departement_id' => $departementId,
            'site_id' => $siteId,
            'date' => date('d-m-Y H:i:s')
        );

        return $this->db->insert('master_category_complaint', $data);
    }

    public function deleteComplaint($id)
    {
        return $this->db->delete('master_category_complaint', array('category_complaint_id' => $id));
    }

    public function updateComplaint($id, $name, $desc, $departementId)
    {
        return $this->db->update('master_category_complaint', array('category_complaint_name' => $name, 'category_complaint_desc' => $desc), array('category_complaint_id' => $id));
    }

}