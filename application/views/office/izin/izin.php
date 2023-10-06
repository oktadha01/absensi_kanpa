<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div id="form-input-izin" class="body" hidden>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <label>karyawan</label>
                        <select id="code-karyawan" class="js-states form-control">
                            <option>Pilih karyawan</option>
                            <?php
                            foreach ($karyawan as $data) :
                            ?>
                                <option value="<?= $data->code_karyawan; ?>"><?= $data->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <label>karyawan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                <input type="text" id="tgl-izin" class="form-contro" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <label>Status</label>
                        <select id="status-izin" class="js-states form-control">
                            <option>Pilih status</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                            <option value="telat">Telat</option>
                            <option value="luar kota">Luar kota</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button type="submit" id="btn-batal-izin" class="btn btn-danger">Batal</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" id="btn-simpan-izin" class="btn btn-success" style="float: right;">Simpan</button>
                    </div>
                </div>
                <hr>
            </div>
            <div class="header">
                <div class="row">
                    <div class="col">
                        <h2>Data izin karyawan</h2>
                    </div>
                    <div class="col">
                        <button type="submit" id="btn-tambah-izin" class="btn btn-primary" style="float: right;">Tambah izin</button>
                    </div>
                </div>
            </div>
            <div class="body mb-0 mt-0">
                <div class="c_multiselect">
                    <select id="single-selection" name="single_selection" class="multiselect multiselect-custom filter-bulan">
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
            <div class="body">
                <div class="table-responsive">
                    <table class="table center-aligned-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>

                        </thead>
                        <tbody id="data-izin">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>