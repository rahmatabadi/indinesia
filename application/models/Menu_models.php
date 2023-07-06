<?php

class Menu_models extends CI_Model
{
    public function getMenu()
    {
        $this->db->select('*');
        $this->db->from('sub_menu');
        $this->db->join('menu', 'sub_menu.id_menu = menu.id_menu');
        return $this->db->get()->result_array();
    }
}