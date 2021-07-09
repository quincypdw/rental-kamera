<?php

class M_transaksi extends CI_Model
{
    public function transaksi_getAll()
    {
        $query = $this->db->query("SELECT * from transaksi_penyewaan");
        return $query;
    }

    public function transaksi_insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function transaksi_customer_admin()
    {
        $query = $this->db->query("SELECT tp.*, c.nama, u.name FROM transaksi_penyewaan tp JOIN customer c ON tp.customer = c.customer_id LEFT JOIN user u ON tp.admin = u.id");
        return $query;
    }

    public function pengembalian_transaksi($id, $status_barang, $denda, $catatan)
    {
        $query = $this->db->query("UPDATE transaksi_penyewaan SET status_barang = '$status_barang', denda=$denda, catatan='$catatan' WHERE order_id = $id");
        return $query;
    }

    public function bayar_transaksi($id, $status)
    {
        $query = $this->db->query("UPDATE transaksi_penyewaan SET status_bayar = '$status' WHERE order_id = $id");
        return $query;
    }

    public function transaksi_getAll1()
    {
        $query = $this->db->query("SELECT dp.*,tp.*, c.nama, u.name FROM d_penyewaan dp
        JOIN transaksi_penyewaan tp ON dp.order_id = tp.order_id
        JOIN customer c ON tp.customer = c.customer_id
        LEFT JOIN user u ON tp.admin = u.id
        WHERE dp.order_id = tp.order_id");
        return $query;
    }

    // public function add_kamera($table, $data)
    // {
    //     $query = $this->db->insert($table, $data);
    //     return $query;
    // }

    public function transaksi_getById($id)
    {
        $query = $this->db->query("SELECT tp.*, c.nama, u.name, d.kode_promo FROM transaksi_penyewaan tp
        INNER JOIN customer c ON c.customer_id = tp.customer_id
        INNER JOIN user u ON u.id = tp.user_id
        INNER JOIN diskon d ON d.diskon_id = tp.diskon_id where order_id = $id");
        return $query;
    }


    public function transaksi_delete($table, $id)
    {
        $query = $this->db->where('id', $id);
        $query = $this->db->delete($table);
        return $query;
    }

    public function invoice_no()
    {
        $query = $this->db->query("SELECT MAX(order_id) as invoice_no from transaksi_penyewaan");
        if ($query->num_rows() >= 0) {
            $row = $query->row();
            $n = ((int) $row->invoice_no) + 1;
            $no = sprintf("%09s", $n);
        } else {
            $no = sprintf("%09s", 1);
        }
        $kode_transaksi = "IN" . $no;
        return $kode_transaksi;
    }

    public function transaksi_last_id()
    {
        $query = $this->db->query("SELECT MAX(order_id) as order_id FROM transaksi_penyewaan");
        return $query->row();
    }

    public function d_penyewaan_insert($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    //ini untuk detail transaksi
    public function detail_transaksi($order_id)
    {
        $query = $this->db->query("SELECT transaksi_penyewaan.*,customer.nama as nama_customer,customer.nik,user.name as nama_admin,
        kamera.nama_kamera,d_penyewaan.quantity_kamera,fasilitas_tambahan.nama_produk,d_penyewaan.quantity_produk,d_penyewaan.total_price as subtotal
        FROM d_penyewaan
    LEFT JOIN transaksi_penyewaan ON d_penyewaan.order_id=transaksi_penyewaan.order_id
    LEFT JOIN kamera ON d_penyewaan.kamera_id=kamera.id
    LEFT JOIN fasilitas_tambahan ON d_penyewaan.produk_id=fasilitas_tambahan.id
    LEFT JOIN customer ON transaksi_penyewaan.customer=customer.customer_id
    LEFT JOIN user ON transaksi_penyewaan.admin=user.id
    WHERE d_penyewaan.order_id='$order_id'");
        return $query;
    }

    //ini total harga yang seharusnya untuk detail
    public function jumlahharga($order_id)
	{
		$query = $this->db->query("SELECT SUM(d_penyewaan.total_price) as total_harga FROM d_penyewaan 
		where d_penyewaan.order_id= $order_id GROUP BY d_penyewaan.order_id");
		return $query;
	}

    public function laporan_pendapatan_getAll()
    {
        $query = $this->db->query("SELECT dp.*,tp.* FROM d_penyewaan dp INNER JOIN transaksi_penyewaan tp ON dp.order_id=tp.order_id");
        return $query;
    }

    public function transaksi_getAll2($transaksi_id)
    {
        $query = $this->db->query("SELECT dp.*, k.*,ft.*, tp.* FROM d_penyewaan dp 
        LEFT JOIN kamera k ON dp.kamera_id=k.id 
        LEFT JOIN fasilitas_tambahan ft ON dp.produk_id = ft.id 
        INNER JOIN transaksi_penyewaan tp ON dp.order_id = tp.order_id
        WHERE tp.kode_transaksi= '$transaksi_id'");
        return $query;
    }

    public function rangeDate($start_date, $end_date)
    {
        $query = $this->db->query("SELECT dp.*, tp.* FROM d_penyewaan dp 
        JOIN transaksi_penyewaan tp ON dp.order_id=tp.order_id
        WHERE tanggal_order >= '$start_date' AND tanggal_order <= '$end_date'
        GROUP BY tp.kode_transaksi");
        return $query;
    }

    public function data_excel($start_date, $end_date)
    {
        $query = $this->db->query("SELECT dp.*, tp.*, c.*, u.* FROM d_penyewaan dp 
        JOIN transaksi_penyewaan tp ON dp.order_id=tp.order_id
        LEFT JOIN customer c ON tp.customer = c.customer_id
        LEFT JOIN user u ON tp.admin = u.id
        WHERE tp.tanggal_order >= '$start_date' AND tp.tanggal_order <= '$end_date'
        GROUP BY tp.kode_transaksi");
        return $query->result_array();
    }

    public function DataChart($tahun)
    {
        $query = $this->db->query("SELECT b.id, b.inisial, SUM(dp.total_price) AS total FROM d_penyewaan dp 
        JOIN transaksi_penyewaan tp ON dp.order_id=tp.order_id
        JOIN bulan b ON MONTH(tp.tanggal_order) = b.id
        WHERE YEAR(tp.tanggal_order) = '$tahun'
        GROUP BY b.id");
        return $query->result();
    }

    public function invoice_print($id)
    {
        $query = $this->db->query("SELECT dp.*,tp.*, c.nama, u.name, tp.diskon FROM d_penyewaan dp
        JOIN transaksi_penyewaan tp ON dp.order_id = tp.order_id
        JOIN customer c ON tp.customer = c.customer_id
        JOIN user u ON tp.admin = u.id
        WHERE dp.order_id = tp.order_id AND tp.order_id = '$id'");
        return $query;
    }

    public function order_id_terakhir()
    {
        $query = $this->db->query("SELECT MAX(order_id) as id_order FROM transaksi_penyewaan");
        $result = $query->row();
        if (isset($result)) {
            return $result->id_order;
        } else {
            return false;
        }
    }

    public function jumlah_penjualan($tahun)
    {
        $query = $this->db->query("SELECT b.inisial, COUNT(tp.customer) AS Jumlah FROM d_penyewaan dp 
        JOIN transaksi_penyewaan tp ON dp.order_id=tp.order_id
        JOIN bulan b ON MONTH(tp.tanggal_order) = b.id
        WHERE YEAR(tp.tanggal_order) = '$tahun'
        GROUP BY b.id");
        return $query->result();
    }
}
