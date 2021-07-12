<?php
    date_default_timezone_set('Asia/Jakarta');
    function tanggal_indo($tanggal, $cetak_hari = false)
    {
        $hari = array ( 1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array (1 =>
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split 	  = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }

    $tglnow = date('Y-m-d');
?>

<section class="content-header">
    <h1>
        <?php echo $title; ?>
    </h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dasbor</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <!-- TOTAL DATA RETENSI -->
        <style type="text/css">
            #kontrol{
                background-image: linear-gradient(to right, #e6005c, #ff0066, #ff3385)
            }
        </style>
        <div class="col-lg-4">
            <div class="small-box bg-red-active" id="kontrol">
                <div class="inner">
                    <h3>0</h3>

                    <p>
                        Total Retensi
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-files-o"></i>
                </div>
                <form action="<?=base_url();?>index.php/surat/total_data" class="small-box-footer" method="post">
                    <input class="form-control" type="hidden" name="tanggalpilih_awal" value="<?php echo date('Y-m-d'); ?>" />
                    <input class="form-control" type="hidden" name="tanggalpilih_akhir" value="<?php echo date('Y-m-d'); ?>" />
                    <input class="form-control" type="hidden" name="kode_jns_srt" value="K" />
                    <button type="submit" class="form-control btn bg-maroon" id="kontrol">Lihat &nbsp; <i class="fa fa-arrow-circle-right"></i></button>

                </form>
            </div>
        </div>
        <!-- END OF TOTAL DATA RETENSI -->

        <!-- TOTAL PASIEN YANG HARUS DI RETENSI -->
        <style type="text/css">
            #internal{
                background-image: linear-gradient(to right, #ff4000, #ff6600, #ff8000)
            }
        </style>
        <div class="col-lg-4">
            <div class="small-box bg-yellow" id="internal">
                <div class="inner">
                    <h3>0</h3>

                    <p>
                        Total Pasien yang Harus di-Retensi
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <form action="<?=base_url();?>index.php/surat/data_pembuatan_surat_cari" class="small-box-footer" method="post">
                    <input class="form-control" type="hidden" name="tanggalpilih_awal" value="<?php echo date('Y-m-d'); ?>" />
                    <input class="form-control" type="hidden" name="tanggalpilih_akhir" value="<?php echo date('Y-m-d'); ?>" />
                    <input class="form-control" type="hidden" name="kode_jns_srt" value="INT" />
                    <button type="submit" class="form-control btn bg-maroon" id="internal">Lihat &nbsp; <i class="fa fa-arrow-circle-right"></i></button>
                </form>
            </div>
        </div>
        <!-- END OF TOTAL PASIEN YANG HARUS DI RETENSI -->
    </div>

</section>
<!-- /.content -->
