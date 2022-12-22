<?php
include 'header.php';
include 'koneksi/koneksi.php';
require 'vendor/autoload.php';
if ($_SESSION['hak_akses'] != 'admin') {
    echo "
    <script>
        alert('Tidak Memiliki Akses, DILARANG MASUK!');
        document.location.href='index.php';
    </script>
    ";
}

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Upload Data Negara <small>Administrator</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php
                    include("aksi_uploadNegara.php");
                    ?>
                    <br>
                    <form action="" method="post" enctype="multipart/form-data" class="row g-2">
                        <div class="col-auto ">
                            <input class="form-control" type="file" name="filexls" id="filexls">
                        </div>
                        <div class="col-auto">
                            <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Upload File XLS/XLSX">
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