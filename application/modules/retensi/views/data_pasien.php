<section class="content-header">
    <h1>
        <?php echo $title; ?> &nbsp;

    </h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-files-o"></i> Retensi</a></li>
        <li><a href="#"> Data Retensi</a></li>
        <li><a href="#"> Data Pasien</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">

                <div class="box-header with-border">
                    <h3 class="box-title">Data Dasar Pasien</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <form class="form-horizontal">

                                        <div class="form-group">
                                            <label for="no_rm" class="col-sm-2 control-label">No.RM</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" placeholder="no.rm" value="<?php echo $data_retensi_by_id['no_rm']?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_ktp" class="col-sm-2 control-label">No.KTP</label>

                                            <div class="col-sm-10">
                                                <input type="ktp" class="form-control input-sm" placeholder="tkp" value="<?php echo $data_retensi_by_id['ktp']?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama" class="col-sm-2 control-label">Nama</label>

                                            <div class="col-sm-10">
                                                <input type="nama" class="form-control input-sm" placeholder="nama" value="<?php echo $data_retensi_by_id['nama']?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
<!--                                            <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>-->
<!---->
<!--                                            <div class="col-sm-10">-->
<!--                                                <label>-->
<!--                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>-->
<!--                                                    Pria-->
<!--                                                </label>-->
<!--                                                <label>-->
<!--                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">-->
<!--                                                    Wanita-->
<!--                                                </label>-->
<!--                                            </div>-->

                                                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="id_status" id="id_status" style="width: 100%;" required>
                                                        <option selected="selected" value="<?php echo $data_retensi_by_id['id_status'];?>"><?php echo $this->m_retensi->get_status_by_id( $data_retensi_by_id['id_status'])['nm_status'];?></option>
                                                        <?php foreach ($get_status as $list_get_status) { ?>
                                                            <option value="<?php echo $list_get_status['id_retensi_status']; ?>"><?php echo $list_get_status['nm_status']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                        </div>

                                    </form>
                                </div>

                                <div class="col-md-6">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="tmp_lahir" class="col-sm-2 control-label">Tempat Lahir</label>

                                            <div class="col-sm-10">
                                                <input type="tmp_lahir" class="form-control input-sm" id="tempat_lahir" placeholder="lahir dimana?x">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>

                                            <div class="col-sm-10">
                                                <input type="tgl_lhr" class="form-control input-sm" placeholder="tgl_lahir" value="<?php echo $data_retensi_by_id['tgl_lhr']?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telpon" class="col-sm-2 control-label">Telpon</label>

                                            <div class="col-sm-10">
                                                <input type="telpon" class="form-control input-sm" placeholder="telpon" value="<?php echo $data_retensi_by_id['telpon']?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" name="id_status" id="id_status" style="width: 100%;" required>
                                                    <option selected="selected" value="<?php echo $data_retensi_by_id['id_status'];?>"><?php echo $this->m_retensi->get_status_by_id( $data_retensi_by_id['id_status'])['nm_status'];?></option>
                                                    <?php foreach ($get_status as $list_get_status) { ?>
                                                        <option value="<?php echo $list_get_status['id_retensi_status']; ?>"><?php echo $list_get_status['nm_status']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                        <div class="box box-warning">
                            <section class="content-header">
                                <h1>
                                    <?php echo $title; ?> &nbsp;
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Data</button>
                                </h1>

                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-files-o"></i> Retensi</a></li>
                                    <li><a href="#"> Data Retensi</a></li>
                                </ol>
                            </section>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                            </div>
                            <div class="box-body">
                                <div class="box-body table-responsive padding">
                                    <table id="mydatadokumen" class="table table-bordered table-hover dataTable no-footer" style="text-align: center; font-size: 11px">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Nama Dokumen</th>
                                            <th style="text-align: center">Tahun</th>
                                            <th style="text-align: center">lihat</th>
                                            <th style="text-align: center">hapus</th>
                                        </tr>
                                        </thead>

                                        <tbody id="show_data_dokumen">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
<!--            <div class="box-footer">-->
<!--                <button type="submit" class="btn btn-primary">Submit</button>-->
<!--            </div>-->
        </div>
    </div>
</section>
<!-- /.content -->

<!--TAMBAH DATA USER-->
<div class="modal fade" id="tambahdata">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Tambah Data Dokumen</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Dokumen</label>
                                    <input class="form-control" type="text" name="nm_dokumen" id="nm_dokumen" placeholder="Input nama Dokumen ..." required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input class="form-control" type="text" name="tahun" id="tahun" placeholder="Input tahun ..." required/>
                                </div>
                            </div>

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

<!--LIHAT DATA DOKUMEN-->
<script type="text/javascript">
    $(document).ready(function() {
        tampil_data_dokumen();

        //fungsi tampil data dokumen
        function tampil_data_dokumen(){
            $.ajax({
                url : '<?=base_url();?>index.php/retensi/data_dokumen_show/<?php echo $data_retensi_by_id['no_rm'];?>',
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
                            '<td>'+data[i].nm_dokumen+'</td>'+
                            '<td>'+data[i].tahun+'</td>'+
                            '<td style="text-align:center;">'+
                            '<a href="javascript:;" class="btn btn-success edit_data" data="'+data[i].id_dokumen+'"><i class="fa fa-search"></i> edit</a>'+'&nbsp; '+
                            '</td>'+
                            '<td style="text-align:center;">'+
                            '<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_dokumen+'"><i class="fa fa-close"></i></a>'+'&nbsp; '+
                            '</td>'+
                            '</tr>';
                    }
                    $('#show_data_dokumen').html(html);
                    $('#mydatadokumen').DataTable({
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

        //Simpan Dokumen
        $('#btn_simpan').on('click',function(){
            var nm_dokumen=$('#nm_dokumen').val();
            var tahun=$('#tahun').val();

            $.ajax({
                type: "post",
                url: "<?=base_url();?>index.php/retensi/simpan_dokumen/<?php echo $data_retensi_by_id['no_rm'];?>",
                dataType:"json",
                data:{
                    nm_dokumen:nm_dokumen, tahun:tahun
                },
                success: function (data) {
                    $('[name="nm_dokumen"]').val("");
                    $('[name="tahun"]').val("");
                    $('#tambahdata').modal('hide');
                    tampil_data_dokumen();
                }

            });
            return false;

        });

        //GET HAPUS
        $('#show_data_retensi').on('click','.hapus_data',function(){
            var id_retensi = $(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?=base_url();?>index.php/retensi/get_retensi",
                dataType : "JSON",
                data : {id_retensi:id_retensi},
                success: function(data){
                    $.each(data,function(id_retensi, no_dokumen, tahun){
                        $('#ModalHapus').modal('show');
                        $('[name="id_retensi"]').val(data.id_retensi);
                        $('[id="tanyaHapus"]').html('Apakah anda yakin ingin menghapus data retensi '+data.no_dokumen+' - '+data.tahun+' ?');
                    });
                }
            });
            return false;
        });

        /*$('#show_data_retensi').on('click','.hapus_data',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="id_retensi"]').val(id);
            $('[id="testing"]').html('<p>Apakah anda yakin ingin menghapus ID '+id+' ini ?</p>');
        });*/

        //Hapus Akses
        $('#btn_hapus').on('click',function(){
            var id_retensi=$('#id_retensi').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url();?>index.php/retensi/hapus_retensi",
                dataType : "JSON",
                data : {id_retensi: id_retensi},
                success: function(data){
                    $('#ModalHapus').modal('hide');
                    tampil_data_retensi(refreshPage(),1000); //fungsi refresh
                }
            });
            return false;
        });
    });
</script>
<script src="<?=base_url();?>assets/swal/sweetalert2.all.min.js"></script>

