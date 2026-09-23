<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'upload']);
        $this->load->helper(['url', 'form']);

        // Proteksi: Cek apakah user sudah login
        if (!$this->session->userdata('id_user')) {
            redirect('auth/login'); // Sesuaikan rute login Anda
        }
    }

    public function index()
    {
        $id_user = $this->session->userdata('id_user');

        // Ambil data spesifik user yang sedang login dari database
        $user = $this->db->get_where('user', ['id_user' => $id_user])->row_array();

        $data = [
            'judul' => 'Halaman Profil - MI Nurul Ummah',
            'user'  => $user
        ];

        $this->load->view('guru/profil', $data);
    }

    public function update()
    {
        $id_user  = $this->session->userdata('id_user');
        $email    = $this->input->post('email');
        $username = $this->input->post('username');
        $pass     = $this->input->post('password');

        $data = [
            'email'     => $email,
            'username'  => $username,
        ];

        // Jika password diisi
        if (!empty($pass)) {
            $data['password'] = password_hash($pass, PASSWORD_DEFAULT);
        }

        // Upload foto baru (jika ada)
        if (!empty($_FILES['foto']['name'])) {

            $config['upload_path']   = FCPATH . 'upload/foto_user/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 5000 * 5000;
            $config['file_name']     = 'user_' . time();

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $upload = $this->upload->data();
                $data['foto'] = $upload['file_name'];

                // Update session foto
                $this->session->set_userdata('foto', $upload['file_name']);
            }
        }

        // Update ke database via model
       $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);

        // Update session
        $this->session->set_userdata('email', $email);
        $this->session->set_userdata('username', $username);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Profil berhasil diperbarui!</div>');
        redirect('profil');
    }
}