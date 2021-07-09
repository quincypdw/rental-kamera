<?php
class login_model extends CI_Model
{
    public function login($username, $email, $password)
    {
        $query = $this->db->query("select * from customer where username = '$username' or email='$email' and password = '$password'");
        if($query->num_rows() == 1)
        {
            return $query;
        }
        else
        {
            return false;
        }
    }
}

?>