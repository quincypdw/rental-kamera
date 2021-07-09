<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends MY_Controller {

	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->userlogin = $this->GetUserData();
	}

	public function index()
	{
		if($this->session->userdata('masuk')==true)
		{
			$this->load->view('backend/overview');
		}
		else
		{
			redirect(base_url('authuser'));

		}
	}
}