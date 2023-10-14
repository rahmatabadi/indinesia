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

    public function getDetailCR($cr)
    {
        return $this->db->select('*')
            ->from('complaint a')
            ->join('master_tower b', 'a.tower_id = b.tower_id')
            ->join('master_floor c', 'a.floor_id = c.floor_id')
            ->join('master_unit d', 'a.unit_id = d.unit_id')
            ->join('departement e', 'a.assign = e.id')
            ->where(array('a.id' => $cr))
            ->get()->row_array();
    }

    public function getDetailWO($id)
    {
        return $this->db->select('a.id as complaint_id,CONCAT_WS(\'/\',b.tower_name,floor_number,unit_number) as location,name,phone,a.date,a.message,e.departement_name,f.start_date,f.end_date,g.employee_name,f.id as wo_id, f.remark')
            ->from('complaint a')
            ->join('master_tower b', 'a.tower_id = b.tower_id')
            ->join('master_floor c', 'a.floor_id = c.floor_id')
            ->join('master_unit d', 'a.unit_id = d.unit_id')
            ->join('departement e', 'a.assign = e.id')
            ->join('work_order f', 'a.wo_id = f.id')
            ->join('master_employee g', 'g.employee_id = f.employee_id', 'LEFT')
            ->where(array('a.id' => $id))
            ->get()->row_array();
    }
    public function createWO($CRSelect, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->trans_begin();
        $wo_id = 'W0/' . date('Ymd') . '/' . $siteId . '/' . date('His');

        $getDepartement = $this->db->get_where('complaint', array('id' => $CRSelect))->row_array();

        $data = array(
            'id' => $wo_id,
            'departement_id' => $getDepartement['assign'],
            'status' => '1',
            'created_date' => date('Y-m-d H:i:s')
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

    public function getWorkOrder($siteId, $roleId, $employeeId)
    {
        if ($roleId != '1') {
            if ($employeeId == '0') {
                $wherArr = array('a.site_id' => $siteId, 'a.assign' => $roleId);
            } else {
                $wherArr = array('a.site_id' => $siteId, 'a.assign' => $roleId, 'b.employee_id' => $employeeId);
            }
        } else {
            $wherArr = array('a.site_id' => $siteId);
        }
        return $this->db->select('a.wo_id,a.id,c.desc,b.status,a.assign')
            ->from('complaint a')
            ->join('work_order b', 'a.wo_id = b.id')
            ->join('status_wo c', 'c.id = b.status')
            ->where($wherArr)
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

    public function createWOIn($name, $phone, $tower, $floor, $unit, $message, $departement, $siteId)
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
            'date' => date('Y-m-d H:i:s')
        );

        $this->db->insert('complaint', $data);

        $idComplaint = $this->db->insert_id();

        $dataLog = array(
            'complaint_id' => $idComplaint,
            'assign' => $departement,
            'worker' => 'Admin',
            'status' => '1',
            'time' => date('Y-m-d H:i:s')
        );

        $this->db->insert('log_history', $dataLog);

        $wo_id = 'W0/IN/' . date('Ymd') . '/' . $siteId . '/' . date('His');

        $data = array(
            'id' => $wo_id,
            'departement_id' => $departement,
            'status' => '1',
            'created_date' => date('Y-m-d H:i:s')
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
        $this->db->update('complaint', array('status' => '3'), array('wo_id' => $id));

        $dataLog = array(
            'complaint_id' => $id,
            'assign' => $roleId,
            'worker' => $employee_id,
            'status' => '2',
            'time' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('log_history', $dataLog);
    }

    public function updateWorkerDone($id, $finishDate)
    {
        $this->db->trans_begin();

        $this->db->update('work_order', array('end_date' => $finishDate, 'status' => '4'), array('id' => $id));
        $this->db->update('complaint', array('status' => '4'), array('wo_id' => $id));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function updateWorkerStart($id, $startDate)
    {
        $this->db->trans_begin();

        $this->db->update('work_order', array('start_date' => $startDate, 'status' => '3'), array('id' => $id));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function deleteWorkOrder($id)
    {
        return $this->db->delete('work_order', array('id' => $id));
    }

    public function updateWO($idCR, $idWO, $departement)
    {
        $this->db->trans_begin();

        //$this->db->update('work_order', array('start_date' => $startDate, 'status' => '3'), array('id' => $id));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}