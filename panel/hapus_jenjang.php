<?php
include 'koneksi/koneksi.php';
mysqli_query($conn, "DELETE FROM jenjang WHERE id_jenjang='" . $_GET['id_jenjang'] . "'");
if (mysqli_affected_rows($conn) > 0) {
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href='data_jenjang.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href='data_jenjang.php';
        </script>
        ";
}
