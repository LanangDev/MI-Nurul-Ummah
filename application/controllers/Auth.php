<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
      $this->load->model('Log_aktivitas_model');
    }

    public function index()
    {
        if ($this->session->userdata('id_user')) {
            redirect('dashboard');
            return;
        }

        $data = [
            'judul' => 'Halaman Login - MI Nurul Ummah'
        ];
        $this->load->view('login', $data);
    }

    public function login()
    {
        if (!$this->input->post()) {
            redirect('auth');
            return;
        }

        $email    = $this->input->post('email');
        $password = $this->input->post('password'); // plain text, akan dicocokkan dengan hash

        $this->db->where('email', $email);
        $sekolah = $this->db->get('user')->row();

        if ($sekolah == NULL) {
            $this->session->set_flashdata('notifikasi',
                '<div class="alert alert-danger mb-0" role="alert">Email Tidak Ada!</div>');
            redirect('auth');
            return;
        }

        if (password_verify($password, $sekolah->password)) {

            $this->session->sess_regenerate(true);

            $data = [
                'id_user' => $sekolah->id_user,
                'username'    => $sekolah->username,
                'email'   => $sekolah->email,
                'role'    => $sekolah->role,
                'foto'    => $sekolah->foto,
                
            ];
            $this->session->set_userdata($data);
            $this->Log_aktivitas_model->catatOnline($sekolah->id_user);

            switch ($sekolah->role) {
            case 'Kepala_Sekolah':
                redirect('Kepala_Sekolah/Dashboard');
                break;
            case 'Guru':
                redirect('Guru/Halaman');
                break;
            default:
                redirect('auth');
            }
            return;


        } else {
            $this->session->set_flashdata('notifikasi',
                '<div class="alert alert-warning mb-0" role="alert">Password Salah!</div>'
            );
            redirect('auth');
            return;
        }
    }

    public function logout()
    {
        $id_user = $this->session->userdata('id_user');
        
        if ($id_user) {
            $this->Log_aktivitas_model->catatOffline($id_user);
        }

        $this->session->sess_destroy();
        redirect(base_url('Landing_page'));
    }

}