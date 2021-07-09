<?php

class M_kamera extends CI_Model
{
    public function kamera_getAll()
    {
        $query = $this->db->query("SELECT * FROM kamera ORDER BY id ASC");
        return $query;
    }

    public function add_kamera($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function kamera_getById($id)
    {
        $query = $this->db->query("select * from kamera where id = $id");
        return $query;
    }

    public function stok_kamera_getById($id)
    {
        $query = $this->db->query("select stok from kamera where id = $id");
        return $query;
    }

    public function kamera_update($id, $table, $data)
    {
        $query = $this->db->where('id', $id);
        $query = $this->db->update($table, $data);
        return $query;
    }

    public function kamera_delete($table, $id)
    {
        $query = $this->db->where('id', $id);
        $query = $this->db->delete($table);
        return $query;
    }

    public function kamera_minstock($qty, $id)
    {
        $query = $this->db->query("UPDATE kamera SET stok = stok - $qty Where id = $id");
        return $query;
    }

    public function kamera_plusstock($qty, $id)
    {
        $query = $this->db->query("UPDATE kamera SET stok = stok + $qty Where id = $id");
        return $query;
    }

    public function kamera_getstock($id)
    {
        $query = $this->db->query("SELECT stok FROM kamera WHERE id = $id");
        $result = $query->row();
        if (isset($result)) {
            return $result->stok;
        } else {
            return false;
        }
    }
}
