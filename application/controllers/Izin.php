<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Izin extends CI_Controller
{
    public $M_izin;
    public $input;
    public $db;
    var $template = 'templates/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_izin');
    }
    function index()
    {
        $data['tittle']          = 'izin';
        // $data['absen']        = $this->M_izin->m_absen();
        $data['karyawan']        = $this->M_izin->m_data_karyawan();
        // $data['dept']        = $this->M_izin->m_data_dept();
        $data['content']         = 'office/izin/izin';
        $data['script']         = 'office/izin/izin_js';
        $this->load->view($this->template, $data);
    }

    // function ubah_hari_kerja(){
    //     $code_karyawan = $this->input->post('code-karyawan');
    //     $hari_kerja = $this->input->post('hari-kerja');
    //     $update = $this->M_karyawan->m_ubah_hari_kerja($code_karyawan,$hari_kerja);
    //     echo json_encode($update);

    // }
}
