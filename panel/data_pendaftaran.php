<?php
include 'header.php';
?>
<!-- Datatables -->
<!-- Bootstrap -->
<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!-- page content -->
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Pendaftaran <small>Administrator | Operator
                        </small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <div class="text-muted font-12 m-b-30 mb-2">
                                    <a href="form_pendaftaran.php" type="button" class="btn btn-round btn-success ml-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
                                    <div class="btn-group float-right">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print" aria-hidden="true"></i>
                                            Cetak Data
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="laporan/excel_jurusan.php">Cetak Excel</a>
                                            <a class="dropdown-item" href="#">Cetak PDF</a>
                                        </div>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Detail</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi/koneksi.php';
                                        $no = 1;
                                        $query = "SELECT pendaftaran.nis,pendaftaran.nama_siswa,pendaftaran.alamat,pendaftaran.jenis_kelamin,pendaftaran.tempat_lahir,pendaftaran.tgl_lahir,pendaftaran.status,kewarganegaraan.id_negara,kewarganegaraan.nama_negara,agama.id_agama,agama.nama_agama,jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, pendaftaran.tgl_input,pendaftaran.user_input,pendaftaran.tgl_update,pendaftaran.user_update,CONCAT(user.hak_akses,' (',user.nama,')') as akses FROM pendaftaran INNER JOIN kewarganegaraan ON pendaftaran.id_negara = kewarganegaraan.id_negara JOIN user ON pendaftaran.id_user = user.id_user JOIN agama ON pendaftaran.id_agama = agama.id_agama JOIN jurusan ON pendaftaran.id_jurusan = jurusan.id_jurusan JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang";
                                        // var_dump($query);
                                        // exit;
                                        $sql = mysqli_query($conn, $query);

                                        while ($data = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['nis']; ?></td>
                                                <td><?= $data['nama_siswa']; ?></td>
                                                <td><?= $data['kelas']; ?></td>
                                                <td><?= $data['alamat']; ?></td>
                                                <td><?= $data['jenis_kelamin']; ?></td>
                                                <!-- <td align="center"><a class="btn btn-primary" type="button" name="view" value="View" data-id="<?php echo $data["nis"]; ?>" class="btn btn-info btn-xs view_data"><i class="fa fa-bars"></i></a></td> -->
                                                <td><input type="button" name="view" value="View" data-id="<?php echo $data["nis"]; ?>" class="btn btn-info btn-xs view_data"></td>
                                                <td align="center"><a class="btn btn-warning" type="button" href="edit_pendaftaran.php?nis=<?= $data['nis']; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                                                <td align="center"><a class="btn btn-danger" type="button" onclick="return confirm('Data akan di Hapus?')" href="hapus_pendaftaran.php?nis=<?= $data['nis']; ?>"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ----- -->
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail User</h4>
                </div>
                <div class="modal-body" id="detail_user">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ----- -->
</div>
<!-- /page content -->

<?php
include 'footer.php';
?>
<!-- javascript -->
<!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- ----------- -->

<script>
    $(document).ready(function() {
        $('.view_data').click(function() {
            var data_id = $(this).data("nis")
            $.ajax({
                url: "proses_detail.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_user").html(data)
                    $("#dataModal").modal('show')
                }
            })
        })
    })
</script>