<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {

    public function get_kontak()
    {
        return $this->db->get('kontak')->row();
    }

    public function insert($data)
    {
        return $this->db->insert('kontak', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_kontak', $id);
        return $this->db->update('kontak', $data);
    }
}