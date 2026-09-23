<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_model', 'pengumuman');
    }

    public function index()
    {
        $data['judul']      = 'Pengumuman - MI Nurul Ummah';
        $data['pengumuman'] = $this->pengumuman->get_all();

        $this->template->load('kepala_sekolah/view', 'kepala_sekolah/pengumuman', $data);
    }

    public function simpan()
    {
        $foto_name = '';

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './upload/pengumuman/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 5000 * 5000; // 3MB
            $config['file_name']     = 'pengumuman_' . time();

            if (!is_dir('./upload/pengumuman/')) {
                mkdir('./upload/pengumuman/', 0777, TRUE);
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $foto_name   = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Kepala_Sekolah/pengumuman');
            }
        }

        $data = [
            'judul'   => $this->input->post('judul', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE),
            'isi'     => $this->input->post('isi', TRUE),
            'foto'    => $foto_name
        ];

        $this->pengumuman->insert($data);
        $this->session->set_flashdata('success', 'Pengumuman berhasil ditambahkan!');
        redirect('Kepala_Sekolah/pengumuman');
    }

    public function update($id)
    {
        $pengumuman_lama = $this->pengumuman->get_by_id($id);
        if (!$pengumuman_lama) {
            $this->session->set_flashdata('error', 'Data pengumuman tidak ditemukan!');
            redirect('Kepala_Sekolah/pengumuman');
        }

        $data = [
            'judul'   => $this->input->post('judul', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE),
            'isi'     => $this->input->post('isi', TRUE)
        ];

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './upload/pengumuman/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 5000 * 5000;
            $config['file_name']     = 'pengumuman_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                if (!empty($pengumuman_lama->foto) && file_exists('./upload/pengumuman/' . $pengumuman_lama->foto)) {
                    unlink('./upload/pengumuman/' . $pengumuman_lama->foto);
                }

                $upload_data  = $this->upload->data();
                $data['foto'] = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Kepala_Sekolah/pengumuman');
            }
        }

        $this->pengumuman->update($id, $data);
        $this->session->set_flashdata('success', 'Pengumuman berhasil diperbarui!');
        redirect('Kepala_Sekolah/pengumuman');
    }

    public function hapus($id)
    {
        $pengumuman = $this->pengumuman->get_by_id($id);
        if ($pengumuman) {
            if (!empty($pengumuman->foto) && file_exists('./upload/pengumuman/' . $pengumuman->foto)) {
                unlink('./upload/pengumuman/' . $pengumuman->foto);
            }
            $this->pengumuman->delete($id);
            $this->session->set_flashdata('success', 'Pengumuman berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
        }

        redirect('Kepala_Sekolah/pengumuman');
    }
}