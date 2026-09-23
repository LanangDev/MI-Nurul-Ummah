<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_sekolah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_sekolah_model', 'profil');
    }

    public function index()
    {
        $data['judul']  = 'Profil Sekolah - MI Nurul Ummah';
        $data['profil'] = $this->profil->get_profil();

        $this->Template->load('kepala_sekolah/view', 'kepala_sekolah/profil_sekolah', $data);
    }

    public function simpan()
    {
        $profil_lama = $this->profil->get_profil();

        $data = [
            'nama_sekolah'    => $this->input->post('nama_sekolah', TRUE),
            'npsn'            => $this->input->post('npsn', TRUE),
            'nsm'             => $this->input->post('nsm', TRUE),
            'status_sekolah'  => $this->input->post('status_sekolah', TRUE),
            'jenjang'         => $this->input->post('jenjang', TRUE),
            'akreditasi'      => $this->input->post('akreditasi', TRUE),
            'tahun_berdiri'   => $this->input->post('tahun_berdiri', TRUE),
            'alamat'          => $this->input->post('alamat', TRUE),
            'desa'            => $this->input->post('desa', TRUE),
            'kecamatan'       => $this->input->post('kecamatan', TRUE),
            'kabupaten'       => $this->input->post('kabupaten', TRUE),
            'provinsi'        => $this->input->post('provinsi', TRUE),
            'kode_pos'        => $this->input->post('kode_pos', TRUE),
            'telepon'         => $this->input->post('telepon', TRUE),
            'email'           => $this->input->post('email', TRUE),
            'website'         => $this->input->post('website', TRUE),
            'sejarah'         => $this->input->post('sejarah', TRUE),
            'visi'            => $this->input->post('visi', TRUE),
            'misi'            => $this->input->post('misi', TRUE),
            'sambutan_kepala' => $this->input->post('sambutan_kepala', TRUE)
        ];

        // Buat folder jika belum ada
        if (!is_dir('./upload/profil/')) {
            mkdir('./upload/profil/', 0777, TRUE);
        }

        // Proses Unggah Gambar (Logo, Foto Sekolah, Foto Kepala)
        $gambar_fields = ['logo', 'foto_sekolah', 'foto_kepala'];
        $this->load->library('upload');

        foreach ($gambar_fields as $field) {
            if (!empty($_FILES[$field]['name'])) {
                $config['upload_path']   = './upload/profil/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size']      = 5000 * 5000; // 3MB
                $config['file_name']     = $field . '_' . time();

                $this->upload->initialize($config);

                if ($this->upload->do_upload($field)) {
                    // Hapus gambar lama
                    if ($profil_lama && !empty($profil_lama->$field) && file_exists('./upload/profil/' . $profil_lama->$field)) {
                        unlink('./upload/profil/' . $profil_lama->$field);
                    }
                    $upload_data  = $this->upload->data();
                    $data[$field] = $upload_data['file_name'];
                }
            }
        }

        if ($profil_lama) {
            $this->profil->update($profil_lama->id_profil, $data);
        } else {
            $this->profil->insert($data);
        }

        $this->session->set_flashdata('success', 'Profil sekolah berhasil diperbarui!');
        redirect('Kepala_Sekolah/profil_sekolah');
    }
}