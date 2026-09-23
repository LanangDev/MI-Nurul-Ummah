<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakurikuler_model extends CI_Model {

    public function get_all()
    {
        $this->db->order_by('id_ekstrakurikuler', 'DESC');
        return $this->db->get('ekstrakurikuler')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('ekstrakurikuler', ['id_ekstrakurikuler' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('ekstrakurikuler', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_ekstrakurikuler', $id);
        return $this->db->update('ekstrakurikuler', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_ekstrakurikuler', $id);
        return $this->db->delete('ekstrakurikuler');
    }
}