<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
	public function get_kamerabyid($id)
	{
		$query = $this->db->query("SELECT * FROM kamera WHERE id=" . $id);
		return $query->result_array();
	}

	public function get_fasilitastambahanbyid($id)
	{
		$query = $this->db->query("SELECT * FROM fasilitas_tambahan WHERE id= " . $id);
		return $query->result_array();
	}

	public function kamera_getAll()
	{
		$query = $this->db->query("SELECT * FROM kamera");
		return $query->result_array();
	}

	public function fasilitastambahan_getAll()
	{
		$query = $this->db->query("SELECT * FROM fasilitas_tambahan");
		return $query->result_array();
	}

	public function get_kamerabykategori($kategori)
	{
		$query = $this->db->query("SELECT * FROM kamera WHERE tipe=" . "'$kategori'");
		return $query->result_array();
	}

	public function get_kameradslr()
	{
		$query = $this->db->query("SELECT * FROM kamera WHERE tipe='dslr'");
		return $query->result_array();
	}

	public function get_kameramirrorless()
	{
		$query = $this->db->query("SELECT * FROM kamera WHERE tipe='Mirrorless'");
		return $query->result_array();
	}

	public function get_kameraactioncam()
	{
		$query = $this->db->query("SELECT * FROM kamera WHERE tipe='Action Cam'");
		return $query->result_array();
	}

	public function get_fasilitastambahanbykategori($kategori)
	{
		$query = $this->db->query("SELECT * FROM fasilitas_tambahan WHERE kategori=" . "'$kategori'");
		return $query->result_array();
	}

	public function get_lensa()
	{
		$query = $this->db->query("SELECT * FROM fasilitas_tambahan WHERE kategori='Lensa'");
		return $query->result_array();
	}

	public function get_flash()
	{
		$query = $this->db->query("SELECT * FROM fasilitas_tambahan WHERE kategori='Flash Eksternal'");
		return $query->result_array();
	}

	public function get_tripod()
	{
		$query = $this->db->query("SELECT * FROM fasilitas_tambahan WHERE kategori='Tripod'");
		return $query->result_array();
	}

	public function get_memori()
	{
		$query = $this->db->query("SELECT * FROM fasilitas_tambahan WHERE kategori='Kartu Memori'");
		return $query->result_array();
	}

	public function get_baterai()
	{
		$query = $this->db->query("SELECT * FROM fasilitas_tambahan WHERE kategori='Baterai Kamera'");
		return $query->result_array();
	}
}
