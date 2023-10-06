<!doctype html>
<html lang="en">

<head>
    <title>:: Absensi :: Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="System Absensi Kanzu Permai Abadi">
    <meta name="author" content="Kanzu Permai Abadi">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/font-awesome/css/font-awesome.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/main.css">

</head>

<?php
if ($this->session->flashdata('error')) {
    echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
}
?>

<body data-theme="light" class="font-nunito">
    <!-- WRAPPER -->
    <div id="wrapper" class="theme-cyan">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top pb-0 mb-0 text-center">
                        <img src="<?= base_url('assets'); ?>/images/logo2.png" alt="Iconic">
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Login Dengan Akun Anda</p>
                        </div>
                        <div class="body">
                            <form action="<?= site_url('Auth/login') ?>" method="post">
                                <!-- Alert -->
                                <?php
                                        if (validation_errors() || $this->session->flashdata('result_login')) {
                                        ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <span class="alert-icon"><i class="fa fa-warning"></i></span>
                                    <strong>Warning!</strong>
                                    <?php echo validation_errors(); ?>
                                    <?php echo $this->session->flashdata('result_login'); ?>
                                    <?php echo $this->session->flashdata('Habis'); ?>
                                </div>
                                <?php } ?>
                                <!-- akhir alert -->
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="username" id="username" required=""
                                        autocomplete="off" placeholder="Enter username Anda...">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" placeholder="Password"
                                        aria-label="Password" name="password" id="password"
                                        aria-describedby="email-addon" autocomplete="current-password">
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox" id="customCheck">
                                        <span>Show Password</span>
                                    </label>
                                </div>
                                <!-- /.col -->
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

                                <!-- /.col -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
    $(document).ready(function() {
        $(' #customCheck').click(function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });
    });
    </script>
</body>

</html>