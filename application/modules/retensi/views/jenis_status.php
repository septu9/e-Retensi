    <section class="content-header">
    <h1>
        <?php echo $title; ?> &nbsp;
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Data</button>
    </h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gears"></i> Pengaturan</a></li>
        <li><a href="#"> Jenis Status</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box box-success">
        <div class="box-body table-responsive padding">
            <table id="mydatastatus" class="table table-bordered table-hover dataTable no-footer" style="text-align: center">
                <thead>
                <tr>
                    <th style="text-align: center">No</th>
                    <th style="text-align: center">Nama Status</th>
                    <th style="text-align: center">Edit</th>
                    <th style="text-align: center">Hapus</th>
                </tr>
                </thead>

                <tbody id="show_data_status">

                </tbody>
            </table>
        </div>
    </div>

    <!--TAMBAH DATA USER-->
    <div class="modal fade" id="tambahdata">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Tambah Data Retensi</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Status</label>
                                <input class="form-control" type="text" name="nm_status" id="nm_status" placeholder="Input Nama Status ..." required/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" id="btn_simpan">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!--TAMBAH DATA AKSES-->

    <!--MODAL HAPUS-->
    <div class="modal modal-danger fade" id="ModalHapus">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Jenis Status</h4>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">

                        <input type="hidden" name="id_retensi_status" id="id_retensi_status" value="">
                        <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus jenis status ini?</p></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL HAPUS-->

    <!-- MODAL EDIT -->
    <div class="modal modal-info fade" id="ModalaEdit">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Edit Jenis Status</h3>
                </div>
                    <div class="modal-body">

                        <div class="form-group" style="display: none">
                            <label>ID Status</label>
                            <input name="id_retensi_status" id="id_retensi_status2" class="form-control" type="text" placeholder="id_retensi_status" readonly>
                        </div>

                        <div class="form-group">
                            <label>Nama Status</label>
                            <input name="nm_status" id="nm_status2" class="form-control" type="text" placeholder="Nama Status" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true" style="color: black">Tutup</button>
                        <button class="btn btn-info" id="btn_update">Update</button>
                    </div>
            </div>
        </div>
    </div>
    <!--END MODAL EDIT-->

</section>
<!-- /.content -->

<script type="text/javascript">
    $(document).ready(function() {
        tampil_data_status();

        //fungsi tampil data retensi
        function tampil_data_status(){
            $.ajax({
                url : '<?=base_url();?>index.php/retensi/data_jns_status',
                type : 'GET',
                async : true,
                dataType : 'json',
                success : function(data){
                    console.log(data);
                    var html = '';
                    var no = 0;
                    var i;
                    for(i=0; i<data.length; i++){
                        no++;
                        html += '<tr>'+
                            '<td>'+no+'</td>'+
                            '<td>'+data[i].nm_status+'</td>'+
                            '<td style="text-align:center;">'+
                            '<a href="javascript:;" class="btn btn-primary edit_data" data="'+data[i].id_retensi_status+'"><i class="fa fa-search"></i></a>'+'&nbsp; '+
                            '</td>'+
                            '<td style="text-align:center;">'+
                            '<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_retensi_status+'"><i class="fa fa-close"></i></a>'+'&nbsp; '+
                            '</td>'+
                            '</tr>';
                    }
                    $('#show_data_status').html(html);
                    $('#mydatastatus').DataTable({
                        retrieve: true,
                        paging: true,
                        searching: true
                    });
                }
            });
        }

        //fungsi refresh
        function refreshPage() {
            location.reload(true);
        }

        //Simpan Status
        $('#btn_simpan').on('click',function(){
            var nm_status=$('#nm_status').val();
            $.ajax({
                type : "POST",
                url : '<?=base_url();?>index.php/retensi/simpan_status',
                dataType : "JSON",
                data : {nm_status:nm_status},
                success: function(data){
                    $('[name="nm_status"]').val("");
                    $('#tambahdata').modal('hide');
                    tampil_data_status(refreshPage(),1000); //fungsi refresh
                }
            });
            return false;
        });

        //GET HAPUS
        $('#show_data_status').on('click','.hapus_data',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="id_retensi_status"]').val(id);
        });

        //Hapus Akses
        $('#btn_hapus').on('click',function(){
            var id_retensi_status=$('#id_retensi_status').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url();?>index.php/retensi/hapus_status",
                dataType : "JSON",
                data : {id_retensi_status: id_retensi_status},
                success: function(data){
                    $('#ModalHapus').modal('hide');
                    tampil_data_status(refreshPage(),1000); //fungsi refresh
                }
            });
            return false;
        });

        //GET UPDATE
        $('#show_data_status').on('click','.edit_data',function(){
            var id_retensi_status = $(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?=base_url();?>index.php/retensi/get_status",
                dataType : "JSON",
                data : {id_retensi_status:id_retensi_status},
                success: function(data){
                    $.each(data,function(id_retensi_status, nm_status){
                        $('#ModalaEdit').modal('show');
                        $('[name="id_retensi_status"]').val(data.id_retensi_status);
                        $('[name="nm_status"]').val(data.nm_status);
                    });
                }
            });
            return false;
        });

        //Update Akses
        $('#btn_update').on('click',function(){
            var id_retensi_status=$('#id_retensi_status2').val();
            var nm_status=$('#nm_status2').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url();?>index.php/retensi/update_status",
                dataType : "JSON",
                data : {id_retensi_status:id_retensi_status , nm_status:nm_status},
                success: function(data){
                    $('[name="id_retensi_status"]').val("");
                    $('[name="nm_status"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_status(refreshPage(),1000); //fungsi refresh
                }
            });
            return false;
        });
    });
</script>
