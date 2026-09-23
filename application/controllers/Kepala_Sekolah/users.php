<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
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
            $this->db->from('user');
            $this->db->order_by('id_user', 'ASC');
            $user = $this->db->get()->result_array();
            $data = [
                'judul' => 'Halaman User - MI Nurul Ummah',
                'user'  => $user
            ];
		$this->template->load('kepala_sekolah/view', 'kepala_sekolah/users', $data);
	}
   public function simpan() {
    // Nama file
    $namafoto = date('YmdHis') . '.jpg';

    // Konfigurasi upload
    $config['upload_path'] = './upload/foto_user/';
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
            redirect("Kepala_Sekolah/users");
        }

    } else {
        // Jika tidak ada foto, simpan default
           $data['foto'] = $user->foto; // Gunakan foto lama
    }
    // Cek email sudah ada atau belum
    $this->db->where('email', $this->input->post('email'));
    $cek = $this->db->get('user')->row(); 

    if($cek == NULL) { 
        $data = array(
            "username"      => $this->input->post('username'),    
            "email"         => $this->input->post('email'),
            "foto"          => $namafoto,
            "password"      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            "role"          => $this->input->post('role'),
        );

        $this->db->insert('user', $data);
        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-success mb-0" role="alert">Berhasil disimpan</div>');
        redirect("Kepala_Sekolah/users");

    } else {
        $this->session->set_flashdata('notifikasi', 
            '<div class="alert alert-danger mb-0" role="alert">email sudah digunakan</div>');
        redirect("Kepala_Sekolah/users");
    }
}

   public function hapus($id){
		var_dump($id);
		$this->db->where('id_user',$id);
		$this->db->delete('user');
		$this->session->set_flashdata('notifikasi','
		<div class="alert alert-danger mb-0" role="alert">Berhasil dihapus</div>');
		redirect("Kepala_Sekolah/users");
	}

   public function update(){    
        // Nama file
    $namafoto = date('YmdHis') . '.jpg';

    // Konfigurasi upload
    $config['upload_path'] = './upload/foto_user/';
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
            redirect("Kepala_Sekolah/users");
        }

    } else {
        // Jika tidak ada foto, simpan default
           $data['foto'] = $user->foto; // Gunakan foto lama
    }
    
    $id_user = $this->input->post('id_user');
    
		$data = array(
			"username"  => $this->input->post('username'),
            "foto"      => $namafoto,
            "role"      => $this->input->post('role'),
		);
		$this->db->where('id_user',$this->input->post('id_user'));
		$this->db->update('user',$data);
		$this->session->set_flashdata('notifikasi','
		<div class="alert alert-success mb-0" role="alert">Berhasil diupdate</div>');
		redirect("Kepala_Sekolah/users");
	}
}