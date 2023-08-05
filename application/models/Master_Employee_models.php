<?php

class Master_Employee_models extends CI_Model
{
    public function getDepartement($siteId)
    {
        return $this->db->get_where('departement', array('site_id' => $siteId))->result_array();
    }

    public function getEmployee($siteId)
    {
        return $this->db->select('*')
            ->from('master_employee a')
            ->join('departement b', 'a.departement_id = b.id')
            ->where(array('a.site_id' => $siteId))
            ->get()->result_array();
    }

    public function createEmployee($name, $phone, $address, $departement, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'employee_name' => $name,
            'employee_phone' => $phone,
            'employee_address' => $address,
            'departement_id' => $departement,
            'site_id' => $siteId,
            'date' => date('d-m-Y H:i:s')
        );

        return $this->db->insert('master_employee', $data);
    }

    public function deleteEmployee($id)
    {
        return $this->db->delete('master_employee', array('employee_id' => $id));
    }

    public function updateEmployee($id, $name, $phone, $address, $departementId)
    {
        return $this->db->update('master_employee', array('employee_name' => $name, 'employee_phone' => $phone, 'employee_address' => $address, 'departement_id' => $departementId), array('employee_id' => $id));
    }

}