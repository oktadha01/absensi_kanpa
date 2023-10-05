<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public $M_customer;
    public $db;
    public $uri;
    public $input;
    var $template = 'templates/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_customer');
    }
    function event()
    {
        $nm_perum = preg_replace("![^a-z0-9]+!i", " ", $this->uri->segment(3));
        $data['bread']          = 'Event ' . $nm_perum;
        $data['tittle']         = 'Event ' . $nm_perum;
        // $data['data_customer'] = $this->M_customer->m_data_customer($nm_perum );
        // $data['data_customer']  = $this->M_customer->filter_customer($nm_perum);
        $data['get_tgl']        = $this->M_customer->m_get_tgl($nm_perum);
        $data['script']        = 'page/customer/customer_js';
        $data['content']        = 'page/customer/customer';
        $this->load->view($this->template, $data);
    }
    function save_customer()
    {
        $nm_perum = $this->input->post('nm-perum');
        $sql = "SELECT *FROM perumahan WHERE nm_perum = '$nm_perum'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $id_perum = $row->id_perum;
            }
        }
        $action = $this->input->post('action');
        $id_customer = $this->input->post('id-customer');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no-hp');
        $alamat = $this->input->post('alamat');
        $tgl_event = $this->input->post('tgl-event');
        $data = array(
            'id_cus_perum' => $id_perum,
            'nama' => $nama,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'tgl_event' => $tgl_event,
        );
        if ($action == 'save') {

            $this->M_customer->m_save_customer($data);
        } else if ($action == 'edit') {

            $this->M_customer->m_edit_customer($id_customer, $tgl_event, $nama, $no_hp, $alamat, $data);
        }
    }
    function delete_customer()
    {
        $id_customer = $this->input->post('id-customer');
        $this->M_customer->m_delete_customer($id_customer);
    }
    function data_filter()
    {
        $nm_perum = $this->input->post('nm-perum');
        $tgl_filter = $this->input->post('tgl-filter');
        $no = 1;
        // echo $nm_perum;
        if ($tgl_filter == 'all') {
            $sql = "SELECT *FROM perumahan, customer WHERE perumahan.id_perum = customer.id_cus_perum AND perumahan.nm_perum = '$nm_perum' ORDER BY tgl_event DESC, id_customer DESC";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    echo '<tr>';
                    echo '<td class="pl-23px">';
                    echo '  <p class="text-xs font-weight-bold mb-0">' . $no++ . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '  <p class="text-xs font-weight-bold mb-0">' . $row->nama . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '  <p class="text-xs text-secondary mb-0">' . $row->no_hp . '</p>';
                    echo '</td>';
                    echo '<td class="align-middle text-center text-sm">';
                    echo '  <p class="text-xs font-weight-bold mb-0">' . $row->alamat . '</p>';
                    echo '</td>';
                    echo '<td class="align-middle text-center text-sm">';
                    echo '  <p class="text-xs font-weight-bold mb-0">' . $row->tgl_event . '</p>';
                    echo '</td>';
                    echo '</td>';
                    echo '<td class="align-middle text-center text-sm">';
                    echo '  <a class="btn text-dark mb-0 btn-edit-customer" href="#" data-id-customer="' . $row->id_customer . '" data-nama="' . $row->nama . '" data-no-hp="' . $row->no_hp . '" data-alamat="' . $row->alamat . '" data-tgl-event="' . $row->tgl_event . '" style="padding: 1px 7px;"><i class="fas fa-pencil-alt text-dark" aria-hidden="true"></i></a> ';
                    echo '  <a class="btn  text-danger text-gradient mb-0 btn-delete-cust"  href="#" data-id-customer="' . $row->id_customer . '" style="padding: 1px 7px;"><i class="far fa-trash-alt " aria-hidden="true"></i></a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }
        } else {
            $sql = "SELECT *FROM perumahan, customer WHERE perumahan.id_perum = customer.id_cus_perum AND perumahan.nm_perum = '$nm_perum' AND customer.tgl_event ='$tgl_filter' ORDER BY tgl_event DESC, id_customer DESC";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    echo '<tr>';
                    echo '<td class="pl-23px">';
                    echo '    <p class="text-xs font-weight-bold mb-0">' . $no++ . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '    <p class="text-xs font-weight-bold mb-0">' . $row->nama . '</p>';
                    echo '</td>';
                    echo '<td>';
                    echo '    <p class="text-xs text-secondary mb-0">' . $row->no_hp . '</p>';
                    echo '</td>';
                    echo '<td class="align-middle text-center text-sm">';
                    echo '    <p class="text-xs font-weight-bold mb-0">' . $row->alamat . '</p>';
                    echo '</td>';
                    echo '<td class="align-middle text-center text-sm">';
                    echo '    <p class="text-xs font-weight-bold mb-0">' . $row->tgl_event . '</p>';
                    echo '</td>';
                    echo '</td>';
                    echo ' <td class="align-middle text-center text-sm">';
                    echo '<a class="btn text-dark mb-0 btn-edit-customer" href="#" data-id-customer="' . $row->id_customer . '" data-nama="' . $row->nama . '" data-no-hp="' . $row->no_hp . '" data-alamat="' . $row->alamat . '" data-tgl-event="' . $row->tgl_event . '" style="padding: 1px 7px;"><i class="fas fa-pencil-alt text-dark" aria-hidden="true"></i></a> ';
                    echo '<a class="btn  text-danger text-gradient mb-0 btn-delete-cust"  href="#" data-id-customer="' . $row->id_customer . '" style="padding: 1px 7px;"><i class="far fa-trash-alt " aria-hidden="true"></i></a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }
        }
        echo '<script>';
        echo '$("#count-data").text("' . $query->num_rows() . ' data customer")';
        echo '</script>';

        echo '<script>';
        echo '$(".btn-edit-customer").click(function() {
                form_in();
                $("#id-customer").val($(this).data("id-customer"));
                $("#nama").val($(this).data("nama"));
                $("#no-hp").val($(this).data("no-hp"));
                $("#alamat").val($(this).data("alamat"));
                $("#tgl-input").val($(this).data("tgl-event"));
                $("#btn-save-cust").val("edit");
                });
                $(".btn-delete-cust").click(function() {
                    var confirmalert = confirm("Apakah anda yakin untuk menghapus data customer ?");
                        if (confirmalert == true) {
                            var el = this;
                            let formData = new FormData();
                            formData.append("id-customer", $(this).data("id-customer"));
                            $.ajax({
                                type: "POST",
                                url: "' . site_url("Customer/delete_customer") . '",
                                data: formData,
                                cache: false,
                                processData: false,
                                contentType: false,
                                success: function(data) {
                                    $(el).closest("tr").css("background", "tomato");
                                    $(el).closest("tr").fadeOut(300, function() {
                                        $(this).remove();
                                    });
                                    // alert(data)
                                
                                
                                },
                                error: function() {
                                    alert("Data Gagal Diupload");
                                }
                            });
                        }
                });
                
                ';
        echo '</script>';
    }
}
