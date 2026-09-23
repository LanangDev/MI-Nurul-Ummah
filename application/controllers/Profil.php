<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // GET /Profil  -> halaman lengkap profil sekolah
    public function index()
    {
        $profil = $this->db->get('profil_sekolah')->row();
        $kontak = $this->db->get('kontak')->row();
        $jumlah_guru = $this->db->count_all('guru');

        $data = [
            'profil'      => $profil,
            'kontak'      => $kontak,
            'jumlah_guru' => $jumlah_guru,
        ];
        $this->load->view('profil_sekolah', $data);
    }
}