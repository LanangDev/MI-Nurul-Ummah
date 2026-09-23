<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_model extends CI_Model
{
    protected $table = 'fasilitas';

    public function __construct()
    {
        parent::__construct();
    }

    // Ambil semua data fasilitas
    public function get_all()
    {
        return $this->db->order_by('id_fasilitas', 'DESC')
                         ->get($this->table)
                         ->result();
    }

    // Ambil satu data fasilitas berdasarkan id
    public function get_by_id($id_fasilitas)
    {
        return $this->db->get_where($this->table, ['id_fasilitas' => $id_fasilitas])->row();
    }

    // Tambah data fasilitas
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Update data fasilitas
    public function update($id_fasilitas, $data)
    {
        $this->db->where('id_fasilitas', $id_fasilitas);
        return $this->db->update($this->table, $data);
    }

    // Hapus data fasilitas
    public function delete($id_fasilitas)
    {
        return $this->db->delete($this->table, ['id_fasilitas' => $id_fasilitas]);
    }
}