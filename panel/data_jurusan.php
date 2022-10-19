<?php
include 'header.php';

if ($_SESSION['hak_akses'] != 'admin') {
    echo "
    <script>
        alert('Tidak Memiliki Akses, DILARANG MASUK!');
        document.location.href='index.php';
    </script>
    ";
}
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
                    <h2>Data Jurusan <small>Administrator</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <div class="text-muted font-12 m-b-30 mb-2">
                                    <a href="form_jurusan.php" type="button" class="btn btn-round btn-success ml-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
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
                                            <th>Kelas</th>
                                            <th>Tgl Input</th>
                                            <th>User Input</th>
                                            <th>Tgl Update</th>
                                            <th>User Update</th>
                                            <th>Akses</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi/koneksi.php';
                                        $no = 1;
                                        $query = "SELECT id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, jurusan.tgl_input,jurusan.user_input,jurusan.tgl_update,jurusan.user_update,CONCAT(user.hak_akses,' (',user.nama,')') as akses
                                        FROM jurusan
                                        LEFT JOIN jenjang
                                        ON jurusan.id_jenjang = jenjang.id_jenjang LEFT JOIN user ON jurusan.id_user = user.id_user";
                                        $sql = mysqli_query($conn, $query);
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['kelas']; ?></td>
                                                <td><?= $data['tgl_input']; ?></td>
                                                <td><?= $data['user_input']; ?></td>
                                                <td><?= $data['tgl_update']; ?></td>
                                                <td><?= $data['user_update']; ?></td>
                                                <td><?= $data['akses']; ?></td>
                                                <td><a class="btn btn-warning" type="button" href="edit_jurusan.php?id_jurusan=<?= $data['id_jurusan']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                                <td><a class="btn btn-danger" type="button" onclick="return confirm('Data akan di Hapus?')" href="hapus_jurusan.php?id_jurusan=<?= $data['id_jurusan']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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