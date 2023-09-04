<?php

class Working_Order_models extends CI_Model
{
    public function getDataComplaint($siteId)
    {
        return $this->db->select('a.id')
            ->from('complaint a')
            ->join('work_order b', 'a.wo_id = b.id', 'LEFT')
            ->where(array('b.id' => null))
            ->get()->result_array();
    }

    public function createWO($CRSelect, $startDate, $startTime, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->trans_begin();
        $wo_id = 'W0/' . date('Ymd') . '/' . $siteId . '/' . date('His');

        $data = array(
            'id' => $wo_id,
            'start_date' => $startDate,
            'start_time' => $startTime,
            'status' => '1',
            'created_date' => date('d-m-Y H:i:s')
        );

        $this->db->insert('work_order', $data);

        $this->db->update('complaint', array('status' => '2', 'wo_id' => $wo_id), array('id' => $CRSelect));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function getWorkOrder($siteId)
    {
        return $this->db->select('a.wo_id,a.id,c.desc,b.status')
            ->from('complaint a')
            ->join('work_order b', 'a.wo_id = b.id')
            ->join('status_wo c', 'c.id = b.status')
            ->where(array('a.site_id' => $siteId))
            ->get()->result_array();
    }

    public function cekAccessCreate($roleId)
    {
        $cekAccess = $this->db->get_where('access', array('id' => '1'))->row_array();

        if (empty($cekAccess)) {
            return false;
        }

        $roleArr = explode(',', $cekAccess['role_id']);
        if (in_array($roleId, $roleArr)) {
            return true;
        } else {
            return false;
        }
    }

    public function cekAccessAction($roleId)
    {
        $cekAccess = $this->db->get_where('access', array('id' => '2'))->row_array();

        if (empty($cekAccess)) {
            return false;
        }

        $roleArr = explode(',', $cekAccess['role_id']);
        if (in_array($roleId, $roleArr)) {
            return true;
        } else {
            return false;
        }
    }

    public function createWOIn($name, $phone, $tower, $floor, $unit, $message, $departement, $startDate, $startTime, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->trans_begin();
        $CRId = 'CR/IN/' . date('Ymd') . '/' . $siteId . '/' . date('His');
        $data = array(
            'id' => $CRId,
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

        $this->db->insert('log_history', $dataLog);

        $wo_id = 'W0/IN/' . date('Ymd') . '/' . $siteId . '/' . date('His');

        $data = array(
            'id' => $wo_id,
            'start_date' => $startDate,
            'start_time' => $startTime,
            'status' => '1',
            'created_date' => date('d-m-Y H:i:s')
        );

        $this->db->insert('work_order', $data);

        $this->db->update('complaint', array('status' => '2', 'wo_id' => $wo_id), array('id' => $CRId));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function getEmployee($roleId, $siteId)
    {
        return $this->db->get_where('master_employee', array('departement_id' => $roleId, 'site_id' => $siteId))->result_array();
    }
    public function getCategoryComplaint($roleId, $siteId)
    {
        return $this->db->get_where('master_category_complaint', array('departement_id' => $roleId, 'site_id' => $siteId))->result_array();
    }

    public function updateWorker($id, $employee_id, $category, $roleId)
    {
        $this->db->update('work_order', array('employee_id' => $employee_id, 'status' => '2', 'complaint_category_id' => $category), array('id' => $id));

        $dataLog = array(
            'complaint_id' => $id,
            'assign' => $roleId,
            'worker' => $employee_id,
            'status' => '2',
            'time' => date('d-m-Y H:i:s')
        );

        return $this->db->insert('log_history', $dataLog);
    }

}