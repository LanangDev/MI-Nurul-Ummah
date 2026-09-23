<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_Aktivitas extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Log_aktivitas_model');

        if ($this->session->userdata('role') == NULL) {
            redirect(base_url('auth'));
            return;
        }

        if (($this->session->userdata('role')) != 'Kepala_Sekolah') {
            redirect(base_url('auth'));
            return;
        }
    }

    public function index()
    {
        $status = $this->input->get('status');
        $cari   = $this->input->get('cari');

        // Menampilkan SEMUA user beserta status Online/Offline terkini
        $log = $this->Log_aktivitas_model->statusSemuaUser($status, $cari);

        $data = [
            'judul'        => 'Log Aktivitas User - MI Nurul Ummah',
            'log'          => $log,
            'status_aktif' => $status ?: 'Semua',
            'cari'         => $cari,
        ];

        $this->Template->load('kepala_sekolah/view', 'kepala_sekolah/log_aktivitas', $data);
    }
}