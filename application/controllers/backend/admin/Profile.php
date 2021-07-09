<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->userlogin = $this->GetUserData();
	}

	public function index()
	{
		$this->load->view('backend/admin/user/v_profile.php');
	}
}