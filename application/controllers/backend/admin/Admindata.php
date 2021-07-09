<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindata extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->cekAdmin();
		$this->userlogin = $this->GetUserData();
        $this->load->model('M_admindata');
	}

    private $encryption_key = '123456789';
	private $userlogin;

	public function index()
	{
        $data['admin'] = $this->M_admindata->admin_getAll();
		$this->load->view('backend/admin/user/v_admindata', $data);
	}
    
    public function edit($id)
	{
		$data['admin']		= $this->M_admindata->admin_getById($id);

		$nama = strip_tags($this->input->post('i_name'));
		$username = strip_tags($this->input->post('i_username'));
		$email = strip_tags($this->input->post('i_email'));
        $password = hash('sha512', $this->input->post('i_password') . $this->encryption_key);
		$jenis_kelamin = strip_tags($this->input->post('i_jenis_kelamin'));
		$level = strip_tags($this->input->post('i_level'));
		if($_FILES['i_gambar']!="")
        {
            $config['upload_path'] = './assets/image-user';
            $config['allowed_types'] = 'jpg|png|jpeg';
			$config['overwrite'] = true;
			$config['file_name'] = 'user_'.$id;
            $config['max_size'] = 1028;
            // $config['max_width'] = 1500;
            // $config['max_height'] = 1500;

            $this->load->library('upload',$config);
			
			if (!$this->upload->do_upload('i_gambar')) {
                $error = array('error' => $this->upload->display_errors());
                $foto_user=$this->input->post('old');
            } else {
                $foto_user=$this->upload->data('file_name');
            }
        }
        else{
            $foto_user=$this->input->post('old');
        }

		$data = array(
			'name'				        => $nama,
			'username'					=> $username,
            'password'                  => $password,
			'email'					    => $email,
			'Jenis_kelamin'				=> $jenis_kelamin,
			'level_id'					=> $level,
			'foto_user'					=> $foto_user
		);

			$this->M_admindata->admin_update($id, 'user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Berhasil!</div>');
        redirect(base_url("backend/admin/admindata"));
	}

    public function delete($id)
	{
		$this->M_admindata->admin_delete('user', $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil!</div>');
        redirect(base_url("backend/admin/admindata"));

	}

}
