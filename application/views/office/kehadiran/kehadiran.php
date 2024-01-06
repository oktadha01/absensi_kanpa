<style>
    .loader-demo-box {
        border-radius: 0.25rem !important;
    }

    .loader-demo-box {
        width: 100%;
        height: 200px;
    }

    .jumping-dots-loader {
        width: 100px;
        height: 100px;
        border-radius: 100%;
        /* position: relative; */
        margin: 0 auto;

        position: absolute;
        top: 27%;
        z-index: 99999;
        left: 36%;
    }

    .jumping-dots-loader span {
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 100%;
        background-color: rgba(241, 83, 110, 0.8);
        margin: 35px 5px;
    }

    .jumping-dots-loader span:nth-child(1) {
        animation: bounce 1s ease-in-out infinite;
    }

    .jumping-dots-loader span:nth-child(2) {
        animation: bounce 1s ease-in-out 0.33s infinite;
    }

    .jumping-dots-loader span:nth-child(3) {
        animation: bounce 1s ease-in-out 0.66s infinite;
    }

    @keyframes bounce {

        0%,
        75%,
        100% {
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            -o-transform: translateY(0);
            transform: translateY(0);
        }

        25% {
            -webkit-transform: translateY(-20px);
            -ms-transform: translateY(-20px);
            -o-transform: translateY(-20px);
            transform: translateY(-20px);
        }
    }
</style>
<div class="row mt-3">
    <div class="col-6">
        <label>BULAN</label>
        <div class="c_multiselect">
            <select id="single-selection" name="single_selection" class="bulan multiselect multiselect-custom">
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
    <div class="col-6"><label>TAHUN</label>
        <div class="c_multiselect">
            <select id="single-selection" name="single_selection" class="tahun multiselect multiselect-custom">
                <option value="2024">2024</option>
                <option value="2023">2023</option>
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
                        <!-- <th>LUAR KOTA</th> -->
                        <th>IZIN</th>
                        <th>MANGKIR</th>
                        <th>CUTI</th>
                        <th>PRESENSI</th>
                        <th>TELAT</th>
                    </tr>
                </thead>
                <tbody id="data-kehadiran">

                </tbody>
            </table>
        </div>
    </div>
</main>
<hr>
<div id="load-script"></div>
<div class="jumping-dots-loader"> <span></span> <span></span> <span></span> </div>
<div class="moving-gradient"></div>
<!-- <main class="row">
    <h3 class="font-weight-bold">Keterangan</h3>
    <br>
    <h5>Hadir</h5>
</main> -->