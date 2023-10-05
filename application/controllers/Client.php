<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Support\Arr;

class Client extends CI_Controller
{
    public $session;
    public $input;
    public $M_client;
    public $db;
    public $uri;
    public $perum;

    var $template = 'templates_client/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_client');
    }

    public function index()
    {
        // Cek apakah data sudah ada dalam sesion
        $tittle = $this->uri->segment('1');


        $data['_tittle'] = 'Event ' . $tittle;
        // $data['perumahan'] = $this->FormDataModel->m_perumahan();
        $data['content']        = 'client/dash_client';
        $this->load->view($this->template, $data);
    }

    function save_customer()
    {
        $sql = "SELECT *FROM perumahan WHERE status_perum ='view'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $id_perum = $row->id_perum;
            }
        }
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no-hp');
        $alamat = $this->input->post('alamat');
        $data = array(
            'id_cus_perum' => $id_perum,
            'nama' => $nama,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'tgl_event'=> date("d-m-Y"),
        );
        $this->M_client->m_save_customer($data);
    }
    // public function submit()
    //     // Tangkap data dari formulir
    //     $id_customer = $this->input->post('id_customer');
    //     $nama = $this->input->post('nama');
    //     $email = $this->input->post('email');
    //     $telepon = $this->input->post('telepon');
    //     $perum =  $this->input->post('perum');

    //     // Simpan data ke dalam sesion
    //     $data = array(
    //         'id_customer' => $id_customer,
    //         'nama' => $nama,
    //         'email' => $email,
    //         'telepon' => $telepon
    //     );
    //     $this->session->set_userdata('form_data', $data);

    //     // Simpan data ke database
    //     if ($this->FormDataModel->simpanData($id_customer, $nama, $email, $telepon)) {
    //         // Data berhasil disimpan
    //         $this->session->set_flashdata('success_message', 'Terima Kasih Data anda sudah berhasil disimpan.');
    //     } else {
    //         // Data sudah ada
    //         $this->session->set_flashdata('error_message', 'Anda sSudah Pernah Mengisikan Data diri.');
    //     }

    //     redirect('Client/visit/' . $perum);
    // }

}
