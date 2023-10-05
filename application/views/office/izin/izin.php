<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <label>Filter Enabled</label>
                    <div class="c_multiselect">
                        <select id="multiselect4-filter" name="multiselect4[]" class="multiselect multiselect-custom" multiple="multiple" style="display: none;">
                            <option value="bootstrap">Bootstrap</option>
                            <option value="bootstrap-marketplace">Bootstrap Marketplace</option>
                            <option value="bootstrap-theme">Bootstrap Theme</option>
                            <option value="html">HTML</option>
                            <option value="html-template">HTML Template</option>
                            <option value="wp-marketplace">WordPress Marketplace</option>
                            <option value="wp-plugin">WordPress Plugin</option>
                            <option value="wp-theme">WordPress Theme</option>
                        </select>
                        <div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="None selected" aria-expanded="false"><span class="multiselect-selected-text">None selected</span> <b class="caret"></b></button>
                            <ul class="multiselect-container dropdown-menu" style="max-height: 200px; overflow: hidden auto;">
                                <li class="multiselect-item filter" value="0">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control multiselect-search" type="text" placeholder="Search"><span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="glyphicon glyphicon-remove-circle"></i></button></span></div>
                                </li>
                                <li class=""><a tabindex="0"><label class="checkbox"><input type="checkbox" value="bootstrap"> Bootstrap</label></a></li>
                                <li class=""><a tabindex="0"><label class="checkbox"><input type="checkbox" value="bootstrap-marketplace"> Bootstrap Marketplace</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="bootstrap-theme"> Bootstrap Theme</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="html"> HTML</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="html-template"> HTML Template</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="wp-marketplace"> WordPress Marketplace</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="wp-plugin"> WordPress Plugin</label></a></li>
                                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="wp-theme"> WordPress Theme</label></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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