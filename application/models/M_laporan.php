<?php

class M_laporan extends CI_Model
{
    public function produk_getAll()
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

    public function DataRange($start_date, $end_date)
	{
		$query = $this->db->query("SELECT SUM(dp.quantity_kamera) as jumlah_kamera, SUM(dp.quantity_produk) as jumlah_produk, tp.tanggal_order, tp.kode_transaksi FROM d_penyewaan dp
        JOIN transaksi_penyewaan tp ON dp.order_id = tp.order_id
        WHERE tp.tanggal_order >= '$start_date' AND tp.tanggal_order<= '$end_date'
        GROUP BY tp.tanggal_order");
		return $query->result_array();
	}

    public function DataChart($tahun)
    {
        $query = $this->db->query("SELECT b.id, b.inisial, SUM(quantity_kamera) AS jumlah_kamera, SUM(quantity_produk) AS jumlah_produk FROM d_penyewaan dp 
        JOIN transaksi_penyewaan tp ON dp.order_id=tp.order_id
        JOIN bulan b ON MONTH(tp.tanggal_order) = b.id
        WHERE YEAR(tp.tanggal_order) = '$tahun'
        GROUP BY b.id");
        return $query->result();
    }

    public function data_pdf($tahun)
    {
        $query = $this->db->query("SELECT tp.tanggal_order,dp.quantity_kamera, dp.quantity_produk FROM d_penyewaan dp
        JOIN transaksi_penyewaan tp ON tp.order_id=dp.order_id
        WHERE YEAR(tp.tanggal_order) = '$tahun'");
        return $query->result_array();
    }

    public function kamera_laris($bulan)
    {
        $query = $this->db->query("SELECT tp.tanggal_order, k.nama_kamera AS KAMERA, MAX(dp.quantity_kamera) AS JUMLAHK
        FROM d_penyewaan dp
        JOIN transaksi_penyewaan tp ON tp.order_id = dp.order_id
        LEFT JOIN kamera k ON dp.kamera_id = k.id
        WHERE MONTH(tp.tanggal_order) = '$bulan'");
        return $query->result_array();
    }
    // public function produk_laris($bulan)
    // {
    //     $query = $this->db->query("SELECT tp.tanggal_order, k.nama_kamera AS KAMERA, MAX(dp.quantity_kamera) AS JUMLAHK
    //     FROM d_penyewaan dp
    //     JOIN transaksi_penyewaan tp ON tp.order_id = dp.order_id
    //     LEFT JOIN kamera k ON dp.kamera_id = k.id
    //     WHERE MONTH(tp.tanggal_order) = '$bulan'");
    //     return $query->result_array();
    // }

}