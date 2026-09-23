<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakurikuler extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function index()
    {
        $ekstrakurikuler = $this->db->get('ekstrakurikuler')->result();

        $data = [
            'judul' => 'Daftar ekstrakurikuler',
            'ekstrakurikuler'  => $ekstrakurikuler,
        ];
        $this->load->view('ekstrakurikuler', $data); 
    }


    public function detail($id = null)
    {
        if (empty($id)) {
            show_404();
        }

        $ekstrakurikuler = $this->db->where('id_ekstrakurikuler', $id)->get('ekstrakurikuler')->row();

        if (!$ekstrakurikuler) {
            show_404();
        }

        $ekstrakurikuler_lain = $this->db
            ->where('id_ekstrakurikuler !=', $id)
            ->order_by('id_ekstrakurikuler', 'DESC')
            ->limit(4)
            ->get('ekstrakurikuler')
            ->result();

        $data = [
            'judul'     => $ekstrakurikuler->nama_ekstrakurikuler ?? 'Detail ekstrakurikuler',
            'ekstrakurikuler'      => $ekstrakurikuler,
            'ekstrakurikuler_lain' => $ekstrakurikuler_lain,
        ];
        $this->load->view('ekstrakurikuler_detail', $data);
    }
}