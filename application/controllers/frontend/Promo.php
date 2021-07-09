<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('promo_model');
    }

    public function index()
    {
        $this->load->view('frontend/v_promo');
    }

    public function get_discount()
    {
        

    }

    public function get_kodepromo()
    {
        $id=1;
        $kodepromo=$this->promo_model->discount_getbyId($id);

        if($kodepromo!=null){
            return $kodepromo;
        } else {
            echo "kode promo error";
        }

    }
}