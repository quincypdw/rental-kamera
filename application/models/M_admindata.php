<?php

class M_admindata extends CI_Model
{
    public function admin_getAll()
	{
		$query = $this->db->query("SELECT * FROM user");
		return $query;
	}

    public function admin_getById($id)
	{
		$query = $this->db->query("select * from user where id = $id");
		return $query;
	}

    public function admin_update($id, $table, $data)
	{
		$query = $this->db->where('id', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function admin_delete($table, $id)
	{
		$query = $this->db->where('id', $id);
		$query = $this->db->delete($table);
		return $query;
	}

    public function admin_cek($id)
	{
		$query = $this->db->query("select id from user where id='$id'");
		return $query->result_array();
	}

}