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

    public function createEmployee($name, $phone, $address, $departement, $username, $password, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->trans_begin();
        $data = array(
            'employee_name' => $name,
            'employee_phone' => $phone,
            'employee_address' => $address,
            'departement_id' => $departement,
            'site_id' => $siteId,
            'date' => date('d-m-Y H:i:s')
        );

        $this->db->insert('master_employee', $data);

        $dataUsername = array(
            'username' => $username,
            'password' => $password,
            'role_id' => $departement,
            'fullname' => $name,
            'site_id' => $siteId,
            'employee_id' => $this->db->insert_id()
        );

        $this->db->insert('users', $dataUsername);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
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