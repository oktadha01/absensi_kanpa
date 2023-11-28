<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{
    public $M_dashboard;
    public $input;
    public $db;
    var $template = 'templates/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard');
    }
    function index()
    {
        $data['tittle']          = 'Dashboard';
        // $data['absen']        = $this->M_dashboard->m_absen();
        // $data['izin']        = $this->M_dashboard->m_izin();
        $data['content']         = 'office/dashboard/dashboard';
        $data['script']         = 'office/dashboard/dashboard_js';
        $this->load->view($this->template, $data);
    }
    function tabel_absen()
    {
        $data['dept']        = $this->M_dashboard->m_dept();
        $data['karyawan']        = $this->M_dashboard->m_karyawan();
        echo '<thead>';
        echo '    <tr>';
        echo '        <th class="pin">NO</th>';
        echo '        <th class="pin">NAMA</th>';
        $bulan = $this->input->post('bulan');
        $databulan = [
            '1' => 'January',
            '2' => 'February',
            '3' => 'March',
            '4' => 'April',
            '5' => 'May',
            '6' => 'June',
            '7' => 'July',
            '8' => 'August',
            '9' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];
        $frist = date("d", strtotime("first day of " . $databulan[$bulan]));
        $last = date("d", strtotime("last day of " . $databulan[$bulan]));
        for ($x = $frist; $x <= $last; $x++) {
            $now = new DateTime($x . '-' . $databulan[$bulan] . '-2023');
            if ($now->format('l') == 'Sunday') {

                echo '<th id="th-' . ltrim($x, '0') . '" class="text-center" style="background: darkgray;">' . ltrim($x, '0') . '</th>';
            } else {

                echo '<th id="th-' . ltrim($x, '0') . '" class="text-center">' . ltrim($x, '0') . '</th>';
            }
        };
        echo '    </tr>';
        echo '</thead>';

        echo '<tbody>';
        $no = 1;
        foreach ($data['dept'] as $row) {

            echo '<tr>';
            echo ' <th colspan="2" class="p-0 pl-3" style="background: darkgray;color: white; text-transform: uppercase;">' . $row->dept . '</th>';
            echo '</tr>';
            foreach ($data['karyawan'] as $kar) {

                if ($row->dept == $kar->dept) {

                    echo '<tr>';
                    echo '<th>' . $no++ . '</th>';
                    echo '<th>' . $kar->nama . '</th>';
                    $frist = date("d", strtotime("first day of " . $databulan[$bulan]));
                    $last = date("d", strtotime("last day of " . $databulan[$bulan]));
                    for ($x = $frist; $x <= $last; $x++) {
                        $now = new DateTime($x . '-' . $databulan[$bulan] . '-2023');
                        if ($now->format('l') == 'Sunday') {
                            echo '<td class="text-center font-weight-bold" id="data-' . $kar->code_karyawan . '-' . ltrim($x, '0') . '"style="background: darkgray;"></td>';
                        } else {
                            echo '<td class="text-center font-weight-bold" id="data-' . $kar->code_karyawan . '-' . ltrim($x, '0') . '"></td>';
                        }
                    }
                    echo '</tr>';
                }
            }
        };
        echo '</tbody>';
    }
    function data_absen()
    {
        $bulan = $this->input->post('bulan');

        $data['absen']        = $this->M_dashboard->m_absen($bulan);
        // $data['izin']        = $this->M_dashboard->m_izin($bulan);
        // echo $bulan;
        echo '<script>';
        // foreach ($data['absen']  as $absn) {

        //     $no = 1;
        //     // $tanggal = '1-09-2023';
        //     $tgl_absen = $absn->tgl_absen;
        //     // $tgl_izin = $absn->tgl_izin;
        //     $absen   = explode('-', $tgl_absen);
        //     // $izin   = explode('-', $tgl_izin);
        //     // if (ltrim($absen[0], "0") == '2') {

        //     // if ($absn->jam_masuk == '' || $absn->status_izin == NULL) {

        //     //     echo '$("#data-' . $absn->code_kar . '-' . ltrim($absen[0], "0") . '").addClass("td-hadir").html("' . $absn->jam_masuk . '<br>' . $absn->jam_keluar . '");';
        //     // }
        //     // if ($absn->jam_masuk == '' && $absn->jam_keluar == '' ) {
        //     //     echo '$("#data-' . $absn->code_kar . '-' . ltrim($absen[0], "0") . '").addClass("td-mangkir").text("mangkir");';
        //     // }
        //     // }
        // };
        $databulan = [
            '1' => 'January',
            '2' => 'February',
            '3' => 'March',
            '4' => 'April',
            '5' => 'May',
            '6' => 'June',
            '7' => 'July',
            '8' => 'August',
            '9' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];

        $izin123 = "(SELECT tb_absen.*, tb_izin.*, tb_absen.code_karyawan as code_kar_absen,tb_izin.code_karyawan as code, karyawan.code_karyawan AS code_kary, karyawan.hari_kerja, karyawan.dept 
                    FROM tb_absen LEFT JOIN tb_izin ON tb_absen.code_karyawan = tb_izin.code_karyawan AND tb_izin.tgl_izin = tb_absen.tgl_absen
                    JOIN karyawan ON karyawan.code_karyawan = tb_absen.code_karyawan 
                    WHERE MONTH(STR_TO_DATE(tb_absen.tgl_absen, '%d-%m-%Y')) = $bulan)
                    UNION
                    (SELECT tb_absen.*, tb_izin.*, tb_absen.code_karyawan as code_kar_absen,tb_izin.code_karyawan as code, karyawan.code_karyawan AS code_kary, karyawan.hari_kerja, karyawan.dept  
                    FROM tb_absen RIGHT JOIN tb_izin ON tb_absen.code_karyawan = tb_izin.code_karyawan AND tb_izin.tgl_izin = tb_absen.tgl_absen
                    JOIN karyawan ON karyawan.code_karyawan = tb_izin.code_karyawan 
                    WHERE MONTH(STR_TO_DATE(tb_izin.tgl_izin, '%d-%m-%Y')) = $bulan)";
        $query = $this->db->query($izin123);
        foreach ($query->result() as $rows) {
            if ($rows->jam_masuk == '') {
                $tgl_izin = $rows->tgl_izin;
                $izin   = explode('-', $tgl_izin);

                if ($rows->status_izin == 'izin') {
                    echo '$("#data-' . $rows->code . '-' . ltrim($izin[0], "0") . '").addClass("td-izin text-light").text("IZIN");';
                } else if ($rows->status_izin == 'luar kota') {
                    echo '$("#data-' . $rows->code . '-' . ltrim($izin[0], "0") . '").addClass("td-luar-kota ").text("LUAR KOTA");';
                } else if ($rows->status_izin == 'cuti') {
                    echo '$("#data-' . $rows->code . '-' . ltrim($izin[0], "0") . '").addClass("td-cuti").text("Cuti");';
                } else if ($rows->status_izin == 'lapangan') {
                    echo '$("#data-' . $rows->code . '-' . ltrim($izin[0], "0") . '").addClass("td-hadir").text("Lapangan");';
                } else if ($rows->status_izin == 'telat') {
                    echo '$("#data-' . $rows->code . '-' . ltrim($izin[0], "0") . '").addClass("td-hadir ").html("08:00<br>' . $rows->jam_keluar . '");';
                } else if ($rows->status_izin == is_null('')) {
                    $tgl_absen = $rows->tgl_absen;
                    $absen   = explode('-', $tgl_absen);
                    $now = new DateTime(ltrim($absen[0], "0") . '-' . $databulan[$bulan] . '-2023');
                    if ($now->format('l') == 'Saturday') {
                        if ($rows->hari_kerja == '5') {
                            echo '$("#data-' . $rows->code_kar_absen . '-' . ltrim($absen[0], "0") . '").addClass("td-libur ").text("");';
                        } else {
                            if ($rows->dept == 'founder') {
                            } else {
                                if ($rows->status_absen == 'libur') {

                                    echo '$("#data-' . $rows->code_kar_absen . '-' . ltrim($absen[0], "0") . '").addClass("td-mangkir tb-absen ' . $rows->status_absen . '").text("").attr("data-id-absen","' . $rows->id_absen . '");';
                                } else {

                                    echo '$("#data-' . $rows->code_kar_absen . '-' . ltrim($absen[0], "0") . '").addClass("td-mangkir tb-absen ' . $rows->status_absen . '").text("MANGKIR").attr("data-id-absen","' . $rows->id_absen . '");';
                                }
                            }
                        }
                    } else {
                        if ($rows->dept == 'founder') {
                        } else {

                            if ($rows->status_absen == 'libur') {

                                echo '$("#data-' . $rows->code_kar_absen . '-' . ltrim($absen[0], "0") . '").addClass("td-mangkir tb-absen ' . $rows->status_absen . '").text("").attr("data-id-absen","' . $rows->id_absen . '").attr("data-status-absen","' . $rows->status_absen . '");';
                            } else {

                                echo '$("#data-' . $rows->code_kar_absen . '-' . ltrim($absen[0], "0") . '").addClass("td-mangkir tb-absen ' . $rows->status_absen . '").text("MANGKIR").attr("data-id-absen","' . $rows->id_absen . '").attr("data-status-absen","' . $rows->status_absen . '");';
                            }
                        }
                    }
                }
            } else {
                $tgl_absen = $rows->tgl_absen;
                $absen   = explode('-', $tgl_absen);
                if ($rows->jam_masuk >= '08:15') {
                    if ($rows->status_izin == 'izin') {
                        echo '$("#data-' . $rows->code_kar_absen . '-' . ltrim($absen[0], "0") . '").addClass("td-izin text-light").text("IZIN");';
                    } else if ($rows->status_izin == 'luar kota') {
                        echo '$("#data-' . $rows->code_kar_absen . '-' . ltrim($absen[0], "0") . '").addClass("td-luar-kota ").text("LUAR KOTA");';
                    } else if ($rows->status_izin == 'cuti') {
                        echo '$("#data-' . $rows->code . '-' . ltrim($absen[0], "0") . '").addClass("td-cuti ").text("Cuti");';
                    } else if ($rows->status_izin == 'lapangan') {
                        echo '$("#data-' . $rows->code . '-' . ltrim($absen[0], "0") . '").addClass("td-hadir").text("Lapangan");';
                    } else if ($rows->status_izin == 'telat') {
                        echo '$("#data-' . $rows->code_kar_absen . '-' . ltrim($absen[0], "0") . '").addClass("td-hadir ").html("08:00<br>' . $rows->jam_keluar . '");';
                    } else {
                        echo '$("#data-' . $rows->code_kar_absen . '-' . ltrim($absen[0], "0") . '").addClass("td-telat ").html("' . $rows->jam_masuk . '<br>' . $rows->jam_keluar . '");';
                    }
                } else {

                    echo '$("#data-' . $rows->code_kar_absen . '-' . ltrim($absen[0], "0") . '").addClass("td-hadir ").html("' . $rows->jam_masuk . '<br>' . $rows->jam_keluar . '");';
                }
            }
            // echo '<br>';
        };
        echo '</script>';
        echo '<script>';
        echo '$(".tb-absen").click(function(){
            // alert($(this).data("status-absen"));  
            var id_absen = $(this).data("id-absen");
            if($(this).data("status-absen") == "libur"){
                var confirmalert = confirm("Apakah anda ingin merubah status menjadi mangkir ?");
            }else{
                var confirmalert = confirm("Apakah anda ingin merubah status menjadi libur ?");
            } 
            if (confirmalert == true) {
                if($(this).data("status-absen")=="libur"){
                    $(this).removeClass("libur").data("status-absen","").text("MANGKIR");
                    var status_absen = "";
                }else{
                    $(this).addClass("libur").data("status-absen","libur").text("");
                    var status_absen = "libur";
                    
                }
                let formData = new FormData();
                formData.append("id-absen", id_absen)
                formData.append("status-absen", status_absen)
                $.ajax({
                    type: "POST",
                    url: "' . site_url("Dashboard/update_status_absen") . '",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        alert("Berhasil");
                        // load_data_izin();
                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    }
                });
            }

        })';
        echo '</script>';
    }
    function update_status_absen()
    {
        $id_absen = $this->input->post('id-absen');
        $status_absen = $this->input->post('status-absen');
        $update = $this->M_dashboard->m_update_status_absen($id_absen, $status_absen);
        echo json_encode($update);
    }
}
