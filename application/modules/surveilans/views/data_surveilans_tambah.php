<section class="content-header">
    <h1>
        <?php echo $title; ?> &nbsp;
    </h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i>SURVEILANS</a></li>
        <li><a href="#"><?php echo $title; ?></a></li>
    </ol>
</section>

<section class="content">
    <div class="box box-success">
        <div class="box-header box-border">
            <h3 class="box-title">Tambah Data</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>

        <div class="box-body">
            <form method="post" action="<?=base_url()?>surveilans/data_surveilans_tambah_proses" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tanggal</label>
                    <input class="form-control" name="tanggal" type="date" placeholder="Isi Tanggal..."/>
                </div>

                <div class="form-group">
                    <label>No. Rekam Medis</label>
                    <input class="form-control" name="no_rm" type="number" placeholder="Isi No rekam Medis..."/>
                </div>

                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input class="form-control" name="nm_pasien" type="text" placeholder="Isi Nama Pasien..."/>
                </div>

                <div class="form-group">
                    <label>Terpasang</label>
                    <select class="form-control select2" name="terpasang">
                        <option value="IDO">IDO</option>
                        <option value="IADP">IADP</option>
                        <option value="HAP">HAP</option>
                        <option value="ISK">ISK</option>
                    </select>
                    <!-- <input class="form-control" name="terpasang" type="text" placeholder="Status Terpasang..."/> -->
                </div>

                <div class="form-group">
                    <label>Tinjauan</label>
                    <select class="form-control select2" name="tinjauan">
                        <option value="IDO">IDO</option>
                        <option value="IADP">IADP</option>
                        <option value="HAP">HAP</option>
                        <option value="ISK">ISK</option>
                    </select>
                    <!-- <input class="form-control" name="tinjauan" type="text" placeholder="Status Tinjauan..."/> -->
                </div>

                <div class="box-footer">
                    <button class="btn btn-success" type="submit">SIMPAN</button>
                    <a class="btn btn-danger" href="<?=base_url()?>surveilans/data_surveilans">BATAL</a>
                </div>
            </form>
        </div>
    </div>
</section>