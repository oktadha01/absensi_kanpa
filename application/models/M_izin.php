<?php

use Illuminate\Support\Arr;

defined('BASEPATH') or exit('No direct script access allowed');

class M_izin extends CI_Model
{
    function m_data_karyawan()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('tb_izin', 'tb_izin.code_karyawan = karyawan.code_karyawan');

        $query = $this->db->get();
        return $query->result();
    }
    function m_data_dept()
    {
        $this->db->select('*');
        $this->db->from('karyawan');

        $this->db->group_by('dept');
        $query = $this->db->get();
        return $query->result();
    }

    function m_ubah_hari_kerja($code_karyawan, $hari_kerja)
    {
        $update = $this->db->set('hari_kerja', $hari_kerja)
            ->where('code_karyawan', $code_karyawan)
            ->update('karyawan');
        return $update;
    }
}
