<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->userlogin = $this->GetUserData();
        $this->load->model('M_pembayaran');
    }
    private $userlogin;

    public function index()
    {
        $data['pembayaran'] = $this->M_pembayaran->pembayaran_getAll();
        $this->load->view('backend/admin/transaksi/v_pembayaran', $data);
    }

    public function edit($id)
    {
        $data['payment']= $this->M_pembayaran->pembayaran_getById($id);
        $jumlahbayar = strip_tags($this->input->post('jumlahbayar'));
        $status = strip_tags($this->input->post('status'));

        $this->M_pembayaran->edit_jumlah($id, $jumlahbayar);
        $this->M_pembayaran->edit_status($id,$status);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Berhasil!</div>');
        redirect(base_url("backend/admin/pembayaran"));
        
    }

    public function delete($id)
    {
        $data['payment']= $this->M_pembayaran->pembayaran_getById($id);
        $this->M_pembayaran->delete('pembayaran', $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil!</div>');
        redirect(base_url("backend/admin/pembayaran"));
    }

    public function viewphoto($id)
    {
        $data['payment']= $this->M_pembayaran->pembayaran_getById($id);
    }


}