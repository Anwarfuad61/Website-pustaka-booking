<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAnggota extends CI_Model
{
    public function getAnggota()
    {
        // Gantikan 'nama_tabel_anggota' dengan nama tabel anggota yang sesuai di database Anda.
        return $this->db->get('anggota');
    }

    // Jika Anda memerlukan fungsi lain untuk manipulasi data anggota, tambahkan di sini.
    // Misalnya, fungsi untuk tambah anggota, edit anggota, hapus anggota, dll.
}
