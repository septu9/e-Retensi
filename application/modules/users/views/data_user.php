<section class="content-header">
    <h1>
        <?php echo $title; ?> &nbsp;
    </h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> User</a></li>
        <li><a href="#"> Data User</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        DATA USER
                    </h3> &nbsp;
                    <!-- <a class="btn btn-success" href="<?=base_url()?>users/data_user_tambah">Tambah Data</a> -->
                        <button class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Data</button>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>

                    <div class="box-body">
                        <div class="box-body table-responsive padding">
                            <table id="mydatauser" class="table table-bordered table-hover dataTable no-footer" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama User</th>
                                        <th style="text-align: center">Username</th>
                                        <th style="text-align: center">Edit</th>
                                        <th style="text-align: center">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data_users"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahdata">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Tambah Data User</h4></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input class="form-control" name="nm_user" id="nm_user" type="text" placeholder="Isi Nama User..."/>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="username" id="username" type="text" placeholder="Isi Nama Username..."/>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" id="password" type="password" placeholder="Isi Password..."/>
                        </div>
                    </div>
                </div>                                
            </div>
            <div class="modal-footer">
            <button class="btn btn-success" type="submit" id="btn_simpan">SIMPAN</button>
                    <button class="btn btn-danger" data-dismiss="modal" type="button">BATAL</a>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Data -->

<!-- Modal Hapus Data -->
<div class="modal fade" id="modalHapus">
    <div class="modal-dialog modal-danger">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Hapus Data User</h4></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control" name="id_user" id="id_user2" type="hidden" />
                        <p id="tanyaHapus"></p>
                    </div>
                </div>                                
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" id="btn_hapus">Hapus</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Hapus data -->

<!-- Modal Edit Data -->
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog modal-info">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Data User</h4></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control" name="id_user" id="id_user2" type="hidden" placeholder="Isi Nama User..."/>

                        <div class="form-group">
                            <label>Nama User</label>
                            <input class="form-control" name="nm_user" id="nm_user2" type="text" placeholder="Isi Nama User..."/>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="username" id="username2" type="text" placeholder="Isi Nama Username..."/>
                        </div>
                    </div>
                </div>                                
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit" id="btn_edit">SIMPAN</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Edit Data -->

<!-- Tampil Data User -->
<script type="text/javascript">
$(document).ready(function() {
    tampil_data_user();

    function tampil_data_user(){
        $.ajax({
            url:"<?=base_url();?>users/data_all_ecoba_users",
            type:"GET",
            async:"true",
            dataType:"JSON",
            success: function(data) {
                console.log(data);

                var html='';
                var no=0;
                var i;
                for (i=0; i<data.length; i++){
                    no++;
                    html += '<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+data[i].nm_user+'</td>'+
                        '<td>'+data[i].username+'</td>'+
                        '<td><button class="btn btn-success edit_data" data="'+data[i].id_user+'"><i class="fa fa-edit"></i></button></td>'+
                        '<td><button class="btn btn-danger hapus_data" data="'+data[i].id_user+'"><i class="fa fa-close"></i></button></td>'+
                        '</tr>'
                    }
                $('#show_data_users').html(html);
                $('#mydatauser').DataTable({
                    retrieve: true,
                    paging: true,
                    searching: true,
                })
            }
        });
    }
    // End of Tampil Data User

    //Simpan Data User
    $('#btn_simpan').on('click', function(){
        var nm_user = $('#nm_user').val();
        var username = $('#username').val();
        var password = $('#password').val();

        simpan_user(nm_user, username, password);
    });

    function simpan_user(nm_user, username, password){
        $.ajax({
            url: '<?=base_url();?>users/data_user_tambah_proses_js',
            type: 'POST',
            async: true,
            dataType: 'JSON',

            data: {
                nm_user2:nm_user,
                username:username,
                password:password,
            },
            success: function(data){
                $('[name="nm_user"]').val('');
                $('[name="username"]').val('');
                $('[name="password"]').val('');
                $('#tambahdata').modal('hide');
                tampil_data_user();
            }
        });
        return false;
    }
    // End of Simpan Data User

    //Hapus Data User
    $('#show_data_users').on('click','.hapus_data', function(){
        var id_user = $(this).attr('data');
        $.ajax({
            url: '<?= base_url();?>users/get_ecoba_users_byid',
            type: 'GET',
            async: true,
            dataType: 'JSON',
            data:{
                id_user:id_user,
            },
            success: function(data){
                console.log(data);
                $.each(data, function(){
                    $('#modalHapus').modal('show');
                    $('[name="id_user"]').val(data.id_user);
                    $('[id="tanyaHapus"]').html('Apakah anda yakin ingin menhapus username<kbd>'+data.username+'</kbd>?');
                });
            }
        });
    });

    $('#btn_hapus').on('click',function(){
        var id_user = $('#id_user2').val();
        $.ajax({
            url:'<?=base_url()?>users/delete_user',
            type: 'POST',
            dataType: 'JSON',
            async : true,
            data: {
                id_user:id_user,
            },
            success: function(data){
                $('#modalHapus').modal('hide');
                $('[name="id_user"]').val('');
                tampil_data_user();
            }
        });

    });
    // End of Hapus Data

    //Edit Data
    $('#show_data_users').on('click','.edit_data', function(){
        var id_user = $(this).attr('data');
        $.ajax({
            url: '<?= base_url();?>users/get_ecoba_users_byid',
            type: 'GET',
            async: true,
            dataType: 'JSON',
            data:{
                id_user:id_user,
            },
            success: function(data){
                console.log(data);
                $.each(data, function(id_user, username){
                    $('#modalEdit').modal('show');
                    $('[name="id_user"]').val(data.id_user);
                    $('[name="nm_user"]').val(data.nm_user);
                    $('[name="username"]').val(data.username);
                });
            }
        });
    });

    $('#btn_edit').on('click',function(){
        var id_user = $('#id_user2').val();
        var nm_user = $('#nm_user2').val();
        var username = $('#username2').val();

        $.ajax({
            url:'<?=base_url()?>users/edit_user',
            type: 'POST',
            dataType: 'JSON',
            async : true,
            data: {
                id_user:id_user,
                nm_user:nm_user,
                username:username,
            },
            success: function(data){
                $('#modalEdit').modal('hide');
                $('[name="id_user"]').val('');
                $('[name="nm_user"]').val('');
                $('[name="username"]').val('');
                tampil_data_user();
            }
        });

    });
    // End of Edit Data


});
</script>
