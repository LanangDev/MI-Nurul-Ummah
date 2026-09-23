<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function index()
    {
        $prestasi = $this->db->get('prestasi')->result();

        $data = [
            'judul' => 'Daftar prestasi',
            'prestasi'  => $prestasi,
        ];
        $this->load->view('prestasi', $data); 
    }


    public function detail($id = null)
    {
        if (empty($id)) {
            show_404();
        }
        $prestasi = $this->db->where('id_prestasi', $id)->get('prestasi')->row();
        $kategori = $this->db->where('id_kategori', $prestasi->id_kategori)->get('kategori_prestasi')->row();

        if (!$prestasi) {
            show_404();
        }

        $prestasi_lain = $this->db
            ->where('id_prestasi !=', $id)
            ->order_by('id_prestasi', 'DESC')
            ->limit(4)
            ->get('prestasi')
            ->result();
        

        $data = [
            'judul'         => $prestasi->judul_prestasi ?? 'Detail prestasi',
            'kategori'      => $kategori,
            'prestasi'      => $prestasi,
            'prestasi_lain' => $prestasi_lain,
        ];
        $this->load->view('prestasi_detail', $data);
    }
}