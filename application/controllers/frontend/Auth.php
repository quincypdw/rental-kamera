<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        #Load model, helper dan library
        $this->load->library('form_validation');
    }

    public function index()
    {
		if($this->session->userdata('email')){
			redirect(base_url('welcome'));
		}
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Pesona Antariksa Lens';
            $this->load->view('frontend/template/auth_header',$data);
            $this->load->view('frontend/v_login');

        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $email = $this->input->post('email');
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		
		$customer = $this->db->get_where('customer',['email'=>$email])->row();

        if($customer){
        	if(password_verify($password,$customer->password)){
        		$data =[
        			'customer_id' => $customer->customer_id,
					'nik'=>$customer->nik,
        			'nama' => $customer->nama,
        			'tanggal_lahir' => $customer->tanggal_lahir,
					'no_hp' => $customer->no_hp,
                    'username' => $customer->username,
                    'email' => $customer->email,
        		];
        		$this->session->set_userdata($data);
        		redirect(base_url('welcome'));
        	}else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email/Password Salah!</div>');
        		redirect(base_url('frontend/auth'));
        	} 
        } else {
        	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Akun belum terdaftar! Silahkan daftar dahulu</div>');
        	redirect(base_url('frontend/auth'));
        }
    }

    public function registration()
	{
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('nik','NIK','required|trim|exact_length[16]|is_unique[customer.nik]|is_natural',array('required' => '%s Tidak Sesuai!','exact_length' => '%s Tidak Cocok!', 'is_unique' => '%s Sudah Terdaftar!','is_natural' => 'NIK Tidak Sesuai!'));
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[customer.email]',['is_unique' => 'Email Sudah Terdaftar!']);
		// $this->form_validation->set_rules('phone','Phone','required|trim');
		// $this->form_validation->set_rules('address','Address','required|trim');
		// $this->form_validation->set_rules('gender','Gender','required|trim');
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[customer.username]',array('is_unique' => '%s telah terdaftar sebelumnya!'));
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',['matches' => 'Password Tidak Sama!','min_length' => 'Password Terlalu Pendek!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		date_default_timezone_set('Asia/Jakarta');

		if ($this->form_validation->run() == false)
		{
			$data['title'] = 'Registration Account';
			$this->load->view('frontend/template/auth_header', $data);
			$this->load->view('frontend/v_registration');
			$this->load->view('frontend/template/auth_footer');
		}
		else{
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
				'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
				'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'date_created' => date("Y-m-d H:i:s")
			];

			$this->db->insert('customer', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Telah Berhasil! Silahkan Login!</div>');
			redirect(base_url('frontend/auth'));
		}
	}

    public function logout()
	{
        $this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout Telah Berhasil. Silahkan Login</div>');
		redirect(base_url('frontend/auth'));
	}
}