<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas_tambahan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->userlogin = $this->GetUserData();
        $this->load->model('M_fasilitas_tambahan');
        $this->load->helper('url', 'form');
    }
    private $userlogin;

    public function index()
    {
        $data['fasilitas_tambahan'] = $this->M_fasilitas_tambahan->fasilitas_tambahan_getAll();
        $this->load->view('backend/admin/fasilitas_tambahan/v_fasilitas_tambahan', $data);
    }

    public function add()
    {
        $nama = strip_tags($this->input->post('i_nama'));
        $tipe = strip_tags($this->input->post('i_tipe'));
        $kategori = strip_tags($this->input->post('i_kategori'));
        $merk = strip_tags($this->input->post('i_merk'));
        $stok = strip_tags($this->input->post('i_stok'));
        $harga_produk = strip_tags($this->input->post('i_harga_produk'));
        $deskripsi = strip_tags($this->input->post('i_deskripsi'));
        $foto_produk = $_FILES['i_gambar'];

        if ($foto_produk = '') {
        } else {
            $config['upload_path'] = './assets/image-produk';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1028;
            // $config['max_width'] = 1500;
            // $config['max_height'] = 1500;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('i_gambar')) {
                echo "Upload Gagal!";
                die();
            } else {
                $foto_produk = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_produk'                => $nama,
            'tipe'                        => $tipe,
            'kategori'                    => $kategori,
            'merk'                      => $merk,
            'stok'                        => $stok,
            'harga_produk'                => $harga_produk,
            'deskripsi'                    => $deskripsi,
            'gambar_fasilitas_tambahan'                => $foto_produk
        );

        $this->M_fasilitas_tambahan->add_fasilitas_tambahan('fasilitas_tambahan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Input Berhasil!</div>');
        redirect(base_url("backend/admin/fasilitas_tambahan"));
    }


    public function edit($id)
    {
        $data['fasilitas_tambahan']		= $this->M_fasilitas_tambahan->fasilitas_tambahan_getById($id);

        $nama = strip_tags($this->input->post('i_nama'));
        $tipe = strip_tags($this->input->post('i_tipe'));
        $kategori = strip_tags($this->input->post('i_kategori'));
        $merk = strip_tags($this->input->post('i_merk'));
        $stok = strip_tags($this->input->post('i_stok'));
        $harga_produk = strip_tags($this->input->post('i_harga_produk'));
        $deskripsi = strip_tags($this->input->post('i_deskripsi'));

        if($_FILES['i_gambar']!="")
        {
            $config['upload_path'] = './assets/image-produk';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['overwrite'] = true;
            $config['file_name'] = 'produk_'.$id;
            $config['max_size'] = 1028;
            // $config['max_width'] = 1500;
            // $config['max_height'] = 1500;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('i_gambar')) {
                $error = array('error' => $this->upload->display_errors());
                $foto_produk=$this->input->post('old');
            } else {
                $foto_produk = $this->upload->data('file_name');
            }
        }
        else{
            $foto_produk=$this->input->post('old');
        }

        $data = array(
            'nama_produk'                => $nama,
            'tipe'                        => $tipe,
            'kategori'                    => $kategori,
            'merk'                      => $merk,
            'stok'                        => $stok,
            'harga_produk'                => $harga_produk,
            'deskripsi'                    => $deskripsi,
            'gambar_fasilitas_tambahan'                => $foto_produk
        );

        $this->M_fasilitas_tambahan->fasilitas_tambahan_update($id,'fasilitas_tambahan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Berhasil!</div>');
        redirect(base_url("backend/admin/fasilitas_tambahan"));
    }

    public function delete($id)
    {
        $this->M_fasilitas_tambahan->fasilitas_tambahan_delete('fasilitas_tambahan', $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil!</div>');
        redirect(base_url("backend/admin/fasilitas_tambahan"));
    }
}
