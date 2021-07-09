<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function loadKamerabyid($id)
    {
        $kamera = $this->product_model->get_kamerabyid($id);
        var_dump($kamera);

    }

    public function loadFasilitastambahanbyid($id)
    {
        $fastam = $this->product_model->get_fasilitastambahanbyid($id);
        var_dump($fastam);

    }

    public function loadKamerabykategori($kategori)
    {
        $kamera = $this->product_model->get_kamerabykategori($kategori);

    }

    public function loadFasilitastambahanbykategori($kategori)
    {
        $fastam = $this->product_model->get_fasilitastambahanbykategori($kategori);
        var_dump($fastam);

    }

    public function kameradetails($id)
    {
        $data['kameraid']= $this->product_model->get_kamerabyid($id);
        $this->load->view('frontend/v_productdetails',$data);
        

    }

    public function productdetails($id)
    {
        $data['fastamid']= $this->product_model->get_fasilitastambahanbyid($id);
        $this->load->view('frontend/v_productdetails2',$data);
        

    }
}