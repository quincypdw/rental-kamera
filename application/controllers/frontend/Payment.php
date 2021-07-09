<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('payment_model');
    }

    public function verification()
    {
        $this->load->view('frontend/v_paymentverification');
    }

    public function add()
    {
        $kode = strip_tags($this->input->post('order'));
        $nama = strip_tags($this->input->post('nama'));
        $jumlah = strip_tags($this->input->post('jumlah'));
        $tanggal_bayar = date($this->input->post('tglbyr'));
        $foto_bukti = $_FILES['buktitrf'];

        $order_id = $this->payment_model->cekOrder($kode);
        if ($order_id == 0) {
            echo '<script language=JavaScript>alert("Kode Transaksi tidak ditemukan!"); onclick=history.go(-1)</script>';
        } else {
            if ($foto_bukti = '') {
            } else {
                $config['upload_path'] = './assets/image-bukti';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = "$kode" . "_" . "$nama";

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('buktitrf')) {
                    echo '<script language=JavaScript>alert("Upload Gagal. File terlalu besar. Maksimal 2 MB"); onclick=history.go(-1)</script>';;
                    die();
                } else {
                    $foto_bukti = $this->upload->data('file_name');
                }
            }
            $data = array(
                'order_id'         => $order_id,
                'tanggal_bayar'    => $tanggal_bayar,
                'jumlah_bayar'     => $jumlah,
                'nama_pengirim'    => $nama,
                'bukti_transfer'   => $foto_bukti
            );
            $this->payment_model->add_payment('pembayaran', $data);
            echo '<script language=JavaScript>alert("Upload Berhasil. Terimakasih! "); onclick=location.href="../payment/verification"</script>';
        }
    }

    public function method()
    {
        $this->load->view('frontend/v_paymentmethod.php');
    }
}
