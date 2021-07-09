<?php

class M_register extends CI_Model
{
    public function register($data)
    {
        $this->db->query("INSERT INTO 'user' ('name','username','password','level_id','jenis_kelamin','foto_user','email') VALUES ('$data')");
        
    }
    
    public function cek_register($username)
    {
        $query = $this->db->query("SELECT username FROM user where username = '$username'");

        if($query->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}