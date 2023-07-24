<?php

class Menu_models extends CI_Model
{
    public function getMenu($roleId)
    {
        return $this->db->select('a.*')
            ->from('menu a')
            ->join('access_menu b', 'a.id_menu = b.menu_id')
            ->where(array('b.role_id' => $roleId))
            ->group_by('a.id_menu')
            ->get()->result_array();
    }

    public function getMenuDetail($roleId)
    {
        return $this->db->select('a.*')
            ->from('sub_menu a')
            ->join('access_menu b', 'a.id_sub_menu = b.sub_menu_id')
            ->where(array('b.role_id' => $roleId))
            ->group_by('a.id_sub_menu')
            ->get()->result_array();
    }
}