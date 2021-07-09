<?php

class M_pengembalian extends CI_Model
{
    public function pengembalian_getAll()
    {
        $query = $this->db->query("SELECT p.*, tp.kode_transaksi, c.nama, u.name FROM pengembalian p
        INNER JOIN transaksi_penyewaan tp ON p.order_id = tp.order_id
        INNER JOIN customer c ON p.customer_id = c.customer_id
        INNER JOIN user u ON p.user_id = u.id");
        return $query;
    }

    public function add_pengembalian($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function pengembalian_getById($id)
    {
        $query = $this->db->query("SELECT p.*, tp.kode_transaksi, c.nama, u.name FROM pengembalian p
        INNER JOIN transaksi_penyewaan tp ON p.order_id = tp.order_id
        INNER JOIN customer c ON p.customer_id = c.customer_id
        INNER JOIN user u ON p.user_id = u.id where p.pengembalian_id = $id");
        return $query;
    }

    public function pengembalian_update($id, $table, $data)
    {
        $query = $this->db->where('id', $id);
        $query = $this->db->update($table, $data);
        return $query;
    }

    public function pengembalian_delete($table, $id)
    {
        $query = $this->db->where('id', $id);
        $query = $this->db->delete($table);
        return $query;
    }
}
