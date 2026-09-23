<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_aktivitas_model extends CI_Model {

    protected $table = 'log_aktivitas';

    public function __construct()
    {
        parent::__construct();
    }

    // ================= CATAT AKTIVITAS =================
    public function catat($id_user, $aktivitas)
    {
        $data = [
            'id_user'   => $id_user,
            'aktivitas' => $aktivitas,
            'waktu'     => date('Y-m-d H:i:s'),
        ];

        return $this->db->insert($this->table, $data);
    }

    public function catatOnline($id_user)
    {
        return $this->catat($id_user, 'Online');
    }

    public function catatOffline($id_user)
    {
        return $this->catat($id_user, 'Offline');
    }

    // ================= STATUS TERKINI SEMUA USER =================
    // Menampilkan SEMUA user (termasuk yang belum pernah login sama sekali)
    // beserta status Online/Offline terakhir mereka
   public function statusSemuaUser($filter_aktivitas = null, $cari = null)
{
    $this->db->select('
        u.id_user,
        u.username,
        u.role,
        COALESCE(log_terakhir.aktivitas, "Offline") AS aktivitas,
        log_terakhir.waktu
    ', false);

    $this->db->from('user u');

    $this->db->join(
        '(SELECT id_user, aktivitas, waktu
          FROM log_aktivitas
          WHERE id_log IN (SELECT MAX(id_log) FROM log_aktivitas GROUP BY id_user)
         ) AS log_terakhir',
        'log_terakhir.id_user = u.id_user',
        'left'
    );

    if ($filter_aktivitas && $filter_aktivitas != 'Semua') {
        if ($filter_aktivitas == 'Offline') {
            $this->db->group_start();
            $this->db->where('log_terakhir.aktivitas', 'Offline');
            $this->db->or_where('log_terakhir.aktivitas IS NULL', null, false);
            $this->db->group_end();
        } else {
            $this->db->where('log_terakhir.aktivitas', $filter_aktivitas);
        }
    }

    if ($cari) {
        $this->db->like('u.username', $cari);
    }

    $this->db->order_by('u.username', 'ASC');

    return $this->db->get()->result_array();
}

    // ================= RIWAYAT LOG LENGKAP (opsional, histori semua login/logout) =================
    public function getLog($filter_aktivitas = null, $cari = null)
    {
        $this->db->select('log_aktivitas.*, user.username, user.role');
        $this->db->from('log_aktivitas');
        $this->db->join('user', 'user.id_user = log_aktivitas.id_user', 'left');

        if ($filter_aktivitas && $filter_aktivitas != 'Semua') {
            $this->db->where('log_aktivitas.aktivitas', $filter_aktivitas);
        }

        if ($cari) {
            $this->db->like('user.username', $cari);
        }

        $this->db->order_by('log_aktivitas.waktu', 'DESC');

        return $this->db->get()->result_array();
    }

    // ================= STATUS TERKINI 1 USER =================
    public function statusTerkini($id_user)
    {
        $row = $this->db->where('id_user', $id_user)
                         ->order_by('waktu', 'DESC')
                         ->limit(1)
                         ->get($this->table)
                         ->row();

        return $row ? $row->aktivitas : 'Offline';
    }
}