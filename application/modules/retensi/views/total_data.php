<section class="content-header">
    <h1>
<!--        --><?php //echo $title; ?><!-- &nbsp;-->
<!--        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Data</button>-->
        <a>
            Total Data
        </a>
    </h1>
<!---->
<!--    <ol class="breadcrumb">-->
<!--        <li><a href="#"><i class="fa fa-files-o"></i> Dashbor</a></li>-->
<!--        <li><a href="#"> Total Data</a></li>-->
<!--    </ol>-->
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
                </tr>
                </thead>

                <tbody id="show_data_retensi">

                </tbody>
            </table>
        </div>
    </div>


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
    });
</script>
