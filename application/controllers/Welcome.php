<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('carts');
        $this->load->model('product_model');
		$this->load->model('m_pengunjung');
		$this->load->library('user_agent');
    }

	public function index()
	{
		$user_ip=$this->input->ip_address();;
		if ($this->agent->is_browser()){
		    $agent = $this->agent->browser();
		}elseif ($this->agent->is_robot()){
		    $agent = $this->agent->robot();
		}elseif ($this->agent->is_mobile()){
		    $agent = $this->agent->mobile();
		}else{
			$agent='Other';
		}
		//$cek_ip=$this->m_pengunjung->cek_ip($user_ip);
		$this->m_pengunjung->simpan_user_agent($user_ip,$agent);
		// $kategori='""';
		$data['kamera']=$this->product_model->kamera_getAll();
		$data['dslr']=$this->product_model-> get_kameradslr();
		$data['mirrorless']=$this->product_model-> get_kameramirrorless();
		$data['actioncam']=$this->product_model-> get_kameraactioncam();
		$data['fastam']=$this->product_model->fasilitastambahan_getAll();
		$data['lensa']=$this->product_model->get_lensa();
		$data['flash']=$this->product_model->get_flash();
		$data['tripod']=$this->product_model->get_tripod();
		$data['memori']=$this->product_model->get_memori();
		$data['baterai']=$this->product_model->get_baterai();
		// $data['kategorik']=$this->product_model->get_kamerabykategori($kategori);
		// $data['kategorif']=$this->product_model->get_fasilitastambahanbykategori($kategori);
		$this->load->view('frontend/v_home',$data);
		$this->load->view('frontend/modal_quickview',$data);
	}
}
