<?php

class M_customer extends CI_Model
{
	public function customer_getAll()
	{
		$query = $this->db->query("SELECT * FROM customer");
		return $query;
	}

	public function customer_getById($id)
	{
		$query = $this->db->query("select * from customer where customer_id = $id");
		return $query;
	}

	public function customer_update($id, $table, $data)
	{
		$query = $this->db->where('customer_id', $id);
		$query = $this->db->update($table, $data);
		return $query;
	}

	public function customer_delete($table, $id)
	{
		$query = $this->db->where('customer_id', $id);
		$query = $this->db->delete($table);
		return $query;
	}

	public function rangeDate($start_date, $end_date)
	{
		$query = $this->db->query("SELECT * FROM customer WHERE date_created >= '$start_date' AND date_created <= '$end_date'");
		return $query;
	}

	public function hitung_jumlah_customer($start_date, $end_date)
	{
		$query = $this->db->query("SELECT COUNT(customer) AS Jumlah, tanggal_order, transaksi_penyewaan.* FROM transaksi_penyewaan WHERE tanggal_order >= '$start_date' AND tanggal_order <= '$end_date' GROUP BY(tanggal_order)");
		return $query->result_array();
	}

	public function get_data_pdf()
	{
		$query = $this->db->query("SELECT COUNT(customer) AS Jumlah, tanggal_order, kode_transaksi FROM transaksi_penyewaan GROUP BY(tanggal_order)");
		return $query->result_array();
	}

	public function get_data_by_id($tanggal_order)
	{
		$query = $this->db->query("SELECT tp.customer, tp.kode_transaksi, c.nama, tp.tanggal_order FROM transaksi_penyewaan tp
		INNER JOIN customer c ON tp.customer = c.customer_id
		WHERE tp.tanggal_order = '$tanggal_order'
		GROUP BY tp.kode_transaksi");
		return $query;
	}

	public function DataChart($tahun)
	{
		$query = $this->db->query("SELECT b.inisial, COUNT(tp.customer) AS Jumlah FROM transaksi_penyewaan tp 
        JOIN bulan b ON MONTH(tp.tanggal_order) = b.id
        WHERE YEAR(tp.tanggal_order) = '$tahun'
        GROUP BY b.id");
		return $query->result();
	}
	
}
