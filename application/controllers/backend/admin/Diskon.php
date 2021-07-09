<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskon extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->userlogin = $this->GetUserData();
        $this->load->model('M_diskon');
	}
	private $userlogin;

	public function index()
	{
        $data['diskon'] = $this->M_diskon->diskon_getAll();
		$this->load->view('backend/admin/diskon/v_diskon.php', $data);
	}

    public function add()
    {
        $kode_promo = strip_tags($this->input->post('i_kode_promo'));
        $potongan = strip_tags($this->input->post('i_potongan'));
        $tanggal_awal = strip_tags($this->input->post('i_tanggal_awal'));
        $tanggal_akhir = strip_tags($this->input->post('i_tanggal_akhir'));

        $data = array(
            'kode_promo'                => $kode_promo,
            'potongan'                        => $potongan,
            'tanggal_awal'                      => $tanggal_awal,
            'tanggal_akhir'                    => $tanggal_akhir
        );

        $this->M_diskon->add_diskon('diskon', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Input Data Berhasil!</div>');
        redirect(base_url("backend/admin/diskon"));
    }


    public function edit($id)
    {
        $data['diskon']		= $this->M_diskon->diskon_getById($id);

        $kode_promo = strip_tags($this->input->post('i_kode_promo'));
        $potongan = strip_tags($this->input->post('i_potongan'));
        $tanggal_awal = strip_tags($this->input->post('i_tanggal_awal'));
        $tanggal_akhir = strip_tags($this->input->post('i_tanggal_akhir'));

        $data = array(
            'kode_promo'                => $kode_promo,
            'potongan'                        => $potongan,
            'tanggal_awal'                      => $tanggal_awal,
            'tanggal_akhir'                    => $tanggal_akhir
        );

        $this->M_diskon->diskon_update($id,'diskon', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Data Berhasil!</div>');
        redirect(base_url("backend/admin/diskon"));
    }

    public function delete($id)
    {
        $this->M_diskon->diskon_delete('diskon', $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil!</div>');
        redirect(base_url("backend/admin/diskon"));
    }
}
?>