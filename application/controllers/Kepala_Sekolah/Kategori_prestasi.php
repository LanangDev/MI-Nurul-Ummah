<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_prestasi extends CI_Controller {
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
    }

    public function index()
    {
        $this->db->from('kategori_prestasi');
        $this->db->order_by('id_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $data = [
            'judul'    => 'Halaman Kategori - MI Nurul Ummah',
            'kategori' => $kategori
        ];
        $this->template->load('kepala_sekolah/view', 'kepala_sekolah/kategori_prestasi', $data);
    }

    public function simpan() {
        $this->db->where('nama_kategori', $this->input->post('nama_kategori'));
        $cek = $this->db->get('kategori_prestasi')->row();

        if ($cek == NULL) {
            $data = array(
                "nama_kategori" => $this->input->post('nama_kategori'),
            );

            $this->db->insert('kategori_prestasi', $data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect("Kepala_Sekolah/kategori_prestasi");

        } else {
            $this->session->set_flashdata('error', 'Kategori sudah ada');
            redirect("Kepala_Sekolah/kategori_prestasi");
        }
    }

    public function hapus($id){
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori_prestasi');
        $this->session->set_flashdata('success', 'Berhasil dihapus');
        redirect("Kepala_Sekolah/kategori_prestasi");
    }

    public function update($id_kategori){
        $data = array(
            "nama_kategori" => $this->input->post('nama_kategori'),
        );
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori_prestasi', $data);
        $this->session->set_flashdata('success', 'Berhasil diupdate');
        redirect("Kepala_Sekolah/kategori_prestasi");
    }
}