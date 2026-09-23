<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_sekolah_model extends CI_Model {

    public function get_profil()
    {
        return $this->db->get('profil_sekolah')->row();
    }

    public function insert($data)
    {
        return $this->db->insert('profil_sekolah', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_profil', $id);
        return $this->db->update('profil_sekolah', $data);
    }
}