<style>
    .td-hadir {
        background: #86abcf;
        border: 1px solid #aaaaaa;
    }

    .td-telat {
        background: #FFEB3B;
        border: 1px solid #aaaaaa;
    }

    .td-izin {
        background: #F39F5A;
        border: 1px solid #aaaaaa;
    }

    .td-luar-kota {
        background: #CDDC39;
        border: 1px solid #aaaaaa;
    }

    .td-none {
        background: #5775ad;
        border: 1px solid #aaaaaa;
    }

    .td-mangkir {
        background: #ff5722;
        border: 1px solid #aaaaaa;
    }

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
<main>
    <div role="region" aria-label="data table" tabindex="0" class="primary">
        <table id="load-tabel-absen">

        </table>
    </div>
</main>
<div id="load-script"></div>
<div class="jumping-dots-loader"> <span></span> <span></span> <span></span> </div>
<div class="moving-gradient"></div>

