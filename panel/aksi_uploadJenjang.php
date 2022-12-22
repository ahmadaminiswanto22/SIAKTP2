<?php
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

if (isset($_POST["submit"])) {
    $err = "";
    $ekstensi = "";
    $success = "";

    $file_name = $_FILES['filexls']['name']; // untuk mendapatkan nama file yang di upload
    $file_data = $_FILES['filexls']['tmp_name']; // untuk mendapatkan temporary data

    if (empty($file_name)) {
        $err .= "<li>Silahkan masukan file yang kamu inginkan.</li>";
    } else {
        $ekstensi = pathinfo($file_name)['extension'];
    }

    $ekstensi_allowed = array("xls", "xlsx");
    if (!in_array($ekstensi, $ekstensi_allowed)) {
        $err .= "<li>Silahkan masukan file tipe xls atau xlsx. File yang kamu masukan <b>$file_name</b> punya tipe <b>$ekstensi</b></li>";
    }
    if (empty($err)) {
        @$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        @$spreadsheet = $reader->load($file_data);
        @$sheetData = $spreadsheet->getActiveSheet()->toArray();

        $jumlahData = 0;
        for ($i = 2; $i < count($sheetData); $i++) {
            $id_jenjang = $sheetData[$i]['1'];
            $nama_jenjang = $sheetData[$i]['2'];
            $tgl_input = $sheetData[$i]['3'];
            $user_input = $sheetData[$i]['4'];
            // $id_user = $sheetData[$i]['5'];
            // $user_update = $sheetData[$i]['6'];

            // echo "$id_jenjang - $nama_jenjang - $tgl_input - $user_input <br/>";

            $date_explode = explode("/", $tgl_input);
            @$date = $date_explode['2'] . "-" . $date_explode[0] . "-" . $date_explode['1'];

            $query = "INSERT INTO jenjang (id_jenjang,nama_jenjang,tgl_input,user_input) VALUES('$id_jenjang','$nama_jenjang','$date','$user_input')";
            // var_dump($query);


            $hasil = mysqli_query($conn, $query);
            // var_dump($cek);

            // $jumlahData++;
            if ($hasil) $jumlahData++;
        }

        if ($jumlahData > 0) {
            $success = "$jumlahData Berhasih Di Upload!";
        }
    }

    if ($err) {
?>
        <div class="alert alert-danger" role="alert">
            <ul><?php echo $err ?></ul>
        </div>
    <?php
    }
    if ($success) {
    ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $success ?>
        </div>
<?php
    }
}
?>