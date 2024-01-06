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
        // $data['izin']        = $this->M_izin->m_data_izin();
        $data['content']         = 'office/izin/izin';
        $data['script']         = 'office/izin/izin_js';
        $this->load->view($this->template, $data);
    }
    function load_data_izin()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data['izin']        = $this->M_izin->m_data_izin($bulan, $tahun);
        $no = 1;
        foreach ($data['izin'] as $data) :
            echo '<tr>';
            echo '<td>' . $no++ . '</td>';
            echo '<td>' . $data->nama . '</td>';
            echo '<td>' . $data->tgl_izin . '</td>';
            echo '<td>' . $data->status_izin . '</td>';
            echo '<td class="text-center"><button type="button" class="btn btn-danger btn-hapus-izin" data-id-izin="' . $data->id_izin . '" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button></td>';
            echo '</tr>';
        endforeach;
    }
    function simpan_izin()
    {
        $data = [
            'code_karyawan' => $this->input->post('code-karyawan'),
            'tgl_izin' => $this->input->post('tgl-izin'),
            'status_izin' => $this->input->post('status-izin'),

        ];
        $insert = $this->M_izin->m_simpan_izin($data);
        echo json_encode($insert);
    }
    function hapus_izin()
    {

        $id_izin = $this->input->post('id-izin');
        $delete = $this->M_izin->m_hapus_izin($id_izin);
        echo json_encode($delete);
    }
    // function ubah_hari_kerja(){
    //     $code_karyawan = $this->input->post('code-karyawan');
    //     $hari_kerja = $this->input->post('hari-kerja');
    //     $update = $this->M_karyawan->m_ubah_hari_kerja($code_karyawan,$hari_kerja);
    //     echo json_encode($update);

    // }
}
