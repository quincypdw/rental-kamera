<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_produk extends MY_Controller
{

    private $userlogin;
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->cekAdmin();
        $this->userlogin = $this->GetUserData();
        $this->load->model('M_laporan');
    }

    public function index()
    {
        $tahun = date('Y');
        $data['data_kamera'] = NULL;
        $data['chart_data'] = $this->M_laporan->DataChart($tahun);
        $this->load->view('backend/admin/laporan/v_laporan_produk.php', $data);
    }

    public function search()
    {
        $tahun = date('Y');
        $bulan = $this->input->post("bulan");
        $data['chart_data'] = $this->M_laporan->DataChart($tahun);
        $data['data_kamera'] = $this->M_laporan->kamera_laris($bulan);
        // $data['data_produk'] = $this->M_laporan->produk_laris($bulan);
        $this->load->view('backend/admin/laporan/v_laporan_produk.php', $data);
    }

    public function pdf()
	{
        $tahun = date('Y');
		$data = array(
			'laporan' => $this->M_laporan->data_pdf($tahun)
		);
		$this->load->view('backend/admin/laporan/v_laporan_produk_pdf', $data);
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Laporan Produk Tersewa PAL.pdf";
		$this->pdf->load_view('backend/admin/laporan/v_laporan_produk_pdf.php', $data);
	}
}
