<?php

class M_diskon extends CI_Model
{
    public function diskon_getAll()
	{
		$query = $this->db->query("SELECT * FROM diskon");
		return $query;
	}

    public function diskon_getById($id)
	{
		$query = $this->db->query("select * from diskon where diskon_id = $id");
		return $query;
	}

    public function add_diskon($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function diskon_update($id, $table, $data)
	{
		$query = $this->db->where('diskon_id', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function diskon_delete($table, $id)
	{
		$query = $this->db->where('diskon_id', $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function cek_diskon($kode_promo)
	{
		$query = $this->db->query("SELECT potongan FROM diskon WHERE kode_promo = '$kode_promo'");
		$result = $query->row();
		if(isset($result))
        {
            return $result->potongan;
        }
        else
        {
            return false;
        }
	}

}