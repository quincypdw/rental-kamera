<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('account_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('customer_id') != null) {
            $data['customer'] = $this->db->get_where('customer',['customer_id' => $this->session->userdata('customer_id')])->row_array();
            $this->load->view('frontend/account/v_account',$data);
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Harap Daftar/Login Dahulu!!</div>');
            redirect(base_url('frontend/auth'));
            
        }
    }

    public function edit($id)
    {
        // $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[customer.email]', ['is_unique' => 'Email Sudah Terdaftar!']);
        //$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|min_length[12]|numeric', ['numeric' => '%s Hanya Angka!', 'min_length' => '%s Tidak Sesuai!']);
        // $this->form_validation->set_rules('username', 'Username', 'min_length[5]|is_unique[customer.username]', ['is_unique' => '%s Sudah Terdaftar!', 'min_length' => '%s Terlalu Pendek!']);
        //$this->form_validation->set_rules('password1', 'Password', 'min_length[5]|matches[password2]', ['matches' => '%s Tidak sama!', 'min_length' => '%s Terlalu Pendek!']);
        $id = $this->session->userdata('customer_id');
        if ($this->session->userdata('customer_id') == null) {
            redirect(base_url('frontend/auth'));
        } else
        if ($this->form_validation->run() == false)
		{
            $data['customer'] = $this->db->get_where('customer',['customer_id' => $this->session->userdata('customer_id')])->row_array();
			$this->load->view('frontend/account/v_edit_account',$data);
		}
		else{
            //Input Array
            $data1 = array(
                'nama'     => $this->input->post('nama',TRUE),
                'email'     => $this->input->post('email',TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
                'username' => $this->input->post('username',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'no_hp' => $this->input->post('no_hp',TRUE),
                'password1' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
            );

            $result = $this->account_model->customer_update($id, $data1);
            var_dump($result); exit();
            if($result>0){
                $session_data = array(
                    'nama' => $data1['nama'],
                    'email'     => $data1['email'],
                    'jenis_kelamin' => $data1['jenis_kelamin'],
                    'username' => $data1['username'],
                    'alamat' => $data1['alamat'],
                    'no_hp' => $data1['no_hp'],
                );
                $this->session->set_userdata($session_data);
                var_dump($session_data); exit();
                echo '<script language=JavaScript>alert("Update Berhasil");</script>';
            redirect(base_url('frontend/account'));
            } else{
                echo '<script language=JavaScript>alert("Gagal, Silahkan coba lagi!"); onclick=location.href = document.referrer</script>';
            redirect(base_url('frontend/account'));
            }
            
        }
    }
}
