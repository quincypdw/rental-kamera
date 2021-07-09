<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_pendapatan extends MY_Controller
{

	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->cekAdmin();
		$this->userlogin = $this->GetUserData();
		$this->load->model('M_transaksi');
		$this->load->library('pdf');
	}

	public function index()
	{
		$tahun = date('Y');
		$data['find_date'] = NULL;
		$data['chart_data'] = $this->M_transaksi->DataChart($tahun);
		$data['laporan'] = $this->M_transaksi->transaksi_getAll1();
		$this->load->view('backend/admin/laporan/v_laporan_pendapatan.php', $data);
	}

	public function pdf()
	{
		$data = array(
			'laporan' => $this->M_transaksi->transaksi_getAll1()
		);
		$this->load->view('backend/admin/laporan/v_laporan_pdf', $data);
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Laporan Keuangan PAL.pdf";
		$this->pdf->load_view('backend/admin/laporan/v_laporan_pdf.php', $data);
	}

	public function detail($transaksi_id)
	{
		$data['detail'] = $this->M_transaksi->transaksi_getAll2($transaksi_id);
		$this->load->view('backend/admin/laporan/v_detail_laporan.php', $data);
	}

	public function search()
	{
		$tahun = date('Y');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$data['chart_data'] = $this->M_transaksi->DataChart($tahun);
		$data['find_date'] = $this->M_transaksi->rangeDate($start_date, $end_date);
		$this->load->view('backend/admin/laporan/v_laporan_pendapatan.php', $data);
	}

    public function exportexcel($start_date, $end_date)
	{
		$model = $this->M_transaksi->data_excel($start_date, $end_date);
		$data['excel'] = $model;
		$this->load->view('backend/admin/laporan/v_laporan_pendapatan_excel.php', $data);
	}
}
