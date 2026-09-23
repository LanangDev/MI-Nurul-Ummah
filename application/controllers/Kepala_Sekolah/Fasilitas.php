<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fasilitas_model');
        $this->load->helper(['url', 'form']);
        $this->load->library(['upload', 'session']);

        // Proteksi: hanya user login yang boleh akses
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    // Tampilkan daftar fasilitas
    public function index()
    {
        $data['judul']     = 'Data Fasilitas - MI Nurul Ummah';
        $data['fasilitas'] = $this->Fasilitas_model->get_all();
        $this->Template->load('kepala_sekolah/view','kepala_sekolah/fasilitas', $data);
    }

    // Simpan data fasilitas baru
    public function simpan()
    {
        $this->form_validation->set_rules('nama_fasilitas', 'Nama Fasilitas', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('Kepala_Sekolah/fasilitas');
            return;
        }

        $foto = '';

        // Upload foto jika ada
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './upload/foto_fasilitas/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 5000; // 2MB
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $foto = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Kepala_Sekolah/fasilitas');
                return;
            }
        }

        $data = [
            'nama_fasilitas' => $this->input->post('nama_fasilitas'),
            'jumlah'         => $this->input->post('jumlah'),
            'kondisi'        => $this->input->post('kondisi'),
            'keterangan'     => $this->input->post('keterangan'),
            'foto'           => $foto,
        ];

        $this->Fasilitas_model->insert($data);
        $this->session->set_flashdata('success', 'Data fasilitas berhasil ditambahkan.');
        redirect('Kepala_Sekolah/fasilitas');
    }

    // Update data fasilitas
    public function update($id_fasilitas)
    {
        $fasilitas_lama = $this->Fasilitas_model->get_by_id($id_fasilitas);

        if (!$fasilitas_lama) {
            show_404();
            return;
        }

        $foto = $fasilitas_lama->foto;

        // Jika ada foto baru diupload, ganti foto lama
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './upload/foto_fasilitas/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 5000 * 5000;
            $config['encrypt_name']  = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                // Hapus foto lama kalau ada
                if ($foto && file_exists('./upload/foto_fasilitas/' . $foto)) {
                    unlink('./upload/foto_fasilitas/' . $foto);
                }
                $upload_data = $this->upload->data();
                $foto = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Kepala_Sekolah/fasilitas');
                return;
            }
        }

        $data = [
            'nama_fasilitas' => $this->input->post('nama_fasilitas'),
            'jumlah'         => $this->input->post('jumlah'),
            'kondisi'        => $this->input->post('kondisi'),
            'keterangan'     => $this->input->post('keterangan'),
            'foto'           => $foto,
        ];

        $this->Fasilitas_model->update($id_fasilitas, $data);
        $this->session->set_flashdata('success', 'Data fasilitas berhasil diperbarui.');
        redirect('Kepala_Sekolah/fasilitas');
    }

    // Hapus data fasilitas
    public function hapus($id_fasilitas)
    {
        $fasilitas = $this->Fasilitas_model->get_by_id($id_fasilitas);

        if (!$fasilitas) {
            show_404();
            return;
        }

        // Hapus file foto kalau ada
        if ($fasilitas->foto && file_exists('./upload/foto_fasilitas/' . $fasilitas->foto)) {
            unlink('./upload/foto_fasilitas/' . $fasilitas->foto);
        }

        $this->Fasilitas_model->delete($id_fasilitas);
        $this->session->set_flashdata('success', 'Data fasilitas berhasil dihapus.');
        redirect('Kepala_Sekolah/fasilitas');
    }
}