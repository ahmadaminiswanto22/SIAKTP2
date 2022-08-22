<?php
include 'header.php';
include 'koneksi/koneksi.php';
if ($_SESSION['hak_akses'] != 'admin') {
    echo "
    <script>
        alert('Tidak Memiliki Akses, DILARANG MASUK!');
        document.location.href='index.php';
    </script>
    ";
}

if (isset($_POST['simpan'])) {
    $id_jenjang = htmlspecialchars($_POST['id_jenjang']);
    $nama_jenjang = htmlspecialchars($_POST['nama_jenjang']);
    $tgl_input = htmlspecialchars($_POST['tgl_input']);
    $user_input = htmlspecialchars($_POST['user_input']);

    mysqli_query($conn, "INSERT INTO jenjang VALUES('$id_jenjang','$nama_jenjang','$tgl_input','$user_input','','')");

    // var_dump($cek);
    // exit();

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('Data Jenjang Berhasil dibuat');
            document.location.href='data_jenjang.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Jenjang Gagal dibuat');
            document.location.href='form_jenjang.php';
        </script>
        ";
    }
}
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Input Jenjang <small>Administrator</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_jenjang">ID Jenjang<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="id_jenjang" id="id_jenjang" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_jenjang">Nama Jenjang <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nama_jenjang" name="nama_jenjang" required="required" class="form-control">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Input <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="tgl_input" name="tgl_input" class="date-picker form-control" type="date" required="required">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_input">User Input<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="user_input" name="user_input" required="required" class="form-control">
                            </div>
                        </div>
                        <!--  -->
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                                <button class="btn btn-warning" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /page content -->

<?php
include 'footer.php';
?>