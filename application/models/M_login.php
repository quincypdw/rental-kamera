<?php

class M_login extends CI_Model
{
    public function login($username, $password)
    {
        $query = $this->db->query("select * from user where username = '$username' and password = '$password'");
        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    
}