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

<!-- Main content -->
<section class="content">

    <div class="box box-success">
        <div class="box-body table-responsive padding">
            <table id="mydataretensi" class="table table-bordered table-hover dataTable no-footer" style="text-align: center; font-size: 11px">
                <thead>
                <tr>
                    <th style="text-align: center">No</th>
                    <th style="text-align: center">No RM</th>
                    <th style="text-align: center">No KTP</th>
                    <th style="text-align: center">Nama</th>
                    <th style="text-align: center">Tgl Lahir</th>
                    <th style="text-align: center">Telpon</th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Lihat</th>
                    <th style="text-align: center">Hapus</th>
                </tr>
                </thead>

                <tbody id="show_data_retensi">

                </tbody>
            </table>
        </div>
    </div>

    <!--TAMBAH DATA USER-->
    <div class="modal fade" id="tambahdata">
        <div class="modal-dialog modal-lg">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor RM</label>
                                        <input class="form-control" type="text" name="no_rm" id="no_rm" placeholder="Input nomor rekam medis ..." required/>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function(){

                                            $('#no_rm').keyup(function(){
                                                var no_rm = $(this).val();
                                                if(no_rm != '')
                                                {
                                                    $.ajax({
                                                        url:"<?=base_url();?>index.php/retensi/getNamaPasien",
                                                        type:"POST",
                                                        data:{no_rm:no_rm},
                                                        dataType: 'JSON',
                                                        success:function(data)
                                                        {
                                                            console.log(data);
                                                            $.each(data,function(person_nm,birth_dttm,ext_id,telecom){
                                                                $('[id="nama1"]').html('<input class="form-control" id="nama" name="nama" type="text" value="'+data.isi.person_nm+'" required/>');
                                                                $('[id="tgl_lhr1"]').html('<input class="form-control" id="tgl_lhr" name="tgl_lhr" type="text" value="'+data.isi.birth_dttm+'" required/>');
                                                                $('[id="ktp1"]').html('<input class="form-control" id="ktp" name="ktp" type="text" value="'+data.isi.ext_id+'" required/>');
                                                                $('[id="telpon1"]').html('<input class="form-control" id="telpon" name="telpon" type="tel" value="'+data.isi.telecom+'" required/>');
                                                            });
                                                        }
                                                    });
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>KTP</label>
                                        <div id="ktp1">
                                            <input class="form-control" type="text" name="ktp" placeholder="Input nomor ktp ..." required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <div id="nama1">
                                            <input class="form-control" type="text" name="nama" placeholder="Input nama ..." required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <div id="tgl_lhr1">
                                            <input class="form-control" type="text" name="tgl_lhr" placeholder="Input tanggal lahir ..." required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telpon</label>
                                        <div id="telpon1">
                                            <input class="form-control" type="text" name="telpon" placeholder="Input nomor telpon ..." required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control select2" name="id_status" id="id_status" style="width: 100%;" required>
                                            <option selected="selected" value="">- Pilih -</option>
                                            <?php foreach ($get_status as $list_get_status) { ?>
                                                <option value="<?php echo $list_get_status['id_retensi_status']; ?>"><?php echo $list_get_status['nm_status']; ?></option>
                                            <?php } ?>
                                        </select>
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

    <!--MODAL HAPUS-->
    <div class="modal modal-danger fade" id="ModalHapus">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Data Retensi</h4>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">

                        <input type="hidden" name="id_retensi" id="id_retensi" value="">
                        <div class="alert alert-warning" id="tanyaHapus">
                        </div>

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

</section>
<!-- /.content -->
<script src="<?=base_url();?>assets/swal/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        tampil_data_retensi();

        //fungsi tampil data retensi
        function tampil_data_retensi(){
            $.ajax({
                url : '<?=base_url();?>index.php/retensi/data_retensi_show',
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
                            '<td>'+data[i].no_rm+'</td>'+
                            '<td>'+data[i].ktp+'</td>'+
                            '<td>'+data[i].nama+'</td>'+
                            '<td>'+data[i].tgl_lhr+'</td>'+
                            '<td>'+data[i].telpon+'</td>'+
                            '<td>'+data[i].nm_status+'</td>'+
                            '<td style="text-align:center;">'+
                            '<a href="<?=base_url();?>index.php/retensi/data_pasien/'+data[i].id_retensi+'" class="btn btn-success " ><i class="fa fa-search"></i> edit</a>'+'&nbsp; '+
                            '</td>'+
                            '<td style="text-align:center;">'+
                            '<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_retensi+'"><i class="fa fa-close"></i></a>'+'&nbsp; '+
                            '</td>'+
                            '</tr>';
                    }
                    $('#show_data_retensi').html(html);
                    $('#mydataretensi').DataTable({
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
            var no_rm=$('#no_rm').val();
            var nama=$('#nama').val();
            var tgl_lhr=$('#tgl_lhr').val();
            var ktp=$('#ktp').val();
            var telpon=$('#telpon').val();
            var id_status=$('#id_status').val();

            /*JIKA DATA TIDAK KOSONG*/
            if (no_rm === '' || nama === '' || tgl_lhr === '' || ktp === '' || telpon === '' || id_status === '') {
                Swal.fire({
                    allowEnterKey: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    type: "error",
                    title: "Oops...",
                    backdrop: `
                                rgba(32, 55, 20, 1)
                                center left
                                no-repeat
                              `,
                    text: "Data tidak boleh kosong ya ... !"}).then(function(result) {
                    if (true){
                        window.location = "data_retensi";
                    }
                })
            } else  {
                $.ajax({
                    type : "POST",
                    url : '<?=base_url();?>index.php/retensi/simpan_retensi',
                    dataType : "JSON",
                    data : {
                        no_rm:no_rm,
                        nama:nama,
                        tgl_lhr:tgl_lhr,
                        ktp:ktp,
                        telpon:telpon,
                        id_status:id_status
                    },
                    success: function(data){
                        console.log(data.response);
                        if (data.response == 'berhasil') {
                            Swal.fire({
                                allowEnterKey: false,
                                allowEscapeKey: false,
                                allowOutsideClick: false,
                                type: "error",
                                title: "Oops...",
                                backdrop: `
                                rgba(32, 55, 20, 1)
                                center left
                                no-repeat
                              `,
                                text: "Sukses ... !"}).then(function(result) {
                                if (true){
                                    window.location = "data_retensi";
                                }
                            })
                        } else {
                            Swal.fire({
                                allowEnterKey: false,
                                allowEscapeKey: false,
                                allowOutsideClick: false,
                                type: "error",
                                title: "Oops...",
                                backdrop: `
                                rgba(32, 55, 20, 1)
                                center left
                                no-repeat
                              `,
                                text: "Data Sudah ada ... !"}).then(function(result) {
                                if (true){
                                    window.location = "data_retensi";
                                }
                            })
                            //alert('Berhasil');
                        }
                    }

                });
                return false;
            }
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
                    $.each(data,function(id_retensi, no_rm, nama){
                        $('#ModalHapus').modal('show');
                        $('[name="id_retensi"]').val(data.id_retensi);
                        $('[id="tanyaHapus"]').html('Apakah anda yakin ingin menghapus data retensi '+data.no_rm+' - '+data.nama+' ?');
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
