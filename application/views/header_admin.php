<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>e-Retensi | elektronik Retensi RSUD Tebet :: <?php echo $title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/all.css">
    <!-- Ionicons -->
    <link href="<?=base_url()?>assets/ionic-v.4.5.4/ionicons.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/select2/dist/css/select2.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css" type="text/css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css" type="text/css">
    <!-- Favicon -->
    <link href="<?=base_url()?>assets/images/foto/Logo-RSUD-Tebet-square.ico" rel="shortcut icon" />
    <!-- Pace style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/pace/pace.css">

    <!-- jQuery 2.2.3 -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?=base_url()?>assets/bower_components/select2/dist/js/select2.min.js"></script>
    <!-- PACE -->
    <script src="<?=base_url()?>assets/plugins/pace/pace.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?=base_url()?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?=base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url()?>assets/dist/js/demo.js"></script>
    <!-- fullCalendar -->
    <script src="<?=base_url()?>assets/bower_components/moment/moment.js"></script> <!--jangan dihapus bareng sama fullcalendar-->
    <script src="<?=base_url()?>assets/bower_components/fullcalendar/dist/fullcalendar.js"></script> <!--jangan dihapus bareng sama fullcalendar-->
    <!-- ChartJS -->
    <script src="<?=base_url();?>assets/bower_components/chart.js/Chart.js"></script>

</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b><i>e</i></b>R</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><i>e-Retensi</i></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <style type="text/css">
            #belakang{
                background-image: linear-gradient(to right, mediumseagreen, forestgreen, green, darkgreen)
            }
        </style>
        <nav class="navbar navbar-static-top" id="belakang">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" alt="Profil>
                            <span class="hidden-xs"><i class="fa fa-user-o"></i> <?php echo $this->session->userdata("user_nm"); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?=base_url()?>assets/images/foto/user.png" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $this->session->userdata("person_nm"); ?><br>
                                    <?php echo $this->session->userdata("pgroup_cd"); ?><br>
                                </p>
                            </li>

                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" alt="Logout>
                            <span class="hidden-xs"><i class="fa fa-sign-out"></i> Sign Out</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Footer-->
                            <li class="user-footer" style="background-color: black">
                                <div style="text-align: center">
                                    <a href="<?=base_url()?>index.php/retensi/out">
                                        <button type="button" class="btn btn-danger">Sign Out</button>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?=base_url()?>assets/images/foto/user-white.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $this->session->userdata("person_nm"); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">

                <li class="header">NAVIGASI UTAMA</li>

                <!--DASBOR-->
                <li class="treeview <?php if ($title == 'Dasbor') { echo "active";} ?>">
                    <a href="<?=base_url();?>index.php/retensi/dasbor">
                         <i class="fa fa-dashboard"></i>
                        <span>Dasbor</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>
                <!--END OF DASBOR-->

                <!--USER-->
                <li class="treeview <?php if ($title == 'Data User') { echo "active";} 
                elseif ($title == 'Tambah Data User') { echo "active";}
                elseif ($title == 'Edit Data User') { echo "active";}?>">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>User</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url();?>index.php/users/data_user"><i class="fa fa-circle-o"></i> Data User</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-circle-o"></i> Tambah Data User</a></li>
                    </ul>
                </li>
                <!--END OF USER-->

                <!--SURVEILANS-->
                <li class="treeview <?php if ($title == 'Data Surveilans') { echo "active";} 
                elseif ($title == 'Tambah Data Surveilans') { echo "active";}
                elseif ($title == 'Edit Data Surveilans') { echo "active";}?>">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Surveilans</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?=base_url();?>index.php/surveilans/data_surveilans"><i class="fa fa-circle-o"></i> Data Surveilans</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-circle-o"></i> Tambah Data Surveilans</a></li>
                    </ul>
                </li>
                <!--END OF SURVEILANS-->
        </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <style type="text/css">
        #bck{
            background: linear-gradient(#eff2f6, #dee5ed, #dee5ed, #dee5ed, #bccadc, #adbed2);
        }
    </style>
    <div class="content-wrapper" id="bck">
        <?php $this->load->view($view) ?>
    </div>
    <!-- /.content-wrapper -->

    <?php
    date_default_timezone_set('Asia/Jakarta');
    $year = date('Y');
    if ($year == 2020){
        $year = 2020;
    } else {
        $year = '2020 - '.date('Y');
    }
    ?>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright © <?php echo $year; ?> | <a target="_blank" href="http://rsutebet.jakarta.go.id/">SIMRS RSUD Tebet</a>
    </footer>
</div>
<!-- ./wrapper -->

<!-- TABLE -->
<script>
    $(function () {
        $('#example1').DataTable();
        $('#example3').DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        })

        var date = new Date();
        date.setDate(date.getDate() + 60);

        //TanggalKunjungan
        $('#tanggalkunjungan').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            startDate: new Date(),
            endDate: date
        })

        // tanggaloperasi
        $('#tanggaloperasi').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            format: 'yyyy-mm-dd'
        })

        //Tanggal
        $('#tanggalpilih').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        })

        //Tanggal
        $('#tanggalpilih1').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        })

        //Date picker
        $('#datepicker').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        })

        //Date picker

        $('#datepicker2').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        })

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false,
            format: 'h:i:s a'
        })

        //Timepicker
        $('.timepicker2').timepicker({
            showInputs: false,
            format: 'h:i:s a'
        })

        //Initialize Select2 Elements
        $('.select2').select2()

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })
    });
</script>

<!-- LOADING PACE (yang loading jalan diatas) -->
<script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
        Pace.restart()
    })
    $('.ajax').click(function () {
        $.ajax({
            url: '#', success: function (result) {
                $('.ajax-content').html('<hr>Ajax Request Completed !')
            }
        })
    })
</script>

</body>
</html>
