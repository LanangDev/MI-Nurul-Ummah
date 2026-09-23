<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Pengumuman_model', 'pengumuman');
    }
    public function index()
    {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by('id_pengumuman', 'DESC');
        $berita_list = $this->db->get('pengumuman')->result();

        $kontak = $this->db->get('kontak')->row();

        $data = [
            'kontak'      => $kontak,
            'berita_list' => $berita_list,
        ];

        $this->load->view('berita', $data);
    }
    public function detail($id = null)
    {
        if (empty($id)) {
            show_404();
        }

        $kontak = $this->db->get('kontak')->row();
        $berita = $this->pengumuman->get_by_id($id);

        if (!$berita) {
            show_404();
        }

        // Beberapa berita lain sebagai rekomendasi di sidebar
        $berita_lain = $this->db
            ->where('id_pengumuman !=', $id)
            ->order_by('tanggal', 'DESC')
            ->order_by('id_pengumuman', 'DESC')
            ->limit(4)
            ->get('pengumuman')
            ->result();

        $data = [
            'kontak'      => $kontak,
            'berita'      => $berita,
            'berita_lain' => $berita_lain,
        ];

        $this->load->view('berita_detail', $data);
    }
}