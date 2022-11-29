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
    $username = strtolower(stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $akses = htmlspecialchars($_POST['akses']);
    $id_user = $_POST['id_user'];

    //cek username sudah terdaftar belum
    // $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    // if (mysqli_fetch_assoc($result)) {
    //     echo "
    //     <script>
    //         alert('username sudah terdaftar, silahkan ganit!');
    //         document.location.href='registrasi.php';
    //     </script>
    //     ";
    //     return false;
    // }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
            alert('Konfirmasi Password Salah');
            document.location.href='registrasi.php';
        </script>
        ";
        return false;
    }
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE user SET
            id_user='$id_user',
            username='$username',
            `password` ='$password',
            nama='$nama',
            email='$email',
            hak_akses='$akses'
            WHERE id_user='$id_user'
            ";
    // var_dump($query);
    // exit();
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data user Berhasil DiUpdate');
                document.location.href='data_user.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data user Gagal Update');
                document.location.href='data_user.php';
            </script>
            ";
    }
}

$data = mysqli_query($conn, "SELECT *
FROM user WHERE id_user='" . $_GET['id_user'] . "'");
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
                    <form class="" action="" method="post" novalidate>
                        <span class="section">Edit Data User</span>
                        <input type="hidden" name="id_user" id="id_user" value="<?= $edit['id_user']; ?>">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="username" id="username" value="<?= $edit['username']; ?>" required="required" />
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Password Baru<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="password" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" />

                                <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()">
                                    <i id="slash" class="fa fa-eye-slash"></i>
                                    <i id="eye" class="fa fa-eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Ulangi Password<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="password" name="password2" id="password2" data-validate-linked='password' />
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nama User<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="nama" id="nama" value="<?= $edit['nama']; ?>" placeholder="input nama kamu" required="required" />
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="email" id="email" class='email' value="<?= $edit['email']; ?>" required="required" type="email" />
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Hak Akses<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control" name="akses" id="akses">
                                    <option value="<?= $edit['hak_akses']; ?>"><?= $edit['hak_akses']; ?></option>
                                    <option value="admin">Admin</option>
                                    <option value="operator">Operator</option>
                                </select>
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