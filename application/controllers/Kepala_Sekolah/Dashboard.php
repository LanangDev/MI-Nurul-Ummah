<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->model('Profil_sekolah_model', 'profil');
    }

    public function index()
    {
        $data['judul']              = 'Dashboard - MI Nurul Ummah';
        $data['profil']             = $this->profil->get_profil();
        $data['total_galeri']       = $this->dashboard->get_total_galeri();
        $data['total_pengumuman']   = $this->dashboard->get_total_pengumuman();
        $data['pengumuman_terbaru'] = $this->dashboard->get_pengumuman_terbaru(4);
        $data['galeri_terbaru']     = $this->dashboard->get_galeri_terbaru(4);

        $this->template->load('kepala_sekolah/view', 'kepala_sekolah/dashboard', $data);
    }
}