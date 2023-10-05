<div class="row mt-3">
    <div class="col">
        <label>ABSENSI BULAN</label>
        <div class="c_multiselect">
            <select id="single-selection" name="single_selection" class="multiselect multiselect-custom">
                <option value="1">JANUARI</option>
                <option value="2">FEBUARI</option>
                <option value="3">MARET</option>
                <option value="4">APRIL</option>
                <option value="5">MEI</option>
                <option value="6">JUNI</option>
                <option value="7">JULI</option>
                <option value="8">AGUSTUS</option>
                <option value="9">SEPTEMBER</option>
                <option value="10">OKTOBER</option>
                <option value="11">NOVEMBER</option>
                <option value="12">DESEMBER</option>
            </select>
        </div>
    </div>
</div>
<main class="row">
    <div class="col">
        <div role="region" aria-label="data table" tabindex="0" class="primary col">
            <table>
                <thead>
                    <tr>
                        <th class="pin">NO</th>
                        <th class="pin">NAMA</th>
                        <th>HADIR</th>
                        <th>LUAR KOTA</th>
                        <th>IZIN</th>
                        <th>MANGKIR</th>
                        <th>TELAT</th>
                    </tr>
                </thead>
                <tbody id="data-kehadiran">

                </tbody>
            </table>
        </div>
    </div>
    <?php
    // $waktu_awal        = strtotime("08:00");
    // $waktu_akhir    = strtotime("08:20"); // bisa juga waktu sekarang now()

    // //menghitung selisih dengan hasil detik
    // $diff    = $waktu_akhir - $waktu_awal;

    // //membagi detik menjadi jam
    // $jam    = floor($diff / (60 * 60));

    // //membagi sisa detik setelah dikurangi $jam menjadi menit
    // $menit    = $diff - $jam * (60 * 60);

    // //menampilkan / print hasil
    // // echo 'Hasilnya adalah ' . number_format($diff, 0, ",", ".") . ' detik<br /><br />';
    // echo 'Sehingga Anda memiliki sisa waktu promosi selama: ' . $jam .  ' jam dan ' . floor($menit / 60 + 15) . ' menit';
    ?>
</main>