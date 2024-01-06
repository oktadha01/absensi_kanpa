<script>
    <?php
    $tgl = date("d-m-Y");
    $fillter = explode('-', $tgl);
    ?>
    $('.bulan').val('<?= ltrim($fillter[1], "0"); ?>');
    // $('.jumping-dots-loader').hide();
    var delayInMilliseconds = 1500; //1 second

    $('.jumping-dots-loader').show();
    setTimeout(function() {
        $('.jumping-dots-loader').hide();
        load_data_kehadiran();
    }, delayInMilliseconds);

    $('.bulan, .tahun').change(function() {
        // var bulan = $(this).val();
        $('.jumping-dots-loader').show();
        setTimeout(function() {
            $('.jumping-dots-loader').hide();
            load_data_kehadiran();
        }, delayInMilliseconds);

    });

    function load_data_kehadiran() {
        let formData = new FormData();
        formData.append('bulan', $('.bulan').val());
        formData.append('tahun', $('.tahun').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Kehadiran/data_kehadiran'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert(data);
                $('#data-kehadiran').html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
</script>