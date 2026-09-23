<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Guru extends CI_Controller {
	public function __construct(){
    parent::__construct();	
    
		if ($this->session->userdata('role') == NULL) {
            redirect(base_url('auth'));
            return;
        }

        if(($this->session->userdata('role'))!='Kepala_Sekolah'){
        redirect(base_url('auth'));
        return;
        }
    }
   
	public function index()
	{
            $this->db->from('guru');
            $this->db->order_by('id_guru', 'ASC');
            $guru = $this->db->get()->result_array();
            $data = [
                'judul' => 'Halaman guru - MI Nurul Ummah',
                'guru'  => $guru
            ];
		$this->template->load('kepala_sekolah/view', 'kepala_sekolah/data_guru', $data);
	}
  public function simpan() {

    // Cek apakah ada file yang diupload
    if(!empty($_FILES['foto']['name'])) {
        $namafoto = date('YmdHis') . '.jpg';

        $config['upload_path']   = './upload/foto_guru/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5000; // KB
        $config['file_name']     = $namafoto;
        $config['overwrite']     = true;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('notifikasi',
                '<div class="alert alert-danger mb-0" role="alert">Gagal upload foto: '.$error.'</div>');
            redirect("Kepala_Sekolah/data_guru");
            return;
        }
    } else {
        // Saat tambah data baru dan tidak upload foto, biarkan kosong/default
        $namafoto = null;
    }

    // Cek nip sudah ada atau belum
    $this->db->where('nip', $this->input->post('nip'));
    $cek = $this->db->get('guru')->row();

    if($cek == NULL) {
        $data = array(
            "nama_guru"            => $this->input->post('nama_guru'),
            "nip"                  => $this->input->post('nip'),
            "nuptk"                => $this->input->post('nuptk'),
            "jenis_kelamin"        => $this->input->post('jenis_kelamin'),
            "jabatan"              => $this->input->post('jabatan'),
            "mata_pelajaran"       => $this->input->post('mata_pelajaran'),
            "pendidikan_terakhir"  => $this->input->post('pendidikan_terakhir'),
            "status_kepegawaian"   => $this->input->post('status_kepegawaian'),
            "status"               => $this->input->post('status'),
        );

        if($namafoto !== null) {
            $data['foto'] = $namafoto;
        }

        $this->db->insert('guru', $data);
        $this->session->set_flashdata('notifikasi',
            '<div class="alert alert-success mb-0" role="alert">Berhasil disimpan</div>');
        redirect("Kepala_Sekolah/data_guru");

    } else {
        $this->session->set_flashdata('notifikasi',
            '<div class="alert alert-danger mb-0" role="alert">nip sudah digunakan</div>');
        redirect("Kepala_Sekolah/data_guru");
    }
}

public function update(){
    $id_guru = $this->input->post('id_guru');

    // Ambil data guru lama dulu — ini kuncinya
    $this->db->where('id_guru', $id_guru);
    $guru_lama = $this->db->get('guru')->row();

    $namafoto = $guru_lama ? $guru_lama->foto : null; // default: pakai foto lama

    // Cek apakah ada file BARU yang diupload
    if(!empty($_FILES['foto']['name'])) {
        $namafoto = date('YmdHis') . '.jpg';

        $config['upload_path']   = './upload/foto_guru/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 5000; // KB
        $config['file_name']     = $namafoto;
        $config['overwrite']     = true;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('notifikasi',
                '<div class="alert alert-danger mb-0" role="alert">Gagal upload foto: '.$error.'</div>');
            redirect("Kepala_Sekolah/data_guru");
            return;
        }
    }
    // kalau tidak ada file baru, $namafoto tetap = foto lama dari DB

    $data = array(
        "nama_guru"            => $this->input->post('nama_guru'),
        "nip"                  => $this->input->post('nip'),
        "nuptk"                => $this->input->post('nuptk'),
        "jenis_kelamin"        => $this->input->post('jenis_kelamin'),
        "jabatan"              => $this->input->post('jabatan'),
        "mata_pelajaran"       => $this->input->post('mata_pelajaran'),
        "pendidikan_terakhir"  => $this->input->post('pendidikan_terakhir'),
        "status_kepegawaian"   => $this->input->post('status_kepegawaian'),
        "status"               => $this->input->post('status'),
        "foto"                 => $namafoto,
    );

    $this->db->where('id_guru', $id_guru);
    $this->db->update('guru', $data);
    $this->session->set_flashdata('notifikasi',
        '<div class="alert alert-success mb-0" role="alert">Berhasil diupdate</div>');
    redirect("Kepala_Sekolah/data_guru");
}
   public function hapus($id){
		var_dump($id);
		$this->db->where('id_guru',$id);
		$this->db->delete('guru');
		$this->session->set_flashdata('notifikasi','
		<div class="alert alert-danger mb-0" role="alert">Berhasil dihapus</div>');
		redirect("Kepala_Sekolah/data_guru");
	}
}
