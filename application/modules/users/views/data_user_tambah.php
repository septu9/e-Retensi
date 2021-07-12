<section class="content-header">
    <h1>
        <?php echo $title; ?> &nbsp;
    </h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> User</a></li>
        <li><a href="#"><?php echo $title; ?></a></li>
    </ol>
</section>

<section class="content">
    <div class="box box-success">
        <div class="box-header box-border">
            <h3 class="box-title"> Tambah Data</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>

        <div class="box-body">
 <form method="post" action="<?=base_url()?>users/data_user_tambah_proses" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama User</label>
                    <input class="form-control" name="nm_user" type="text" placeholder="Isi Nama User..."/>
                </div>

    <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" type="text" placeholder="Isi Nama Username..."/>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" name="password" type="password" placeholder="Isi Password..."/>
                </div>

                <div class="box-footer">
                    <button class="btn btn-success" type="submit">SIMPAN</button>
                    <a class="btn btn-danger" href="<?=base_url()?>users/data_user">BATAL</a>
                </div>
            </form>
        </div>
    </div>
</section>