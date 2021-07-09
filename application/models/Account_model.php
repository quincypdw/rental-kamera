<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Account_model extends CI_Model
{
    public function customer_getById($id)
	{
		$query = $this->db->query("SELECT * FROM customer WHERE customer_id=$id");
		return $query;
	}
    
    public function customer_update($id, $data)
	{
		$this->db->set($data);
		$this->db->where('customer_id',$id);
		$this->db->update('customer',$data);
		if($this->db->affected_rows()>0){
			return true;
		} else {
			return false;
		}
	}
}
