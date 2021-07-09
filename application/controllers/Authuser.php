<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authuser extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_login');
		$this->load->model('M_register');
		//$this->userlogin = $this->GetUserData();
	}

	private $encryption_key = '123456789';
	//private $userlogin;

	public function index()
	{
		if ($this->session->userdata('masuk')) {
			redirect(base_url('backend/overview'));
		} else {
			//$this->load->view('admin/templates/auth_header');
			$this->load->view('backend/admin/authentication/v_authuser2');
			//$this->load->view('admin/templates/auth_footer');
		}
	}

	public function login()
	{
		$username = $this->db->escape_str($this->input->post('username'));
		$password = $this->db->escape_str($this->input->post('password'));
		$pass = hash('sha512', $password . $this->encryption_key);
		$result = $this->M_login->login($username, $pass);
		if ($result) {
			$this->session->set_userdata('masuk', $result);
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Anda Berhasil Login";
		} else {
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Anda Gagal Login";
		}
		echo json_encode($output);
	}

	function register()
	{	
		$foto_user = $_FILES['i_gambar'];
		if($foto_user='')
        {

        }else
        {
            $config['upload_path'] = './assets/image-user';
            $config['allowed_types'] = 'jpg|png';
			$config['overwrite'] = true;
            $config['max_size'] = 1028;
            $config['max_width'] = 1500;
            $config['max_height'] = 1500;

            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('i_gambar'))
            {
				var_dump($foto_user); EXIT;
                echo "Upload Gagal!"; die();
            }else
            {
                $foto_user=$this->upload->data('file_name');
            }
        }
		$data = [
			'name' => htmlspecialchars($this->input->post('name', true)),
			'username' => htmlspecialchars($this->input->post('username', true)),
			'password' => hash('sha512', $this->input->post('password1') . $this->encryption_key),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
			'level_id' => htmlspecialchars($this->input->post('level_id', true)),
			'foto_user' => $foto_user,
			'date_created' => date("Y-m-d")
		];
		$result=$this->M_register->cek_register($data['username']);
		
		if ($result==true) 
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Registrasi Gagal! Username Ada Yang Sama!</div>');
		}
		else
		{
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Admin Telah Berhasil!!</div>');
		}
		redirect(base_url('backend/admin/admindata'));
	}

	function registration()
	{
		// $this->cekLogin();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|valid_email|is_unique[user.username]', ['is_unique' => 'Username Sudah Terdaftar!']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', ['matches' => 'Password Tidak Sama!', 'min_length' => 'Password Terlalu Pendek!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		$this->load->view('backend/admin/authentication/v_userregistration2.php');
	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout telah berhasil! Silahkan login!</div>');
		redirect(base_url('authuser'));
	}
}
