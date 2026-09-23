<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $fasilitas = $this->db->get('fasilitas')->result();

        $data = [
            'judul'     => 'Daftar Fasilitas',
            'fasilitas' => $fasilitas,
        ];
        $this->load->view('fasilitas', $data);
    }

    public function detail($id = null)
    {
        if (empty($id)) {
            show_404();
        }

        $fasilitas = $this->db->where('id_fasilitas', $id)->get('fasilitas')->row();

        if (!$fasilitas) {
            show_404();
        }

        $fasilitas_lain = $this->db
            ->where('id_fasilitas !=', $id)
            ->order_by('id_fasilitas', 'DESC')
            ->limit(4)
            ->get('fasilitas')
            ->result();

        $data = [
            'judul'          => $fasilitas->nama_fasilitas ?? 'Detail Fasilitas',
            'fasilitas'      => $fasilitas,
            'fasilitas_lain' => $fasilitas_lain,
        ];
        $this->load->view('fasilitas_detail', $data);
    }
}