<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->userlogin = $this->GetUserData();
        $this->load->model('M_transaksi');
    }
    private $userlogin;

    public function index()
    {
        $data['transaksi'] = $this->M_transaksi->transaksi_getAll();
        $data['transaksi1'] = $this->M_transaksi->transaksi_customer_admin();
        $this->load->view('backend/admin/transaksi/v_transaksi', $data);
    }

    public function bayar_transaksi($id)
    {
        $status=$this->input->post('status_bayar');
        $this->M_transaksi->bayar_transaksi($id,$status);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Pembayaran Berhasil!</div>');
        redirect(base_url("backend/admin/transaksi"));
    }

    public function delete($id)
    {
        $this->M_transaksi->transaksi_delete('transaksi_penyewaan', $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil!</div>');
        redirect(base_url("backend/admin/transaksi"));
    }

    public function kembali($id)
    {
        $status = $this->input->post('status_barang');
        $denda = $this->input->post('denda');
        $catatan = $this->input->post('catatan');
        $this->M_transaksi->pengembalian_transaksi($id,$status,$denda,$catatan);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status barang berhasil diupdate!</div>');
        redirect(base_url("backend/admin/transaksi"));
    }

    public function detail($order_id)
    {
        $data = array(
			'transaksi' => $this->M_transaksi->detail_transaksi($order_id),
            'total_harga' => $this->M_transaksi->jumlahharga($order_id)
		);
		$this->load->view('backend/admin/transaksi/v_detail', $data);
    }

    public function invoice_pengembalian($order_id)
    {
        $data = array(
			'transaksi' => $this->M_transaksi->detail_transaksi($order_id),
            'total_harga' => $this->M_transaksi->jumlahharga($order_id)
		);
		$this->load->view('backend/admin/transaksi/v_detail', $data);
    }
}