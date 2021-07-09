<?php

class M_pembayaran extends CI_Model
{
    public function pembayaran_getAll()
    {
        $query = $this->db->query("SELECT p.*,tp.kode_transaksi,tp.status_bayar FROM pembayaran p JOIN transaksi_penyewaan tp ON p.order_id = tp.order_id order by p.tanggal_bayar desc");
        return $query;
    }

    public function pembayaran_getById($id)
    {
        $query = $this->db->query("SELECT p.* FROM pembayaran p JOIN transaksi_penyewaan tp ON p.order_id = tp.order_id where p.id_bayar = $id");
        return $query;
    }

    public function edit_status($id,$status)
    {
        $query = $this->db->query("UPDATE transaksi_penyewaan LEFT JOIN pembayaran ON pembayaran.order_id = transaksi_penyewaan.order_id 
        SET transaksi_penyewaan.status_bayar = '$status' where pembayaran.id_bayar = $id");
        return $query;
    }

    public function edit_jumlah($id,$jumlahbayar)
    {
        $query = $this->db->query("UPDATE pembayaran SET jumlah_bayar = '$jumlahbayar' WHERE id_bayar = $id;");
        return $query;

    }



    public function delete($table, $id)
    {
        $query = $this->db->where('id_bayar', $id);
        $query = $this->db->delete($table);
        return $query;
    }

//     public function kamera_update($id, $table, $data)
//     {
//         $query = $this->db->where('id', $id);
//         $query = $this->db->update($table, $data);
//         return $query;
//     }

//     public function delete_foto($id)
//     {
//         $query = $this->db->query("SELECT gambar_kamera FROM kamera where id = $id");
//         $row = $query->row();
//         unlink("./assets/image-kamera/$row");
//     }

//     function foto_delete($table,$id,$data)
//     {
//         $query = $this->db->where('id',$id);
//         $query = $this->db->delete($table, $data);
//         return $query;
//     }

//     /*
//     public function kamera_cek($id)
// 	{
// 		$query = $this->db->query("select id from user where id='$id'");
// 		return $query->result_array();
// 	}
// */
}
