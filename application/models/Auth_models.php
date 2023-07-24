<?php

class Auth_models extends CI_Model
{
    public function validation($username, $password)
    {
        return $this->db->get_where('users', array('username' => $username, 'password' => $password))->row_array();
    }
}