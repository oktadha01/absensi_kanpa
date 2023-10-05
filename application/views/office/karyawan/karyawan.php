<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="header">
                <h2>Basic Example 8</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table center-aligned-table">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nama</th>
                                <th colspan="2" class="text-center">Hari Kerja</th>
                            </tr>
                            <tr>
                                <th class="text-center">6 Hari</th>
                                <th class="text-center">7 Hari</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dept as $data) :
                            ?>
                                <tr style="background: #f8f8f8;text-transform: uppercase;font-weight: bold;">
                                    <td colspan="4"><?= $data->dept; ?></td>
                                </tr>
                                <?php
                                foreach ($karyawan as $row) :
                                    if ($data->dept == $row->dept) {

                                ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data->nama; ?></td>
                                            <td>
                                                <center>
                                                    <div class="form-group">
                                                        <label class="fancy-checkbox">
                                                            <input type="checkbox" name="checkbox" id="h-6-<?= $data->code_karyawan; ?>" class="ceklis-hari hari-<?= $data->code_karyawan; ?>" data-code-kar="<?= $data->code_karyawan; ?>" required="" value="6">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="form-group">
                                                        <label class="fancy-checkbox">
                                                            <input type="checkbox" name="checkbox" id="h-7-<?= $data->code_karyawan; ?>" class="ceklis-hari hari-<?= $data->code_karyawan; ?>" data-code-kar="<?= $data->code_karyawan; ?>" required="" value="7">
                                                            <span></span>
                                                        </label>

                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>