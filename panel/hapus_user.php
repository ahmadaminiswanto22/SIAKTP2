<?php
include 'koneksi/koneksi.php';
$query = mysqli_query($conn, "DELETE FROM user WHERE id_user='" . $_GET['id_user'] . "'");

if (mysqli_affected_rows($conn) > 0) {
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href='data_user.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href='data_user.php';
        </script>
        ";
}
