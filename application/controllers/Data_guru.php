<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_guru extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // GET /Data_guru  -> full list of teachers
    public function index()
    {
        $guru = $this->db->get('guru')->result();

        $data = [
            'judul' => 'Daftar Guru',
            'guru'  => $guru,
        ];
        $this->load->view('guru_list', $data); // a new list view, separate from guru_detail
    }

    // GET /Data_guru/detail/5 -> single teacher detail
    public function detail($id = null)
    {
        if (empty($id)) {
            show_404();
        }

        $guru = $this->db->where('id_guru', $id)->get('guru')->row();

        if (!$guru) {
            show_404();
        }

        $guru_lain = $this->db
            ->where('id_guru !=', $id)
            ->order_by('id_guru', 'DESC')
            ->limit(4)
            ->get('guru')
            ->result();

        $data = [
            'judul'     => $guru->nama_guru ?? 'Detail Guru',
            'guru'      => $guru,
            'guru_lain' => $guru_lain,
        ];
        $this->load->view('guru_detail', $data);
    }
}