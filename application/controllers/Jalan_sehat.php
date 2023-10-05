<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jalan_sehat extends CI_Controller
{
    public $M_jalan_sehat;
    public $input;
    public $db;
    public $session;
    var $template = 'templates_client/index';


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jalan_sehat');
    }
    function index()
    {
        $data['bread']          = 'Dashboard';
        $data['_tittle']          = 'JALAN SEHAT KANZU GROUP';
        // $data['dashboard'] = $this->M_dashboard->m_data();
        // $data['script']        = 'page/setting_event/setting_event_js';
        $data['content']        = 'page/jalan_sehat/jalan_sehat';
        $this->load->view($this->template, $data);
    }
    function save_customer()
    {
        // echo $nama;
        $desa = $this->input->post('desa');
        $no_hp = $this->input->post('no_hp');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $no_undian = $this->input->post('no_undian');
        $data = array();
        foreach ($nama as $key => $nama) {
            if (!empty($nama)) {
                $data[] = [
                    'desa' => $desa,
                    'no_hp' => $no_hp,
                    'nama' => $nama,
                    'kategori' => $kategori[$key],
                    'no_undian' => $no_undian[$key],
                ];
            }
        }
        if (!empty($data)) {
            $inserted_rows =  $this->M_jalan_sehat->m_save_customer($data);
            if ($inserted_rows > 0) {
                $this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
            } else {
                $this->session->set_flashdata('gagal', 'Data Gagal disimpan.');
            }
        }
        redirect('Jalan_sehat');
    }
}
