<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function find($id)
	{
		$result = $this->db->where('id', $id)
			->limit(1)
			->get('kamera');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function finds($id)
	{
		$result = $this->db->where('id', $id)
			->limit(1)
			->get('fasilitas_tambahan');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function cekDiskon($kodepromo)
	{
		date_default_timezone_set("Asia/Jakarta");
		$query = $this->db->query("SELECT potongan FROM diskon WHERE kode_promo='$kodepromo'");
		$result = $query->row();
		if (isset($result)) {
			return $result->potongan;
		} else {
			return 0;
		}
	}

	public function cekmasaDiskon1($kodepromo)
	{
		date_default_timezone_set("Asia/Jakarta");
		$query = $this->db->query("SELECT tanggal_awal FROM diskon WHERE kode_promo='$kodepromo'");
		$result = $query->row();
		if (isset($result)) {
			return $result->tanggal_awal;
		} else {
			return 0;
		}
	}

	public function cekmasaDiskon2($kodepromo)
	{
		date_default_timezone_set("Asia/Jakarta");
		$query = $this->db->query("SELECT tanggal_akhir FROM diskon WHERE kode_promo='$kodepromo'");
		$result = $query->row();
		if (isset($result)) {
			return $result->tanggal_akhir;
		} else {
			return 0;
		}
	}

	public function cekorderDiskon($id)
	{
		$result = $this->db->where('customer', $id)
			->get('transaksi_penyewaan');
		if ($result->num_rows() == 0) {
			return true;
		} else {
			return false;
		}
	}



    public function cekKamera($id)
    {
        $query = $this->db->query("SELECT id FROM kamera WHERE id=$id");
		$result = $query->row();
		if (isset($result)) {
			return $result->id;
		} else {
			return 0;
		}
    }

    public function cekFastam($id)
    {
        $query = $this->db->query("SELECT id FROM fasilitas_tambahan WHERE id=$id");
		$result = $query->row();
		if (isset($result)) {
			return $result->id;
		} else {
			return 0;
		}
    }

	public function min_stockkamera($qty, $kamera_id)
	{
		$query = $this->db->query(" UPDATE kamera SET stok = stok - $qty WHERE id = $kamera_id");
		return $query;
	}

	public function min_stockfastam($qty, $produk_id)
	{
		$query = $this->db->query(" UPDATE fasilitas_tambahan SET stok = stok - $qty WHERE id = $produk_id");
		return $query;
	}

	public function invoice_no()
	{
		$query = $this->db->query(" SELECT MAX(order_id) as invoice_no from transaksi_penyewaan");
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$n = ((int) $row->invoice_no) + 1;
			$no = sprintf("%09s", $n);
		} else {
			$no = sprintf("%09s", 1);
		}
		$kode_transaksi = "IN" . $no;
		return $kode_transaksi;
	}

	public function d_penyewaan_insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function transaksi_insert($table, $data)
	{
		$query = $this->db->insert($table, $data);
		return $query;
	}

    public function transaksi_last_id()
	{
		$query = $this->db->query("SELECT MAX(order_id) as order_id FROM transaksi_penyewaan");
		return $query->row();
	}

	public function transaksi_getAll($id)
	{
		$query = $this->db->query("SELECT transaksi_penyewaan.kode_transaksi, transaksi_penyewaan.order_id, d_penyewaan.d_penyewaan_id, kamera.nama_kamera as nama_kamera, d_penyewaan.quantity_kamera, fasilitas_tambahan.nama_produk as nama_produk, d_penyewaan.quantity_produk, customer.nama,transaksi_penyewaan.tanggal_order,transaksi_penyewaan.tanggal_peminjaman,transaksi_penyewaan.tanggal_kembali,transaksi_penyewaan.diskon, d_penyewaan.total_price 
		FROM d_penyewaan
		JOIN transaksi_penyewaan ON d_penyewaan.order_id = transaksi_penyewaan.order_id
		LEFT JOIN kamera ON d_penyewaan.kamera_id = kamera.id
		LEFT JOIN fasilitas_tambahan ON d_penyewaan.produk_id = fasilitas_tambahan.id
		JOIN customer ON transaksi_penyewaan.customer = customer.customer_id
        WHERE d_penyewaan.order_id = transaksi_penyewaan.order_id AND transaksi_penyewaan.order_id = '$id'");
        return $query;
	}

	public function jumlahbarang($id)
	{
		$query = $this->db->query("SELECT COUNT(*) as jml_sewa FROM d_penyewaan 
		where d_penyewaan.order_id= $id GROUP BY d_penyewaan.order_id");
		return $query;
	}

	public function jumlahharga($id)
	{
		$query = $this->db->query("SELECT SUM(d_penyewaan.total_price) as total_harga FROM d_penyewaan 
		where d_penyewaan.order_id= $id GROUP BY d_penyewaan.order_id");
		return $query;
	}

	public function order_id_terakhir()
    {
        $query = $this->db->query("SELECT MAX(order_id) as id_order FROM transaksi_penyewaan");
        $result = $query->row();
        if(isset($result))
        {
            return $result->id_order;
        }
        else
        {
            return false;
        }
    }
}