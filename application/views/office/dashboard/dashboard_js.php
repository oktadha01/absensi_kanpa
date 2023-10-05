<script>
    $(document).ready(function() {
        load_tabel_absen();
        load_data_absen();
    });
    <?php
    $tgl = date("d-m-Y");
    $fillter = explode('-', $tgl);
    ?>
    $('#single-selection').val('<?= ltrim($fillter[1], "0"); ?>');
    $('.jumping-dots-loader').hide();
    $('#single-selection').change(function() {
        var bulan = $(this).val();
        // $('#single-selectios').val(bulan);
        // alert(bulan);
        var delayInMilliseconds = 1500; //1 second
        $('.jumping-dots-loader').show();
        load_tabel_absen();
        
        setTimeout(function() {
            //your code to be executed after 1 second
            // alert('yaa')
            load_data_absen();
            $('.jumping-dots-loader').hide();
        }, delayInMilliseconds);
    });
    // $('#single-selection').trigger('change');
    function load_data_absen() {
        let formData = new FormData();
        formData.append('bulan', $('#single-selection').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Dashboard/data_absen'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert(data);
                $('#load-script').html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function load_tabel_absen() {
        let formData = new FormData();
        formData.append('bulan', $('#single-selection').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Dashboard/tabel_absen'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert(data);
                $('#load-tabel-absen').html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
</script>