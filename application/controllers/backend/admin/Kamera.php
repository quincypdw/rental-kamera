<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamera extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->userlogin = $this->GetUserData();
        $this->load->model('M_kamera');
    }
    private $userlogin;

    public function index()
    {
        $data['kamera'] = $this->M_kamera->kamera_getAll();
        $this->load->view('backend/admin/kamera/v_kamera', $data);
    }

    public function add()
    {
        $nama = strip_tags($this->input->post('i_nama'));
        $tipe = strip_tags($this->input->post('i_tipe'));
        $merk = strip_tags($this->input->post('i_merk'));
        $megapixel = strip_tags($this->input->post('i_megapixel'));
        $stok = strip_tags($this->input->post('i_stok'));
        $harga_kamera = strip_tags($this->input->post('i_harga_kamera'));
        $deskripsi = strip_tags($this->input->post('i_deskripsi'));
        $foto_kamera = $_FILES['i_gambar'];

        if ($foto_kamera = '') {
        } else {
            $config['upload_path'] = './assets/image-kamera';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1028;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('i_gambar')) {
                echo "Upload Gagal!";
                die();
            } else {
                $foto_kamera = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_kamera'                => $nama,
            'tipe'                        => $tipe,
            'merk'                      => $merk,
            'megapixel'                    => $megapixel,
            'stok'                        => $stok,
            'harga_kamera'                => $harga_kamera,
            'deskripsi'                    => $deskripsi,
            'gambar_kamera'                => $foto_kamera
        );

        $this->M_kamera->add_kamera('kamera', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Input Data Berhasil!</div>');
        redirect(base_url("backend/admin/kamera"));
    }


    public function edit($id)
    {
        $data['kamera']        = $this->M_kamera->kamera_getById($id);

        $nama = strip_tags($this->input->post('i_nama'));
        $tipe = strip_tags($this->input->post('i_tipe'));
        $merk = strip_tags($this->input->post('i_merk'));
        $megapixel = strip_tags($this->input->post('i_megapixel'));
        $stok = strip_tags($this->input->post('i_stok'));
        $harga_kamera = strip_tags($this->input->post('i_harga_kamera'));
        $deskripsi = strip_tags($this->input->post('i_deskripsi'));
        

        if($_FILES['i_gambar']!="")
        {
            $config['upload_path'] = './assets/image-kamera';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['overwrite'] = true;
            $config['file_name'] = 'kamera_' . $id;
            $config['max_size'] = 1028;
            // $config['max_width'] = 1500;
            // $config['max_height'] = 1500;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('i_gambar')) {
                $error = array('error' => $this->upload->display_errors());
                $foto_kamera=$this->input->post('old');
            } else {
                $foto_kamera = $this->upload->data('file_name');
            }
        }
        else{
            $foto_kamera=$this->input->post('old');
        }

        $data = array(
            'nama_kamera'                => $nama,
            'tipe'                        => $tipe,
            'merk'                      => $merk,
            'megapixel'                    => $megapixel,
            'stok'                        => $stok,
            'harga_kamera'                => $harga_kamera,
            'deskripsi'                    => $deskripsi,
            'gambar_kamera'                => $foto_kamera
        );

        $this->M_kamera->kamera_update($id, 'kamera', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Berhasil!</div>');
        redirect(base_url("backend/admin/kamera"));
    }

    public function delete($id)
    {
        $this->M_kamera->kamera_delete('kamera', $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil!</div>');
        redirect(base_url("backend/admin/kamera"));
    }
}
