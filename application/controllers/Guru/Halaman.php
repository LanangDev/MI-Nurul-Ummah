<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Halaman_model', 'Halaman');
        $this->load->model('Profil_sekolah_model', 'profil');
    }

    public function index()
    {
        $data['judul']              = 'Halama Guru - MI Nurul Ummah';
        $data['profil']             = $this->profil->get_profil();
        $data['total_galeri']       = $this->Halaman->get_total_galeri();
        $data['total_pengumuman']   = $this->Halaman->get_total_pengumuman();
        $data['pengumuman_terbaru'] = $this->Halaman->get_pengumuman_terbaru(4);
        $data['galeri_terbaru']     = $this->Halaman->get_galeri_terbaru(4);

        $this->template->load('guru/view', 'guru/halaman', $data);
    }
}