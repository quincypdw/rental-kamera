<?php

class M_fasilitas_tambahan extends CI_Model
{
    public function fasilitas_tambahan_getAll()
    {
        $query = $this->db->query("SELECT * FROM fasilitas_tambahan");
        return $query;
    }

    public function add_fasilitas_tambahan($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function fasilitas_tambahan_getById($id)
    {
        $query = $this->db->query("select * from fasilitas_tambahan where id = $id");
        return $query;
    }

    public function fasilitas_tambahan_update($id, $table, $data)
    {
        $query = $this->db->where('id', $id);
        $query = $this->db->update($table, $data);
        return $query;
    }

    public function delete_foto($id)
    {
        $query = $this->db->query("SELECT gambar_fasilitas_tambahan FROM fasilitas_tambahan where id = $id");
        $row = $query->row();
        unlink("./assets/image-fasilitas_tambahan/$row");
    }

    function foto_delete($table, $id, $data)
    {
        $query = $this->db->where('id', $id);
        $query = $this->db->delete($table, $data);
        return $query;
    }

    public function fasilitas_tambahan_delete($table, $id)
    {
        $query = $this->db->where('id', $id);
        $query = $this->db->delete($table);
        return $query;
    }
    public function produk_minstock($qty, $id)
    {
        $query = $this->db->query("UPDATE fasilitas_tambahan SET stok = stok - $qty Where id = $id");
        return $query;
    }

    public function produk_plusstock($qty, $id)
    {
        $query = $this->db->query("UPDATE fasilitas_tambahan SET stok = stok + $qty Where id = $id");
        return $query;
    }

    public function produk_getstock($id)
    {
        $query = $this->db->query("SELECT stok from fasilitas_tambahan WHERE id=$id");
        $result = $query->row();
        if (isset($result)) {
            return $result->stok;
        } else {
            return false;
        }
    }
}
