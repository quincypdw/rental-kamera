<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_pembayaran extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->cekLogin();
        //$this->userlogin = $this->GetUserData();
        $this->load->model('M_customer');
        $this->load->model('M_transaksi');
        $this->load->model('M_fasilitas_tambahan');
        $this->load->model('M_kamera');
        $this->load->model('M_diskon');
        $this->load->library('pdf');
    }
    private $userlogin;

    public function index()
    {
        $data['produk'] = $this->M_fasilitas_tambahan->fasilitas_tambahan_getAll();
        $data['kamera'] = $this->M_kamera->kamera_getAll();
        $data['customer'] = $this->M_customer->customer_getAll();
        $data['invoice'] = $this->M_transaksi->invoice_no();
        $this->load->view('backend/admin/transaksi/v_transaksi_pembayaran', $data);
    }

    public function add_to_cart()
    {
        $data = array(
            'id' => $this->input->post('product_id'),
            'name' => $this->input->post('product_name'),
            'price' => $this->input->post('product_price'),
            'discount' => $this->input->post('product_discount'),
            'qty' => $this->input->post('quantity'),
            'status' => $this->input->post('product_status')
        );
        $id = $this->input->post('product_id');
        $qty = $this->input->post('quantity');
        $status = $this->input->post('product_status');
        $stok_kamera = $this->M_kamera->kamera_getstock($id);
        $stok_produk = $this->M_fasilitas_tambahan->produk_getstock($id);

        if ($status == 1 && $stok_kamera >= 1) {
            $this->M_kamera->kamera_minstock($qty, $id);
            $this->cart->insert($data);
        } else if ($status == 2 && $stok_produk >= 1) {
            $this->M_fasilitas_tambahan->produk_minstock($qty, $id);
            $this->cart->insert($data);
        } else {
            echo '<script language=JavaScript>alert("Stok barang habis!"); onclick=location.reload()</script>';
        }
        echo $this->show_cart(); //tampilkan cart setelah added
    }

    function show_cart()
    { //Fungsi untuk menampilkan Cart
        $output = NULL;
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
                <tr>
                    <td>' . $items['id'] . '</td>
                    <td>' . $items['name'] . '</td>
                    <td>' . number_format($items['price']) . '</td>
                    <td>' . $items['qty'] . '</td>
                    <td>' . number_format($items['subtotal']) . '</td>
                    <td><button type="button" id="' . $items['rowid'] . '" class="remove_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        if ($no != 0) {
            $output .= '
            <tr>
                <th colspan="5">Total</th>
                <th colspan="5">' . 'Rp ' . number_format($this->cart->total()) . '</th>
            </tr>
        ';
        } else if ($no == 0) {
            $output .= '
					<tr>
					<td colspan="7" class="text-center">Tidak ada Item</td>
					</tr>';
        }
        return $output;
    }

    function load_cart()
    { //load data cart
        echo $this->show_cart();
    }

    function clear_cart()
    {
        $this->cart->destroy();
        echo '<script language=JavaScript>alert("Cart telah dicancel!"); onclick=location.href = document.referrer</script>';
    }

    function hapus_cart()
    { //fungsi untuk menghapus item cart
        foreach ($this->cart->contents() as $items) {
            $id = $items['id'];
            $qty = $items['qty'];
            $status = $items['status'];
            if ($status == 1) {
                $this->M_kamera->kamera_plusstock($qty, $id);
                $data = array(
                    'rowid' => $this->input->post('row_id'),
                    'qty' => 0,
                );
                $this->cart->update($data);
            } else if ($status == 2) {
                $this->M_fasilitas_tambahan->produk_plusstock($qty, $id);
                $data = array(
                    'rowid' => $this->input->post('row_id'),
                    'qty' => 0,
                );
                $this->cart->update($data);
            }
        }
        echo $this->show_cart();
    }


    public function add_penyewaan()
    {
        $transaksi = $this->input->post('kode_transaksi');
        date_default_timezone_set('Asia/Jakarta');
        $tgl_order = date("Y-m-d H:i:s");
        $peminjaman = date($this->input->post('peminjaman'));
        $customer = $this->input->post('customer');
        $durasi = $this->input->post('durasi');
        $kode_promo = $this->input->post('diskon');
        $pengembalian = date("Y-m-d H:i:s", strtotime($peminjaman . '+ ' . $durasi . 'days'));
        $cek_diskon = $this->M_diskon->cek_diskon($kode_promo);
        $status_barang = 'DIPESAN';

        if ($cek_diskon >= 0) {
            $data = array(
                'kode_transaksi' => $transaksi,
                'admin' => $this->session->userdata('masuk')[0]->id,
                'customer' => $customer,
                'tanggal_order' => $tgl_order,
                'tanggal_peminjaman' => $peminjaman,
                'tanggal_kembali' => $pengembalian,
                'diskon' => $cek_diskon,
                'status_barang' => $status_barang
            );
            $this->M_transaksi->transaksi_insert('transaksi_penyewaan', $data);

            foreach ($this->cart->contents() as $items) {
                $id = number_format($items['id']);
                $qty = number_format($items['qty']);
                $total = $items['subtotal'] * $durasi;
                $diskon = $items['subtotal'] * ($cek_diskon / 100);
                $sub_total = $total - $diskon;
                $status = $items['status'];

                if ($status == 1) {
                    $data = array(
                        'kamera_id' => $id,
                        'quantity_kamera' => $qty,
                        'total_price' => $sub_total,
                        'order_id' => $this->M_transaksi->transaksi_last_id()->order_id,
                    );
                } else if ($status == 2) {
                    $data = array(
                        'produk_id' => $id,
                        'quantity_produk' => $qty,
                        'total_price' => $sub_total,
                        'order_id' => $this->M_transaksi->transaksi_last_id()->order_id,
                    );
                }
                $this->M_transaksi->d_penyewaan_insert('d_penyewaan', $data);
            }

            $this->cart->destroy();
            echo '<script language=JavaScript>alert("Transaksi Sudah Terinput!"); onclick=location.reload()</script>';
        } else if ($peminjaman == NULL) {
            echo '<script language=JavaScript>alert("Tanggal Peminjaman belum di input!"); onclick=location.reload()</script>';
        } else if ($durasi == NULL) {
            echo '<script language=JavaScript>alert("Durasi belum di input!"); onclick=location.reload()</script>';
        } else if ($customer == NULL) {
            echo '<script language=JavaScript>alert("Silahkan pilih customer!"); onclick=location.reload()</script>';
        } else {
            echo '<script language=JavaScript>alert("Kode Promo tidak ditemukan!"); onclick=location.reload()</script>';
        }
    }

    public function print_invoice()
    {
        $id = $this->M_transaksi->order_id_terakhir();
        $data = array(
            'invoice' => $this->M_transaksi->invoice_print($id)
        );
        $this->load->view('backend/admin/transaksi/v_invoice', $data);
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Invoice.pdf";
        $this->pdf->load_view('backend/admin/transaksi/v_invoice.php', $data);
    }
}
