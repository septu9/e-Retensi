<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>e-Retensi | elektronik Retensi RSUD Tebet :: </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/iCheck/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/AdminLTE.min.css">

    <!-- Favicon -->
    <link href="<?=base_url()?>assets/images/foto/Logo-RSUD-Tebet-square.ico" rel="shortcut icon" />
</head>

<style type="text/css">
    #belakang{
        background: linear-gradient(to top, lightseagreen, lightgreen, lightseagreen)
    }
</style>

<body class="hold-transition login-page" id="belakang">
<div class="login-box" style="border: 3px solid white">
    <div class="login-logo">
        <span style="font-family: 'Times New Roman'; color: white"><i class="fa fa-file-text-o"></i> e-Retensi</span>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <?php echo $this->session->flashdata('message');?>
        <p class="login-box-msg"><i>Login Sistem Pemisahan Arsip Rekam Medis atau elektronik Retensi (e-Retensi)<br>RSUD TEBET</i></p>
        <form action="<?=base_url();?>index.php/retensi/auth" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="user_nm" class="form-control" placeholder="Masukkan User Name" required autofocus>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="pwd0" class="form-control my-password" placeholder="Masukkan Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="from-group">
                        <label>
                            <input type="checkbox" id="showPassword">
                            &nbsp; Lihat password
                        </label>
                    </div>
                </div>

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-success btn-block">Log In</button>
                </div>
            </div>
        </form>
        <br>

        <?php
        date_default_timezone_set('Asia/Jakarta');
        $year = date('Y');
        if ($year == 2020){
            $year = 2020;
        } else {
            $year = '2020 - '.date('Y');
        }
        ?>

        <strong style="font-size: 10px">Copyright © <?php echo $year; ?> | <a target="_blank" href="http://rsutebet.jakarta.go.id/">SIMRS RSUD Tebet</a></strong> <b class="pull-right" style="font-size: 10px">Version 1.0</b>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="<?=base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?=base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?=base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>assets/dist/js/demo.js"></script>

<script type="text/javascript">
    $(function () {
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

    })

    /*show password*/
    $('#showPassword').on('change',function(){

        var isChecked = $(this).prop('checked');

        if (isChecked) {

            $('.my-password').attr('type','text');

        } else {

            $('.my-password').attr('type','password');

        }

    });
</script>

</body>
</html>
