<?php

use Svg\Tag\Ellipse;

defined('BASEPATH') or exit('No direct script access allowed');


class Kehadiran extends CI_Controller
{
    public $M_dashboard;
    public $M_kehadiran;
    public $input;
    var $template = 'templates/index';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kehadiran');
        $this->load->model('M_dashboard');
    }
    function index()
    {
        $data['tittle']          = 'Kehadiran';
        // $data['absen']        = $this->M_dashboard->m_absen();
        // $data['izin']        = $this->M_dashboard->m_izin();
        $data['content']         = 'office/kehadiran/kehadiran';
        $data['script']         = 'office/kehadiran/kehadiran_js';
        $this->load->view($this->template, $data);
    }

    function data_kehadiran()
    {
        
        // $bulan = '9';
        $bulan = $this->input->post('bulan');

        $data['dept']        = $this->M_dashboard->m_dept();
        $data['karyawan']        = $this->M_kehadiran->m_karyawan();
        // $data['absen']        = $this->M_kehadiran->m_absen();
        $data['hadir']        = $this->M_kehadiran->m_hadir($bulan);
        $luar_kota        = $this->M_kehadiran->m_luar_kota($bulan);
        $izin        = $this->M_kehadiran->m_izin($bulan);
        $mangkir        = $this->M_kehadiran->m_mangkir($bulan);
        $telat        = $this->M_kehadiran->m_telat($bulan);
        $no = 1;
        echo $bulan;

        foreach ($data['dept'] as $row) {

            echo ' <tr>';
            echo '     <th colspan="2" class="p-0 pl-3" style="background: darkgray;color: white; text-transform: uppercase;">' . $row->dept . '</th>';
            echo ' </tr>';
            foreach ($data['karyawan'] as $rows) {
                if ($row->dept == $rows->dept) {

                    echo ' <tr>';
                    echo '     <th>' . $no++ . '</th>';
                    echo '     <th>' . $rows->nama . '</th>';

                    foreach ($data['hadir'] as $hdr) {
                        if ($rows->code_karyawan == $hdr->code_kar) {
                            echo '     <td>' . $hdr->jumlah . '</td>';
                        }
                    }

                    $num_rows_luarkota = $luar_kota['num_rows'];
                    if ($num_rows_luarkota > 0) {

                        foreach ($luar_kota['result'] as $data_luarkota) {
                            if ($rows->code_karyawan == $data_luarkota->code_kar) {
                                echo '     <td>' . $data_luarkota->jumlah . '</td>';
                            } else {

                                echo '     <td>0</td>';
                            }
                        }
                    } else {
                        echo '     <td>' . $num_rows_luarkota . '</td>';
                    }

                    $num_rows_izin = $izin['num_rows'];
                    if ($num_rows_izin > 0) {

                        foreach ($izin['result'] as $data_izin) {
                            if ($rows->code_karyawan == $data_izin->code_kar) {
                                echo '     <td>' . $data_izin->jumlah . '</td>';
                            } else {

                                echo '     <td>0</td>';
                            }
                        }
                    } else {
                        echo '     <td>' . $num_rows_izin . '</td>';
                    }

                    $num_rows_mangkir = $mangkir['num_rows'];
                    if ($num_rows_mangkir > 0) {

                        foreach ($mangkir['result'] as $data_mangkir) {
                            if ($rows->code_karyawan == $data_mangkir->code_kar) {
                                echo '     <td>' . $data_mangkir->jumlah . '</td>';
                                // if ($data_mangkir->izin == 'izin') {
                                // } else {
                                //     echo '     <td>'.$data_mangkir->izin.'</td>';
                                // }
                            } else {

                                echo '     <td>0</td>';
                            }
                        }
                    } else {
                        echo '     <td>' . $num_rows_mangkir . '</td>';
                    }

                    $num_rows_telat = $telat['num_rows'];

                    if ($num_rows_telat > 0) {
                        $total = 0;

                        foreach ($telat['result'] as $data_telat) {
                            if ($rows->code_karyawan == $data_telat->code_kar) {
                                // if ($data_telat->jam_masuk >= '08:15') {
                                $code = $rows->code_karyawan;
                                // echo '     <td>' . $data_telat->jam_masuk . '</td>';
                                $waktu_awal        = strtotime("08:00");
                                $waktu_akhir    = strtotime("$data_telat->jam_masuk"); // bisa juga waktu sekarang now()

                                //menghitung selisih dengan hasil detik
                                $diff    = $waktu_akhir - $waktu_awal;
                                //membagi detik menjadi jam
                                $jam    = floor($diff / (60 * 60));
                                // $subtotal = $total += $diff;
                                //membagi sisa detik setelah dikurangi $jam menjadi menit
                                $menit    = $diff - $jam * (60 * 60);
                                $subtelat = $total += $diff;
                                $total_telat = $subtelat - $jam * (60 * 60);

                                // echo '<td>' . $diff .  ' jam dan ' . floor($menit / 60) . ' menit</td>';
                                //menampilkan / print hasil
                                // echo 'Hasilnya adalah ' . number_format($diff, 0, ",", ".") . ' detik<br /><br />';
                                // echo 'Sehingga Anda memiliki sisa waktu promosi selama: ' . $jam .  ' jam dan ' . floor($menit / 60 + 15) . ' menit';
                                // }
                            } else {

                                // echo '     <td>0</td>';
                            }
                        }
                        // echo '     <td>' . $diff += $diff . '</td>';
                    } else {
                        echo '     <td>' . $num_rows_telat . '</td>';
                    }
                    if ($code == $rows->code_karyawan) {
                        echo '     <td>' .  floor($total_telat / 60) . ' Menit</td>';
                    } else {

                        echo '     <td>0 Menit</td>';
                    }
                    echo ' </tr>';
                }
            }
        }
    }
}
