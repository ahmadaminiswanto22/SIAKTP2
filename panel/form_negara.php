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
    $id_negara = htmlspecialchars($_POST['id_negara']);
    $nama_negara = htmlspecialchars($_POST['nama_negara']);
    $tgl_input = htmlspecialchars($_POST['tgl_input']);
    $user_input = htmlspecialchars($_POST['user_input']);
    $id_user = htmlspecialchars($_POST['id_user']);

    mysqli_query($conn, "INSERT INTO kewarganegaraan VALUES('$id_negara','$nama_negara','$tgl_input','$user_input','','','$id_user')");

    // var_dump($cek);
    // exit();

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('Data Negara Berhasil dibuat');
            document.location.href='data_negara.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Negara Gagal dibuat');
            document.location.href='form_negara.php';
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
                    <h2>Form Input Negara <small>Administrator</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_negara">ID Negara<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="id_negara" id="id_negara" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_negara">Nama Negara <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nama_negara" name="nama_negara" required="required" class="form-control">
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
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align ">Akses User</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control" name="id_user" id="id_user">
                                    <option>Pilih Akses User</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM user");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_user'] ?>"><?= $data['hak_akses'] ?> (<?= $data['nama'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
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