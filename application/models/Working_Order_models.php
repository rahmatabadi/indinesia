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
        $cekAccess = $this->db->get_where('access_create', array('id' => '1'))->row_array();

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
}