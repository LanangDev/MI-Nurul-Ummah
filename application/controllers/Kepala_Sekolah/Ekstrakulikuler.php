<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakulikuler extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Pastikan model di-load
        $this->load->model('Ekstrakurikuler_model', 'ekskel');
    }

    public function index()
    {
        $data['judul'] = 'Data Ekstrakurikuler - MI Nurul Ummah';
        $data['ekstra'] = $this->ekskel->get_all();

        // Menggunakan template parser / template library yang memuat $contents
        $this->Template->load('kepala_sekolah/view', 'kepala_sekolah/ekstrakulikuler', $data);
    }

    public function simpan()
    {
        $nama_ekstrakurikuler = $this->input->post('nama_ekstrakurikuler', TRUE);
        $pembina              = $this->input->post('pembina', TRUE);
        $hari                 = $this->input->post('hari', TRUE);
        $waktu                = $this->input->post('waktu', TRUE);
        $tempat               = $this->input->post('tempat', TRUE);
        $keterangan           = $this->input->post('keterangan', TRUE);
        $status               = $this->input->post('status', TRUE);

        $foto_name = '';

        // Konfigurasi Upload Foto
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './upload/foto_ekstra/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 5000 * 5000; // 5MB
            $config['file_name']     = 'ekstra_' . time();

            // Buat folder jika belum ada
            if (!is_dir('./upload/foto_ekstra/')) {
                mkdir('./upload/foto_ekstra/', 0777, TRUE);
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $foto_name   = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Kepala_Sekolah/ekstrakulikuler');
            }
        }

        $data = [
            'nama_ekstrakurikuler' => $nama_ekstrakurikuler,
            'pembina'              => $pembina,
            'hari'                 => $hari,
            'waktu'                => $waktu,
            'tempat'               => $tempat,
            'keterangan'           => $keterangan,
            'foto'                 => $foto_name,
            'status'               => $status
        ];

        $this->ekskel->insert($data);
        $this->session->set_flashdata('success', 'Data ekstrakurikuler berhasil ditambahkan!');
        redirect('Kepala_Sekolah/ekstrakulikuler');
    }

    public function update($id)
    {
        $ekstra = $this->ekskel->get_by_id($id);
        if (!$ekstra) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('Kepala_Sekolah/ekstrakulikuler');
        }

        $data = [
            'nama_ekstrakurikuler' => $this->input->post('nama_ekstrakurikuler', TRUE),
            'pembina'              => $this->input->post('pembina', TRUE),
            'hari'                 => $this->input->post('hari', TRUE),
            'waktu'                => $this->input->post('waktu', TRUE),
            'tempat'               => $this->input->post('tempat', TRUE),
            'keterangan'           => $this->input->post('keterangan', TRUE),
            'status'               => $this->input->post('status', TRUE)
        ];

        // Jika upload foto baru
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './upload/foto_ekstra/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 5000 * 5000;
            $config['file_name']     = 'ekstra_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                // Hapus foto lama jika ada
                if (!empty($ekstra->foto) && file_exists('./upload/foto_ekstra/' . $ekstra->foto)) {
                    unlink('./upload/foto_ekstra/' . $ekstra->foto);
                }

                $upload_data = $this->upload->data();
                $data['foto'] = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Kepala_Sekolah/ekstrakulikuler');
            }
        }

        $this->ekskel->update($id, $data);
        $this->session->set_flashdata('success', 'Data ekstrakurikuler berhasil diperbarui!');
        redirect('Kepala_Sekolah/ekstrakulikuler');
    }

    public function hapus($id)
    {
        $ekstra = $this->ekskel->get_by_id($id);
        if ($ekstra) {
            // Hapus file foto dari server
            if (!empty($ekstra->foto) && file_exists('./upload/foto_ekstra/' . $ekstra->foto)) {
                unlink('./upload/foto_ekstra/' . $ekstra->foto);
            }
            $this->ekskel->delete($id);
            $this->session->set_flashdata('success', 'Data ekstrakurikuler berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
        }

        redirect('Kepala_Sekolah/ekstrakulikuler');
    }
}