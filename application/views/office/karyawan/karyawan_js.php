<script>
    $('.ceklis-hari').click(function(e) {
        $('.hari-' + $(this).data('code-kar')).not(this).prop('checked', false);
        if ($(this).is(":checked")) {
            // var value_ceklis = $(this).val();
            let formData = new FormData();
            formData.append('code-karyawan', $(this).data('code-kar'));
            formData.append('hari-kerja', $(this).val());
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Karyawan/ubah_hari_kerja'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert('Berhasil');
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        } else {
            $('#h-' + $(this).val() + '-' + $(this).data('code-kar')).prop('checked', true);
            // var value_ceklis = '';
        }
    });
    <?php
    $no = 1;
    foreach ($karyawan as $data) :
        echo '$("#h-' . $data->hari_kerja . '-' . $data->code_karyawan . '").prop("checked", true);';
    ?>
    <?php endforeach; ?>
</script>