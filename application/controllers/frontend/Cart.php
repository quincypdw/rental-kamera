<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        #Load model, helper dan library
        $this->load->library('carts');
        $this->load->model('transaksi_model');
        $this->load->model('product_model');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $kode_promo = strip_tags($this->input->post('coupon'));
            $diskon = $this->transaksi_model->cekDiskon($kode_promo);
            $data['kode_promo'] = strip_tags($this->input->post('coupon'));
            $data['diskon1'] = $this->transaksi_model->cekDiskon($kode_promo);
            $data['hargadiskon'] = $this->carts->total() * ($diskon / 100);
            $data['totaldiskon'] = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
            $data['kamera'] = $this->product_model->kamera_getAll();
            $this->carts;
            $this->load->view('frontend/v_cart', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Harap Daftar/Login Dahulu!!</div>');
            redirect(base_url('frontend/auth'));
            // $data['title'] = 'Login Pesona Antariksa Lens';
            // $this->load->view('frontend/template/auth_header', $data);
            // $this->load->view('frontend/v_login');
            // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            // $this->form_validation->set_rules('password', 'Password', 'required|trim');
        }
    }

    public function add_to_cart($id)
    {
        if ($this->session->userdata('email')) {
            $kamera = $this->transaksi_model->find($id);
            if ($kamera->stok > 0) {
                $data = array(
                    'id'      => $kamera->id,
                    'qty'     => $this->input->post('quant[1]') || 1,
                    'price'   => $kamera->harga_kamera,
                    'name'    => $kamera->nama_kamera
                );

                $this->carts->insert($data);
                redirect(base_url('welcome'));
            } else {
                echo '<script language=JavaScript>alert("Gagal stok habis!"); onclick=history.go(-1)</script>';
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Harap Daftar/Login Dahulu!!</div>');
            redirect(base_url('frontend/auth'));
            // $data['title'] = 'Login Pesona Antariksa Lens';
            // $this->load->view('frontend/template/auth_header', $data);
            // $this->load->view('frontend/v_login');
            // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            // $this->form_validation->set_rules('password', 'Password', 'required|trim');
        }
    }

    public function add_to_carts($id)
    {
        if ($this->session->userdata('email')) {
            $produk = $this->transaksi_model->finds($id);

            $data = array(
                'id'      => $produk->id,
                'qty'     => $this->input->post('quant[1]') || 1,
                'price'   => $produk->harga_produk,
                'name'    => $produk->nama_produk
            );

            $this->carts->insert($data);
            redirect(base_url('welcome'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Harap Daftar/Login Dahulu!!</div>');
            redirect(base_url('frontend/auth'));
            // $data['title'] = 'Login Pesona Antariksa Lens';
            // $this->load->view('frontend/template/auth_header', $data);
            // $this->load->view('frontend/v_login');
            // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            // $this->form_validation->set_rules('password', 'Password', 'required|trim');
        }
    }

    public function delete_cart()
    {
        $this->carts->destroy();
        redirect(base_url('welcome'));
    }

    public function deletecart($id)
    {
        $data = array(
            'rowid'   => $id,
            'qty'     => 0
        );

        $this->carts->update($data);
        echo $this->index();
    }

    public function hitungDiskon()
    {
        $kode_promo = strip_tags($this->input->post('coupon'));
        $diskon = $this->transaksi_model->cekDiskon($kode_promo);
        $tanggal1 = $this->transaksi_model->cekmasaDiskon1($kode_promo);
        $tanggal2 = $this->transaksi_model->cekmasaDiskon2($kode_promo);
        $cekorder = $this->transaksi_model->cekorderDiskon($this->session->userdata('customer_id'));
        //var_dump($kode_promo);exit();
        if (strcmp($kode_promo, "ulangtahun") == 0 && strcmp(date("m-d"), date("m-d", strtotime($this->session->userdata('tanggal_lahir')))) == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kode Promo Berhasil Digunakan!! Selamat ulang tahun ya! Sukses selalu! </div>');
            $this->session->set_tempdata('discount', $diskon, 300);
            $discounttotal = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
            $kode_promo = strip_tags($this->input->post('coupon'));
            $data['diskon1'] = $this->transaksi_model->cekDiskon($kode_promo);
            $data['hargadiskon'] = $this->carts->total() * ($diskon / 100);
            $data['totaldiskon'] = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
            $this->session->set_tempdata('totaldiscount', $discounttotal, 300);
            //$this->load->view('frontend/v_carts',$data);
            $diskonn = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
            $this->load->view('frontend/v_checkout', $data);
            return $diskonn;
        } else if (strcmp($kode_promo, "ulangtahun") == 0 && strcmp(date("m-d"), date("m-d", strtotime($this->session->userdata('tanggal_lahir')))) != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode Promo Tidak Dapat Digunakan. Hanya dapat digunakan saat kamu ulang tahun!!</div>');
            redirect(base_url('frontend/cart/checkout'));
            $diskonn = 0;
            return $diskonn;
        }
        if (strcmp($kode_promo, "cobasewa") == 0 && $cekorder==true)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kode Promo Berhasil Digunakan!!</div>');
            $this->session->set_tempdata('discount', $diskon, 300);
            $discounttotal = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
            $kode_promo = strip_tags($this->input->post('coupon'));
            $data['diskon1'] = $this->transaksi_model->cekDiskon($kode_promo);
            $data['hargadiskon'] = $this->carts->total() * ($diskon / 100);
            $data['totaldiskon'] = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
            $this->session->set_tempdata('totaldiscount', $discounttotal, 300);
            //$this->load->view('frontend/v_carts',$data);
            $diskonn = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
            $this->load->view('frontend/v_checkout', $data);
            return $diskonn;
        } else if (strcmp($kode_promo, "cobasewa") == 0 && $cekorder==false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode Promo Tidak Dapat Digunakan. Hanya dapat digunakan saat pertama kali order!!</div>');
            redirect(base_url('frontend/cart/checkout'));
            $diskonn = 0;
            return $diskonn;
        }
        if ($diskon <= 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode Promo Tidak Ditemukan!!</div>');
            redirect(base_url('frontend/cart/checkout'));
            $diskonn = 0;
            return $diskonn;
        } else {
            if ($tanggal1 <= date("Y-m-d") && date("Y-m-d") <= $tanggal2) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kode Promo Berhasil Digunakan!!</div>');
                $this->session->set_tempdata('discount', $diskon, 300);
                $discounttotal = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
                $kode_promo = strip_tags($this->input->post('coupon'));
                $data['diskon1'] = $this->transaksi_model->cekDiskon($kode_promo);
                $data['hargadiskon'] = $this->carts->total() * ($diskon / 100);
                $data['totaldiskon'] = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
                $this->session->set_tempdata('totaldiscount', $discounttotal, 300);
                //$this->load->view('frontend/v_carts',$data);
                $diskonn = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
                $this->load->view('frontend/v_checkout', $data);
                return $diskonn;
            } else if(date("Y-m-d") < $tanggal1)  {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode Promo Tidak Ditemukan!!</div>');
                redirect(base_url('frontend/cart/checkout'));
                $diskonn = 0;
                return $diskonn;
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode Promo Sudah Tidak Berlaku!!</div>');
                redirect(base_url('frontend/cart/checkout'));
                $diskonn = 0;
                return $diskonn;
            }
        }
        return $diskon;
    }

    public function getDiskon()
    {
        $kode_promo = strip_tags($this->input->post('coupon'));
        $diskon = $this->transaksi_model->cekDiskon($kode_promo);
        if ($this->hitungDiskon() == 0) {
            return 0;
        } else {
            return $this->carts->total() * ($diskon / 100);
        }
    }

    public function checkout()
    {
        if ($this->session->userdata('email')) {
            $this->carts;
            $kode_promo = strip_tags($this->input->post('coupon'));
            $diskon = $this->transaksi_model->cekDiskon($kode_promo);
            $discounttotal = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
            $data['kode_promo'] = strip_tags($this->input->post('coupon'));
            $data['diskon1'] = $this->transaksi_model->cekDiskon($kode_promo);
            $data['hargadiskon'] = $this->carts->total() * ($diskon / 100);
            $data['totaldiskon'] = $this->carts->total() - ($this->carts->total() * ($diskon / 100));
            $this->session->set_tempdata('totaldiscount', $discounttotal, 300);
            $this->load->view('frontend/v_checkout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Harap Daftar/Login Dahulu!!</div>');
            redirect(base_url('frontend/auth'));
        }
    }

    public function tambahTransaksi()
    {
        $transaksi = $this->transaksi_model->invoice_no();
        date_default_timezone_set('Asia/Jakarta');
        $tgl_order = date("Y-m-d H:i:s");
        $peminjaman = date($this->input->post('tanggal_pinjam'));
        $customer = $this->session->userdata('customer_id');
        $durasi = $this->input->post('durasi_peminjaman');
        $kode_promo = $this->session->tempdata('discount');
        $pengembalian = date("Y-m-d", strtotime($peminjaman . '+ ' . $durasi . 'days'));
        $this->carts;

        if ($peminjaman == NULL) {
            echo '<script language=JavaScript>alert("Tanggal Peminjaman belum di input!"); onclick=location.reload()</script>';
        } else if ($durasi == NULL) {
            echo '<script language=JavaScript>alert("Durasi belum di input!"); onclick=location.reload()</script>';
        } else if ($kode_promo == "") {
            $kode_promo = 0;
        }

        $data = array(
            'kode_transaksi' => $transaksi,
            'admin' => null,
            'customer' => $customer,
            'tanggal_order' => $tgl_order,
            'tanggal_peminjaman' => $peminjaman,
            'tanggal_kembali' => $pengembalian,
            'diskon' => $kode_promo,
            'status_barang' => 'DIPESAN'
        );
        //var_dump($data);exit();
        $this->transaksi_model->transaksi_insert('transaksi_penyewaan', $data);
        foreach ($this->carts->contents() as $items) {
            $id = $items['id'];
            $qty = $items['qty'];
            $sub_total = $items['subtotal'] * $durasi - ($items['subtotal'] * ($kode_promo / 100));
            if ($id >= 0 && $id < 100) {
                $data = array(
                    'kamera_id' => $id,
                    'quantity_kamera' => $qty,
                    'total_price' => $sub_total,
                    'order_id' => $this->transaksi_model->transaksi_last_id()->order_id,
                );
                $this->transaksi_model->min_stockkamera($qty, $id);
            } else if ($id >= 100) {
                $data = array(
                    'produk_id' => $id,
                    'quantity_produk' => $qty,
                    'total_price' => $sub_total,
                    'order_id' => $this->transaksi_model->transaksi_last_id()->order_id,
                );
                $this->transaksi_model->min_stockfastam($qty, $id);
            }
            $this->transaksi_model->d_penyewaan_insert('d_penyewaan', $data);
        }
        $this->carts->destroy();
        echo '<script language=JavaScript>alert("Transaksi Sudah Terinput!"); onclick=location.href="./invoice"</script>';
    }

    public function invoice()
    {
        $id = $this->transaksi_model->order_id_terakhir();
        $data['penyewaan'] = $this->transaksi_model->transaksi_getAll($id);
        $data['jumlah_sewa'] = $this->transaksi_model->jumlahbarang($id);
        $data['totalharga'] = $this->transaksi_model->jumlahharga($id);
        //var_dump($this->transaksi_model->jumlahharga($id)->result_array());exit();
        $this->load->view('frontend/v_invoice', $data);
        // $paper_size = 'A4';
        // $orientation = 'potrait';
        // $html = $this->output->get_output();
        // $this->dompdf->set_paper($paper_size, $orientation);
        // $this->dompdf->load_html($html);
        // $this->dompdf->render();
        // $this->dompdf->stream(
        //     "Invoice Pesona Lens.pdf",
        //     array('Attachment' => 0)
        // );
    }
}
