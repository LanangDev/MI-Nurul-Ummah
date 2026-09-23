<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model {

    public function get_all()
    {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by('id_pengumuman', 'DESC');
        return $this->db->get('pengumuman')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('pengumuman', ['id_pengumuman' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('pengumuman', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_pengumuman', $id);
        return $this->db->update('pengumuman', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_pengumuman', $id);
        return $this->db->delete('pengumuman');
    }
}