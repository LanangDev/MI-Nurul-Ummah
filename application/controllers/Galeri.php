<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $galeri = $this->db->order_by('tanggal', 'DESC')->get('galeri')->result();

        $data = [
            'judul'  => 'Daftar Galeri Kegiatan',
            'galeri' => $galeri,
        ];
        $this->load->view('galeri', $data);
    }

    public function detail($id = null)
    {
        if (empty($id)) {
            show_404();
        }

        $galeri = $this->db->where('id_galeri', $id)->get('galeri')->row();

        if (!$galeri) {
            show_404();
        }

        $galeri_lain = $this->db
            ->where('id_galeri !=', $id)
            ->order_by('tanggal', 'DESC')
            ->limit(4)
            ->get('galeri')
            ->result();

        $data = [
            'judul'       => $galeri->judul_kegiatan ?? 'Detail Kegiatan',
            'galeri'      => $galeri,
            'galeri_lain' => $galeri_lain,
        ];
        $this->load->view('galeri_detail', $data);
    }
}