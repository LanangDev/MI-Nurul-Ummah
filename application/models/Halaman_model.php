<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_model extends CI_Model {

    public function get_total_galeri()
    {
        return $this->db->count_all('galeri');
    }

    public function get_total_pengumuman()
    {
        return $this->db->count_all('pengumuman');
    }

    public function get_pengumuman_terbaru($limit = 5)
    {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by('id_pengumuman', 'DESC');
        return $this->db->get('pengumuman', $limit)->result();
    }

    public function get_galeri_terbaru($limit = 4)
    {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->order_by('id_galeri', 'DESC');
        return $this->db->get('galeri', $limit)->result();
    }
}