<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function cekLogin()
	{
		if(!$this->session->userdata('masuk'))
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Harus Login Terlebih Dahulu!</div>');
			redirect(base_url('authuser'));
		}
	}

	public function GetUserData()
	{
		return $this->session->userdata('masuk');
	}

	public function cekAdmin()
	{
		$kedudukan = $this->session->userdata('masuk')[0]->level_id;
		if($kedudukan == 2)
		{
		}else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda bukan Owner!</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
