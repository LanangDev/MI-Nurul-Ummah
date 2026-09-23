<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kontak_model', 'kontak');
    }

    public function index()
    {
        $data['judul']  = 'Kontak Sekolah - MI Nurul Ummah';
        $data['kontak'] = $this->kontak->get_kontak();

        $this->template->load('kepala_sekolah/view', 'kepala_sekolah/kontak', $data);
    }

    public function simpan()
    {
        $kontak_lama = $this->kontak->get_kontak();

        $data = [
            'nama_sekolah'    => $this->input->post('nama_sekolah', TRUE),
            'alamat'          => $this->input->post('alamat', TRUE),
            'telepon'         => $this->input->post('telepon', TRUE),
            'email'           => $this->input->post('email', TRUE),
            'website'         => $this->input->post('website', TRUE),
            'facebook'        => $this->input->post('facebook', TRUE),
            'instagram'       => $this->input->post('instagram', TRUE),
            'whatsapp'        => $this->input->post('whatsapp', TRUE),
            'jam_operasional' => $this->input->post('jam_operasional', TRUE),
            'youtube'         => $this->input->post('youtube', TRUE),
            'tiktok'          => $this->input->post('tiktok', TRUE),
        ];

        if ($kontak_lama) {
            $this->kontak->update($kontak_lama->id_kontak, $data);
        } else {
            $this->kontak->insert($data);
        }

        $this->session->set_flashdata('success', 'Data kontak berhasil diperbarui!');
        redirect('Kepala_Sekolah/kontak');
    }
}