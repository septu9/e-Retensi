<section class="content-header">
    <h1>
        <?php echo $title; ?> &nbsp;
    </h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> User</a></li>
        <li><a href="#"> Data Surveilans</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        DATA SURVEILANS
                    </h3> &nbsp;
                    <!-- <a class="btn btn-success" href="<?=base_url()?>surveilans/data_surveilans_tambah">Tambah Data</a> -->
                    <button class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Data</button>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>

                    <div class="box-body">
                        <div class="box-body table-responsive padding">
                            <table id="mydatasurveilans" class="table table-bordered table-hover dataTable no-footer" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Tanggal</th></th>
                                        <th style="text-align: center">No. Rekam Medis</th>
                                        <th style="text-align: center">Nama Pasien</th>
                                        <th style="text-align: center">Terpasang</th>
                                        <th style="text-align: center">Tinjauan</th>
                                        <th style="text-align: center">Edit</th>
                                        <th style="text-align: center">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data_surveilans"></tbody>
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
                <h4 class="modal-title">Tambah Data Surveilans</h4></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input class="form-control" name="tanggal" id="tanggal" type="date" placeholder="Masukan tanggal..."/>
                        </div>

                        <div class="form-group">
                            <label>No. Rekam Medis</label>
                            <input class="form-control" name="no_rm" id="no_rm" type="number" placeholder="Isi No rekam Medis..."/>
                        </div>

                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input class="form-control" name="nm_pasien" id="nm_pasien" type="text" placeholder="Isi Nama Pasien..."/>
                        </div>

                        <div class="form-group">
                            <label>Terpasang</label>
                            <select class="form-control select2" name="terpasang" id="terpasang">
                                <option value="IDO">IDO</option>
                                <option value="IADP">IADP</option>
                                <option value="HAP">HAP</option>
                                <option value="ISK">ISK</option>
                            </select>
                            <!-- <input class="form-control" name="password" id="terpasang" type="text" placeholder="Status Terpasang..."/> -->
                        </div>

                        <div class="form-group">
                            <label>Tinjauan</label>
                            <select class="form-control select2" name="tinjuan" id="tinjauan">
                                <option value="IDO">IDO</option>
                                <option value="IADP">IADP</option>
                                <option value="HAP">HAP</option>
                                <option value="ISK">ISK</option>
                            </select>
                            <!-- <input class="form-control" name="password" id="tinjauan" type="text" placeholder="Status Tinjauan..."/> -->
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
                <h4 class="modal-title">Hapus Data Surveilans</h4></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control" name="id_surveilans" id="id_surveilans" type="hidden" />
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
                <h4 class="modal-title">Edit Data Surveilans</h4></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control" name="id_surveilans" id="id_surveilans2" type="hidden" placeholder="Isi Nama User..."/>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input class="form-control" name="tanggal" id="tanggal2" type="date" placeholder="Masukan tanggal..."/>
                        </div>

                        <div class="form-group">
                            <label>No. Rekam Medis</label>
                            <input class="form-control" name="no_rm" id="no_rm2" type="number" placeholder="Isi No rekam Medis..."/>
                        </div>

                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input class="form-control" name="nm_pasien" id="nm_pasien2" type="text" placeholder="Isi Nama Pasien..."/>
                        </div>

                        <div class="form-group">
                            <label>Terpasang</label>
                            <select class="form-control select2" name="terpasang" id="terpasang2">
                                <!-- <option value="IDO">IDO</option>
                                <option value="IADP">IADP</option>
                                <option value="HAP">HAP</option>
                                <option value="ISK">ISK</option> -->
                            </select>
                            <!-- <input class="form-control" name="password" id="terpasang" type="text" placeholder="Status Terpasang..."/> -->
                        </div>

                        <div class="form-group">
                            <label>Tinjauan</label>
                            <select class="form-control select2" name="tinjauan" id="tinjauan2">
                                <!-- <option value="IDO">IDO</option>
                                <option value="IADP">IADP</option>
                                <option value="HAP">HAP</option>
                                <option value="ISK">ISK</option> -->
                            </select>
                            <!-- <input class="form-control" name="password" id="tinjauan" type="text" placeholder="Status Tinjauan..."/> -->
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
    tampil_data_surveilans();

    function tampil_data_surveilans(){
        $.ajax({
            url:"<?=base_url();?>surveilans/data_all_ecoba_surveilans",
            type:"GET",
            async: true,
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
                        '<td>'+data[i].tanggal+'</td>'+
                        '<td>'+data[i].no_rm+'</td>'+
                        '<td>'+data[i].nm_pasien+'</td>'+
                        '<td>'+data[i].terpasang+'</td>'+
                        '<td>'+data[i].tinjauan+'</td>'+
                        '<td><button class="btn btn-success edit_data" data="'+data[i].id_surveilans+'"><i class="fa fa-edit"></i></button></td>'+
                        '<td><button class="btn btn-danger hapus_data" data="'+data[i].id_surveilans+'"><i class="fa fa-close"></i></button></td>'+
                        '</tr>'
                    }
                $('#show_data_surveilans').html(html);
                $('#mydatasurveilans').DataTable({
                    retrieve: true,
                    paging: true,
                    searching: true,
                })
            }
        });
    }
    // End of Tampil Data User

    //Simpan Data Surveilans
    $('#btn_simpan').on('click', function(){
        var tanggal = $('#tanggal').val();
        var no_rm = $('#no_rm').val();
        var nm_pasien = $('#nm_pasien').val();
        var terpasang = $('#terpasang').val();
        var tinjauan = $('#tinjauan').val();

        simpan_surveilans(tanggal, no_rm, nm_pasien, terpasang, tinjauan);
    });

    function simpan_surveilans(tanggal, no_rm, nm_pasien, terpasang, tinjauan){
        $.ajax({
            url: '<?=base_url();?>surveilans/data_surveilans_tambah_proses_js',
            type: 'POST',
            async: true,
            dataType: 'JSON',

            data: {
                tanggal:tanggal,
                no_rm:no_rm,
                nm_pasien:nm_pasien,
                terpasang:terpasang,
                tinjauan:tinjauan,
            },
            success: function(data){
                $('[name="tanggal"]').val('');
                $('[name="no_rm"]').val('');
                $('[name="nm_pasien"]').val('');
                $('[name="terpasang"]').val('');
                $('[name="tinjauan"]').val('');
                $('#tambahdata').modal('hide');
                tampil_data_surveilans();
            }
        });
        return false;
    }
    // End of Simpan Data Surveilans

    //Hapus Data Surveilans
    $('#show_data_surveilans').on('click','.hapus_data', function(){
        var id_surveilans = $(this).attr('data');
        $.ajax({
            url: '<?= base_url();?>surveilans/get_ecoba_surveilans_byid',
            type: 'GET',
            async: true,
            dataType: 'JSON',
            data:{
                id_surveilans:id_surveilans,
            },
            success: function(data){
                console.log(data);
                $.each(data, function(){
                    $('#modalHapus').modal('show');
                    $('[name="id_surveilans"]').val(data.id_surveilans);
                    $('[id="tanyaHapus"]').html('Apakah anda yakin ingin menghapus nama pasien: <kbd>'+data.nm_pasien+'</kbd>?');
                });
            }
        });
    });

    $('#btn_hapus').on('click',function(){
        var id_surveilans = $('#id_surveilans').val();
        $.ajax({
            url:'<?=base_url()?>surveilans/delete_surveilans',
            type: 'POST',
            dataType: 'JSON',
            async : true,
            data: {
                id_surveilans:id_surveilans,
            },
            success: function(data){
                $('#modalHapus').modal('hide');
                $('[name="id_surveilans"]').val('');
                tampil_data_surveilans();
            }
        });

    });
    // End of Hapus Data Surveilans

    //Edit Data Surveilans
    $('#show_data_surveilans').on('click','.edit_data', function(){
        var id_surveilans = $(this).attr('data');
        $.ajax({
            url: '<?= base_url();?>surveilans/get_ecoba_surveilans_byid',
            type: 'GET',
            async: true,
            dataType: 'JSON',
            data:{
                id_surveilans:id_surveilans,
            },
            success: function(data){
                console.log(data);
                $.each(data, function(id_surveilans, tanggal, no_rm, nm_pasien, terpasang, tinjauan){
                    $('#modalEdit').modal('show');
                    $('[name="id_surveilans"]').val(data.id_surveilans);
                    $('[name="tanggal"]').val(data.tanggal);
                    $('[name="no_rm"]').val(data.no_rm);
                    $('[name="nm_pasien"]').val(data.nm_pasien);

                    $('[name="terpasang"]').html('<option value='+data.terpasang+' selected>'+data.terpasang+'</option>'+
                                '<option value="IDO">IDO</option>'+
                                '<option value="IADP">IADP</option>'+
                                '<option value="HAP">HAP</option>'+
                                '<option value="ISK">ISK</option>');

                    $('[name="tinjauan"]').html('<option value='+data.tinjauan+' selected>'+data.tinjauan+'</option>'+
                                '<option value="IDO">IDO</option>'+
                                '<option value="IADP">IADP</option>'+
                                '<option value="HAP">HAP</option>'+
                                '<option value="ISK">ISK</option>');
                });
            }
        });
    });

    $('#btn_edit').on('click',function(){
        var id_surveilans = $('#id_surveilans').val();
        var tanggal = $('#tanggal2').val();
        var no_rm = $('#no_rm2').val();
        var nm_pasien = $('#nm_pasien2').val();
        var terpasang = $('#terpasang2').val();
        var tinjauan = $('#tinjauan2').val();

        $.ajax({
            url:'<?=base_url()?>surveilans/edit_surveilans',
            type: 'POST',
            dataType: 'JSON',
            async : true,
            data: {
                id_surveilans:id_surveilans,
                tanggal:tanggal,
                no_rm:no_rm,
                nm_pasien:nm_pasien,
                terpasang:terpasang,
                tinjauan:tinjauan,
            },
            success: function(data){
                $('#modalEdit').modal('hide');
                $('[name="id_surveilans"]').val('');
                $('[name="tanggal"]').val('');
                $('[name="no_rm"]').val('');
                $('[name="nm_pasien"]').val('');
                $('[name="terpasang"]').val('');
                $('[name="tinjauan"]').val('');
                tampil_data_surveilans();
            }
        });

    });
    // End of Edit Data


});
</script>