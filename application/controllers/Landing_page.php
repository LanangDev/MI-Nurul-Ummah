<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        // Profil Sekolah (data tunggal)
        $profil = $this->db->get('profil_sekolah')->row();

        $ppdb = $this->db->get('ppdb')->row();
        // Kontak (data tunggal)
        $kontak = $this->db->get('kontak')->row();
        // Statistik ringkas
        $jumlah_guru     = $this->db->where('status', 'Aktif')->count_all_results('guru');
        $jumlah_prestasi = $this->db->count_all_results('prestasi');
        $jumlah_ekskul   = $this->db->where('status', 'Aktif')->count_all_results('ekstrakurikuler');
        // Ekstrakurikuler aktif
        $ekstrakurikuler = $this->db->where('status', 'Aktif')
                                     ->get('ekstrakurikuler')
                                     ->result_array();
        // Prestasi terbaru + nama kategori
        $this->db->select('p.*, k.nama_kategori');
        $this->db->from('prestasi p');
        $this->db->join('kategori_prestasi k', 'k.id_kategori = p.id_kategori', 'left');
        $this->db->order_by('p.tahun', 'DESC');
        $this->db->limit(4);
        $prestasi = $this->db->get()->result_array();
        // Guru aktif
        $guru = $this->db->where('status', 'Aktif')
                          ->limit(4)
                          ->get('guru')
                          ->result_array();
        // Fasilitas
        $fasilitas = $this->db->limit(4)->get('fasilitas')->result_array();
        // Galeri terbaru
        $this->db->order_by('tanggal', 'DESC');
        $galeri = $this->db->limit(6)->get('galeri')->result_array();
        // Pengumuman / Berita terbaru
        $this->db->order_by('tanggal', 'DESC');
        $pengumuman = $this->db->limit(3)->get('pengumuman')->result_array();
        $data = [
            'profil'          => $profil,
            'kontak'          => $kontak,
            'jumlah_guru'     => $jumlah_guru,
            'jumlah_prestasi' => $jumlah_prestasi,
            'jumlah_ekskul'   => $jumlah_ekskul,
            'ekstrakurikuler' => $ekstrakurikuler,
            'prestasi'        => $prestasi,
            'guru'            => $guru,
            'fasilitas'       => $fasilitas,
            'galeri'          => $galeri,
            'pengumuman'      => $pengumuman,
            'ppdb'            => $this->db->get_where('ppdb', ['status' => 'Buka'])->row(),
        ];
        $this->load->view('landing_page', $data);
    }
}