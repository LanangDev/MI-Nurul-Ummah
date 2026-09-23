<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PPDB extends CI_Controller {
	public function __construct(){
    parent::__construct();	
    
		if ($this->session->userdata('role') == NULL) {
            redirect(base_url('auth'));
            return;
        }

        if(($this->session->userdata('role'))!='Guru'){
        redirect(base_url('auth'));
        return;
        }
    }
   
	public function index()
	{
            $this->db->from('ppdb');
            $this->db->order_by('id_ppdb', 'ASC');
            $ppdb = $this->db->get()->result_array();
            $data = [
                'judul' => 'Halaman PPDB - MI Nurul Ummah',
                'ppdb'  => $ppdb
            ];
		$this->template->load('guru/view', 'guru/ppdb', $data);
	}
   public function simpan() {
    // Nama file
    $namafoto = date('YmdHis') . '.jpg';

    // Konfigurasi upload
    $config['upload_path'] = './upload/foto_ppdb/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size'] = 5000; // KB = 500 KB
    $config['file_name'] = $namafoto;
    $config['overwrite'] = true;

    $this->load->library('upload', $config);

    // Cek apakah ada file yang diupload
    if(!empty($_FILES['foto']['name'])) {

        if(!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('notifikasi', 
                '<div class="alert alert-danger mb-0" role="alert">Gagal upload foto: '.$error.'</div>');
            redirect("Guru/ppdb");
        }

    } else {
        $data['foto'] = $ppdb->foto;
    }
    
    $data = array(
            "foto"                  => $namafoto,
            "judul"                 => $this->input->post('judul'),
            "tahun_ajaran"          => $this->input->post('tahun_ajaran'),
            "nomor_kordinator"      => $this->input->post('nomor_kordinator'),
            "nama_kordinator"       => $this->input->post('nama_kordinator'),
            "status"                => $this->input->post('status')
        );

        $this->db->insert('ppdb', $data);
        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-success mb-0" role="alert">Berhasil disimpan</div>');
        redirect("Guru/ppdb");
    }

   public function hapus($id){
		var_dump($id);
		$this->db->where('id_ppdb',$id);
		$this->db->delete('ppdb');
		$this->session->set_flashdata('notifikasi','
		<div class="alert alert-danger mb-0" role="alert">Berhasil dihapus</div>');
		redirect("Guru/ppdb");
	}

   public function update($id_ppdb)
{
    // Ambil data lama berdasarkan ID
    $ppdb = $this->db
        ->where('id_ppdb', $id_ppdb)
        ->get('ppdb')
        ->row();

    if (!$ppdb) {
        $this->session->set_flashdata(
            'notifikasi',
            '<div class="alert alert-danger mb-0" role="alert">
                Data PPDB tidak ditemukan
            </div>'
        );

        redirect('Guru/ppdb');
        return;
    }

    // Data yang akan diupdate
    $data = array(
        'judul'             => $this->input->post('judul', true),
        'tahun_ajaran'      => $this->input->post('tahun_ajaran', true),
        'nomor_kordinator'  => $this->input->post('nomor_kordinator', true),
        'nama_kordinator'   => $this->input->post('nama_kordinator', true),
        'status'            => $this->input->post('status', true)
    );

    // Jika user memilih foto baru
    if (!empty($_FILES['foto']['name'])) {

        $namafoto = date('YmdHis') . '.jpg';

        $config['upload_path']   = './upload/foto_ppdb/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5000;
        $config['file_name']     = $namafoto;
        $config['overwrite']     = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {

            $error = $this->upload->display_errors();

            $this->session->set_flashdata(
                'notifikasi',
                '<div class="alert alert-danger mb-0" role="alert">
                    Gagal upload foto: '.$error.'
                </div>'
            );

            redirect('Guru/ppdb');
            return;
        }

        // Pakai foto baru
        $data['foto'] = $namafoto;
    }

    // Update berdasarkan ID
    $this->db->where('id_ppdb', $id_ppdb);
    $this->db->update('ppdb', $data);

    $this->session->set_flashdata(
        'notifikasi',
        '<div class="alert alert-success mb-0" role="alert">
            Berhasil diupdate
        </div>'
    );

    redirect('Guru/ppdb');
}
}
