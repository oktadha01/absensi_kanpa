<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col">
                        <h2>Data izin karyawan</h2>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary" style="float: right;">Validate</button>
                    </div>
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
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($karyawan as $data) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data->nama; ?></td>
                                    <td><?= $data->tgl_izin; ?></td>
                                    <td><?= $data->status_izin; ?></td>
                                </tr>
                            <?php
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>