<?php
class M_pengunjung extends CI_Model{

	public function set_pengunjung($user_ip){
		$query=$this->db->query("INSERT INTO tbl_pengunjung (pengunjung_ip) VALUES ('$user_ip')");
		return $query;
	}

	public function statistik_pengujung(){
        $query = $this->db->query("SELECT DATE_FORMAT(pengunjung_tanggal,'%d') AS tgl,
				COUNT(pengunjung_ip) AS jumlah
				FROM tbl_pengunjung WHERE MONTH(pengunjung_tanggal)=MONTH(CURDATE())
				GROUP BY DATE(pengunjung_tanggal)");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function simpan_user_agent($user_ip,$agent){
    	$query=$this->db->query("INSERT INTO tbl_pengunjung (pengunjung_ip,pengunjung_perangkat) VALUES('$user_ip','$agent')");
    	return $query;
    }

    public function cek_ip($user_ip){
    	$query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_ip='$user_ip' AND DATE(pengunjung_tanggal)=CURDATE()");
    	return $query;
    }

}
