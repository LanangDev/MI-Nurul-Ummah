<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends CI_Controller {

    private $upload_path = './upload/prestasi/';

    public function __construct(){
        parent::__construct();

        if ($this->session->userdata('role') == NULL) {
            redirect(base_url('auth'));
            return;
        }

        if (($this->session->userdata('role')) != 'Kepala_Sekolah') {
            redirect(base_url('auth'));
            return;
        }

        // Pastikan folder upload ada
        if (!is_dir($this->upload_path)) {
            mkdir($this->upload_path, 0755, true);
        }
    }

    public function index()
    {
        $this->db->select('p.*, k.nama_kategori');
        $this->db->from('prestasi p');
        $this->db->join('kategori_prestasi k', 'k.id_kategori = p.id_kategori', 'left');
        $this->db->order_by('p.id_prestasi', 'DESC');
        $prestasi = $this->db->get()->result_array();

        $kategori = $this->db->get('kategori_prestasi')->result_array();

        $data = [
            'judul'    => 'Halaman Prestasi - MI Nurul Ummah',
            'prestasi' => $prestasi,
            'kategori' => $kategori
        ];
        $this->Template->load('kepala_sekolah/view', 'kepala_sekolah/prestasi', $data);
    }

    public function simpan()
    {
        $foto = null;

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = $this->upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 5000 * 5000; // KB
            $config['file_name']     = 'prestasi_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $uploadData = $this->upload->data();
                $foto = $uploadData['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                redirect('Kepala_Sekolah/prestasi');
                return;
            }
        }

        $data = array(
            "judul_prestasi" => $this->input->post('judul_prestasi'),
            "id_kategori"    => $this->input->post('id_kategori'),
            "tingkat"        => $this->input->post('tingkat'),
            "tahun"          => $this->input->post('tahun'),
            "penyelenggara"  => $this->input->post('penyelenggara'),
            "penerima"       => $this->input->post('penerima'),
            "deskripsi"      => $this->input->post('deskripsi'),
            "foto"           => $foto,
        );

        $this->db->insert('prestasi', $data);
        $this->session->set_flashdata('success', 'Prestasi berhasil disimpan');
        redirect('Kepala_Sekolah/prestasi');
    }

    public function update($id_prestasi)
    {
        $foto_lama = $this->input->post('foto_lama');
        $foto = $foto_lama;

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = $this->upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 5000 * 5000;
            $config['file_name']     = 'prestasi_' . time();

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $uploadData = $this->upload->data();
                $foto = $uploadData['file_name'];

                // Hapus foto lama kalau ada
                if (!empty($foto_lama) && file_exists($this->upload_path . $foto_lama)) {
                    unlink($this->upload_path . $foto_lama);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                redirect('Kepala_Sekolah/prestasi');
                return;
            }
        }

        $data = array(
            "judul_prestasi" => $this->input->post('judul_prestasi'),
            "id_kategori"    => $this->input->post('id_kategori'),
            "tingkat"        => $this->input->post('tingkat'),
            "tahun"          => $this->input->post('tahun'),
            "penyelenggara"  => $this->input->post('penyelenggara'),
            "penerima"       => $this->input->post('penerima'),
            "deskripsi"      => $this->input->post('deskripsi'),
            "foto"           => $foto,
        );

        $this->db->where('id_prestasi', $id_prestasi);
        $this->db->update('prestasi', $data);

        $this->session->set_flashdata('success', 'Prestasi berhasil diupdate');
        redirect('Kepala_Sekolah/prestasi');
    }

    public function hapus($id)
    {
        $row = $this->db->where('id_prestasi', $id)->get('prestasi')->row();

        if ($row && !empty($row->foto) && file_exists($this->upload_path . $row->foto)) {
            unlink($this->upload_path . $row->foto);
        }

        $this->db->where('id_prestasi', $id);
        $this->db->delete('prestasi');

        $this->session->set_flashdata('success', 'Prestasi berhasil dihapus');
        redirect('Kepala_Sekolah/prestasi');
    }
}