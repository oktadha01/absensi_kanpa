<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Karyawan extends CI_Controller
{
    public $M_karyawan;
    public $input;
    public $db;
    var $template = 'templates/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_karyawan');
    }
    function index()
    {
        $data['tittle']          = 'Karyawan';
        // $data['absen']        = $this->M_karyawan->m_absen();
        $data['karyawan']        = $this->M_karyawan->m_data_karyawan();
        $data['dept']        = $this->M_karyawan->m_data_dept();
        $data['content']         = 'office/karyawan/karyawan';
        $data['script']         = 'office/karyawan/karyawan_js';
        $this->load->view($this->template, $data);
    }

    function ubah_hari_kerja(){
        $code_karyawan = $this->input->post('code-karyawan');
        $hari_kerja = $this->input->post('hari-kerja');
        $update = $this->M_karyawan->m_ubah_hari_kerja($code_karyawan,$hari_kerja);
        echo json_encode($update);

    }
}
