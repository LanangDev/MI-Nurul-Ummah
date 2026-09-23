<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Galeri_model', 'galeri');
    }

    public function index()
    {
        $data['judul']  = 'Galeri Kegiatan - MI Nurul Ummah';
        $data['galeri'] = $this->galeri->get_all();

        $this->Template->load('kepala_sekolah/view', 'kepala_sekolah/galeri', $data);
    }

    public function simpan()
    {
        $foto_name = '';

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './upload/galeri/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 5000 * 5000; // 3MB
            $config['file_name']     = 'galeri_' . time();

            if (!is_dir('./upload/galeri/')) {
                mkdir('./upload/galeri/', 0777, TRUE);
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $foto_name   = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Kepala_Sekolah/galeri');
            }
        }

        $data = [
            'judul_kegiatan' => $this->input->post('judul_kegiatan', TRUE),
            'tanggal'        => $this->input->post('tanggal', TRUE),
            'lokasi'         => $this->input->post('lokasi', TRUE),
            'deskripsi'      => $this->input->post('deskripsi', TRUE),
            'foto'           => $foto_name
        ];

        $this->galeri->insert($data);
        $this->session->set_flashdata('success', 'Foto kegiatan berhasil ditambahkan ke galeri!');
        redirect('Kepala_Sekolah/galeri');
    }

    public function update($id)
    {
        $galeri_lama = $this->galeri->get_by_id($id);
        if (!$galeri_lama) {
            $this->session->set_flashdata('error', 'Data galeri tidak ditemukan!');
            redirect('Kepala_Sekolah/galeri');
        }

        $data = [
            'judul_kegiatan' => $this->input->post('judul_kegiatan', TRUE),
            'tanggal'        => $this->input->post('tanggal', TRUE),
            'lokasi'         => $this->input->post('lokasi', TRUE),
            'deskripsi'      => $this->input->post('deskripsi', TRUE)
        ];

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './upload/galeri/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 3072;
            $config['file_name']     = 'galeri_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                if (!empty($galeri_lama->foto) && file_exists('./upload/galeri/' . $galeri_lama->foto)) {
                    unlink('./upload/galeri/' . $galeri_lama->foto);
                }

                $upload_data  = $this->upload->data();
                $data['foto'] = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Kepala_Sekolah/galeri');
            }
        }

        $this->galeri->update($id, $data);
        $this->session->set_flashdata('success', 'Data galeri berhasil diperbarui!');
        redirect('Kepala_Sekolah/galeri');
    }

    public function hapus($id)
    {
        $galeri = $this->galeri->get_by_id($id);
        if ($galeri) {
            if (!empty($galeri->foto) && file_exists('./upload/galeri/' . $galeri->foto)) {
                unlink('./upload/galeri/' . $galeri->foto);
            }
            $this->galeri->delete($id);
            $this->session->set_flashdata('success', 'Foto galeri berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
        }

        redirect('Kepala_Sekolah/galeri');
    }
}