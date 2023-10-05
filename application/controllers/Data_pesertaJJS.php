<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Data_pesertaJJS extends AUTH_Controller
{
    public $M_dashboard;
    var $template = 'templates/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_JalanSehat');
    }
    function index()
    {
        $data['userdata']        = $this->userdata;
        $data['bread']           = 'Daftar Peserta';
        $data['tittle']          = 'Data Peserta JJS';
        $data['content']         = 'page/peserta_JJS/data_peserta';
        $this->load->view($this->template, $data);
    }

    function get_peserta() {
        $list = $this->M_JalanSehat->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $peser) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $peser->nama;
            $row[] = $peser->desa;
            $row[] = $peser->kategori;
            $row[] = $peser->no_hp;
            $row[] = $peser->no_undian;
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_JalanSehat->count_all(),
                    "recordsFiltered" => $this->M_JalanSehat->count_filtered(),
                    "data" => $data,
                );
        echo json_encode($output);
    }

}