<?php

class Auth_models extends CI_Model
{
    public function validation($username, $password)
    {
        return $this->db->select('*')
            ->from('users a')
            ->join('site b', 'a.site_id = b.site_id')
            ->where(array('username' => $username, 'password' => $password))
            ->get()->row_array();
    }
}