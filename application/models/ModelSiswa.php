<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSiswa extends CI_Model
{
    //manajemen siswa
    public function getSiswa()
    {
        return $this->db->get('siswa');
    }

    public function siswaWhere($where)
    {
        return $this->db->get_where('siswa', $where);
    }

    public function simpanSiswa($data = null)
    {
        $this->db->insert('siswa', $data);
    }

    public function updateSiswa($data = null, $where = null)
    {
        $this->db->update('siswa', $data, $where);
    }

    public function hapusSiswa($where = null)
    {
        $this->db->delete('siswa', $where);
    }
}
