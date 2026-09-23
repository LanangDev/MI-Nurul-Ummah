<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_ppdb extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        // Data profil sekolah & kontak (sama seperti landing page)
        $kontak = $this->db->get('kontak')->row();

        // SEMUA baris PPDB (id_ppdb, foto, judul, tahun_ajaran, nomor_kordinator,
        // nama_kordinator, status) -> dipakai untuk grid kartu pengumuman
        $ppdb_list = $this->db->order_by('id_ppdb', 'DESC')->get('ppdb')->result_array();

        // Baris PPDB terbaru saja -> dipakai untuk status card & bagian koordinator
        $ppdb = $this->db->order_by('id_ppdb', 'DESC')->limit(1)->get('ppdb')->row();

        $data = [
            'kontak'    => $kontak,
            'ppdb'      => $ppdb,       // objek tunggal (baris terbaru)
            'ppdb_list' => $ppdb_list,  // array semua baris (kartu pengumuman)
        ];

        $this->load->view('halaman_ppdb', $data);
    }
}