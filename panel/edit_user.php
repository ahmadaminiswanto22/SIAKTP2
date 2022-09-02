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
    $tgl_update = date('Y-m-d');
    $user_update = htmlspecialchars($_POST['user_update']);
    $id_user = htmlspecialchars($_POST['id_user']);

    $query = "UPDATE jenjang SET
            id_jenjang='$id_jenjang',
            nama_jenjang='$nama_jenjang',
            tgl_update='$tgl_update',
            user_update='$user_update'
            WHERE id_jenjang='$id_jenjang'
            ";
    // var_dump($query);
    // exit();
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Jenjang Berhasil DiUpdate');
                document.location.href='data_jenjang.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Jenjang Gagal Update');
                document.location.href='data_jenjang.php';
            </script>
            ";
    }
}

$data = mysqli_query($conn, "SELECT *
FROM user");
$edit = mysqli_fetch_assoc($data);
?>
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Edit User <small>Administrator</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <input type="hidden" name="id_user" id="id_user" required="required" class="form-control " value="<?= $edit['id_user']; ?>" readonly>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="username" name="username" required="required" class="form-control" value="<?= $edit['username']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_input">Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="password" name="password" required="required" class="form-control" value="<?= $edit['password']; ?>">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                                <button class="btn btn-warning" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success" name="simpan">Update</button>
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