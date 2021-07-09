<?php
class Promo_model extends CI_Model
{
    public function discount_getPromo($kode_promo)
    {
        $query = $this->db->query("SELECT * FROM diskon WHERE kode_promo=$kode_promo");
        return $query;
    }

    public function discount_getbyId($id)
    {
        $query = $this->db->query("SELECT kodepromo FROM diskon WHERE diskon_id=$id");
        return $query;
    }



}