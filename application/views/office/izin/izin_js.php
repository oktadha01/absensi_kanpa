<script>
    $(document).ready(function(){
        load_data_izin();
    })
    <?php
    $tgl = date("d-m-Y");
    $fillter = explode('-', $tgl);
    ?>
    $('#single-selection').val('<?= ltrim($fillter[1], "0"); ?>');
    // $('.jumping-dots-loader').hide();
    // var bulan = $(this).val();
    $('#single-selection').change(function() {
        load_data_izin();
        // var bulan = $(this).val();
        // // $('.filter-bulan').val(bulan);
        // // alert(bulan);
        // var delayInMilliseconds = 1500; //1 second
        // $('.jumping-dots-loader').show();
        // load_tabel_absen();

        // setTimeout(function() {
        //     //your code to be executed after 1 second
        //     // alert('yaa')
        //     load_data_absen();
        //     $('.jumping-dots-loader').hide();
        // }, delayInMilliseconds);
    });
    $('#btn-tambah-izin').click(function() {
        form_input();
    });
    $('#btn-simpan-izin').click(function() {
        let formData = new FormData();
        formData.append('code-karyawan', $('#code-karyawan').val())
        formData.append('tgl-izin', $('#tgl-izin').val())
        formData.append('status-izin', $('#status-izin').val())
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Izin/simpan_izin'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                alert('Berhasil');
                form_finis();
                load_data_izin();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
    $('#btn-batal-izin').click(function() {
        form_finis();
    });

    function form_input() {
        $('#form-input-izin').removeAttr('hidden', true);
        $('#btn-tambah-izin').attr('hidden', true);
        $("#code-karyawan").select2({
            placeholder: "Select a programming language",
            allowClear: true
        });
        $("#status-izin").select2({
            placeholder: "Select a programming language",
            allowClear: true
        });
    }

    function form_finis() {
        $('#form-input-izin').attr('hidden', true);
        $('#btn-tambah-izin').removeAttr('hidden', true);
    }

    function load_data_izin() {
        let formData = new FormData();
        formData.append('bulan', $('.filter-bulan').val())
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Izin/load_data_izin'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-izin').html(data);
                action_hapus();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function action_hapus() {
        $('.btn-hapus-izin').click(function() {
            // alert($(this).data());
            var confirmalert = confirm("Apakah anda yakin untuk upload document ini ?");
            if (confirmalert == true) {
                let formData = new FormData();
                formData.append('id-izin', $(this).data('id-izin'))
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('Izin/hapus_izin'); ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        alert('Berhasil');
                        load_data_izin();
                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    }
                });
            }
        });
    }
    $("#multiple").select2({
        placeholder: "Select a programming language",
        allowClear: true
    });
    $(function() {
        $('#tgl-izin').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            locale: {
                format: 'DD-MM-YYYY'
            }

        });
    });
</script>