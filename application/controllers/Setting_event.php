<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_event extends CI_Controller
{
    public $M_setting_event;
    public $db;
    var $template = 'templates/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_setting_event');
    }
    function index()
    {
        $data['bread']          = 'Setting Event';
        $data['tittle']          = 'Setting Event';
        $data['get_perum'] = $this->M_setting_event->m_get_perum();
        $data['script']        = 'page/setting_event/setting_event_js';
        $data['content']        = 'page/setting_event/setting_event';
        $this->load->view($this->template, $data);
    }
    function save_admin()
    {
        $id = $this->M_setting_event->post('id-admin');
        $nama = $this->M_setting_event->post('nama');
        $username = $this->M_setting_event->post('username');
        $password = $this->M_setting_event->post('password');
        $role = $this->M_setting_event->post('role');
        $role_perum = $this->M_setting_event->post('role-perum');
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'role' => $role,
        );
        // $data_role =array(
            
        // )
        $this->M_setting_event->m_save_admin($data);
        // if ($role_perum == '') {
        // }else{

        // }
    }
    function data_admin()
    {
        // $data = [];
        $no = 1;
        $sql = "SELECT *FROM admin";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $id = $data->id;
                echo '<tr>
                        <td class="pl-23px">
                            <p class="text-xs font-weight-bold mb-0">' . $no++ . '</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">' . $data->nama . '</p>
                            <p class="text-xs text-secondary mb-0">' . $data->role . '</p>
                        </td>';
                echo '<td id="role_admin' . $data->id . '" class="">';
                $sql = "SELECT *FROM perumahan, marketing_perum, admin WHERE perumahan.id_perum = marketing_perum.id_perum_marketing AND admin.id = marketing_perum.id_admin_marketing AND admin.id = $id";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                        if ($row->role == 'Marketing') {
                            echo '<p class="text-xs font-weight-bold mb-0">' . $row->nm_perum . '<a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2" aria-hidden="true"></i></a></p>';
                        } else {
                        }
                    }
                } else {
                    echo '<p class="text-xs font-weight-bold mb-0">All</p>';
                }

                echo '</td>';
                echo ' <td class="align-middle text-center text-sm">';
                echo '<a class="btn text-dark mb-0 btn-edit-admin" href="#form-add-admin" data-id="' . $data->id . '" data-nama="' . $data->nama . '" style="padding: 1px 7px;"><i class="fas fa-pencil-alt text-dark" aria-hidden="true"></i></a> ';
                echo '<a class="btn  text-danger text-gradient mb-0" href="javascript:;" style="padding: 1px 7px;"><i class="far fa-trash-alt " aria-hidden="true"></i></a>';
                echo '</td>';
                echo '  </tr>';
            }
        }
        echo '<script>';
        echo '$(".btn-edit-admin").click(function() {
                    add_admin();
                    $("#nama").val($(this).data("nama"))
                    $("#select-role").show()
                })';
        echo '</script>';
        // echo $data;
    }
    function data_role_admin()
    {
    }
}
