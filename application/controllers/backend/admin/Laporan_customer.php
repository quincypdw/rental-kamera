<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_customer extends MY_Controller
{

	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->cekAdmin();
		$this->userlogin = $this->GetUserData();
		$this->load->model('M_customer');
		$this->load->library('pdf');
	}

	public function index()
	{
		$tahun = date('Y');
		$data['jumlah'] = NULL;
		$data['chart_data'] = $this->M_customer->DataChart($tahun);
		$this->load->view('backend/admin/laporan/v_laporan_customer.php', $data);
	}

	public function search()
	{
		$tahun = date('Y');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$data['chart_data'] = $this->M_customer->DataChart($tahun);
		$data['jumlah'] = $this->M_customer->hitung_jumlah_customer($start_date, $end_date);
		$this->load->view('backend/admin/laporan/v_laporan_customer.php', $data);
		//var_dump($data); die;
	}

	public function pdf()
	{
		$data = array(
			'laporan' => $this->M_customer->get_data_pdf()
		);
		$this->load->view('backend/admin/laporan/v_laporan_customer', $data);
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Laporan Customer PAL.pdf";
		$this->pdf->load_view('backend/admin/laporan/v_laporan_customer_pdf.php', $data);
	}

	public function detail($tanggal)
	{
		$data['detail'] = $this->M_customer->get_data_by_id($tanggal);
		$this->load->view('backend/admin/laporan/v_detail_laporan_customer.php', $data);
	}
}
