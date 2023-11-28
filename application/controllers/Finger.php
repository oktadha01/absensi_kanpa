<?php
defined('BASEPATH') or exit('No direct script access allowed');


class finger extends CI_Controller
{
    public $M_finger;
    public $input;
    public $db;
    public $uri;
    var $template = 'templates/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_finger');
    }

    function absen()
    {
        $code_karyawan = $this->uri->segment('3');
        $data = [
            'code_karyawan' => $code_karyawan
        ];
        $insert = $this->M_finger->m_simpan_absen($data);
        echo json_encode($insert);
    }
}
