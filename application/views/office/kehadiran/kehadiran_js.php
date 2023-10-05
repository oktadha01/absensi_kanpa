<script>
    <?php
    $tgl = date("d-m-Y");
    $fillter = explode('-', $tgl);
    ?>
    $('#single-selection').val('<?= ltrim($fillter[1], "0"); ?>');
    
    $('#single-selection').change(function() {
        var bulan = $(this).val();
        load_data_kehadiran()
    });
    function load_data_kehadiran() {
        let formData = new FormData();
        formData.append('bulan', $('#single-selection').val());
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