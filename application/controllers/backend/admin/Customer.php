<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->userlogin = $this->GetUserData();
        $this->load->model('M_customer');
	}

    private $encryption_key = '123456789';
	private $userlogin;

	public function index()
	{
        $data['customer'] = $this->M_customer->customer_getAll();
		$this->load->view('backend/admin/customer/v_customer', $data);
	}
    
    public function edit($id)
	{
		$data['customer']		= $this->M_customer->customer_getById($id);

		$nama = strip_tags($this->input->post('i_nama'));
		$username = strip_tags($this->input->post('i_username'));
        $password = password_hash($this->input->post('i_password'),PASSWORD_DEFAULT);
		$jenis_kelamin = strip_tags($this->input->post('i_jenis_kelamin'));

		$data = array(
			'nama'				        => $nama,
			'username'					=> $username,
            'password'                  => $password,
			'Jenis_kelamin'				=> $jenis_kelamin,
		);

			$this->M_customer->customer_update($id, 'customer', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Berhasil!</div>');
        redirect(base_url("backend/admin/customer"));
	}

    public function delete($id)
	{
		$this->M_customer->customer_delete('customer', $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil!</div>');
        redirect(base_url("backend/admin/customer"));

	}

}