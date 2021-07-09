<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{
    public function add_payment($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function order_getAll()
	{
		$query = $this->db->query("SELECT * FROM transaksi_penyewaan");
		return $query;
	}

    public function cekOrder($kode)
    {
        $query = $this->db->query("SELECT order_id FROM transaksi_penyewaan WHERE kode_transaksi='$kode'");
        $result=$query->row();
        if (isset($result))
        {
            return $result->order_id;
        }
        else
        {
            return 0;
        }
    }
    

}