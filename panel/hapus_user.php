<?php
include 'koneksi/koneksi.php';
var_dump($conn, "DELETE user.id_user, agama.id_user, kewarganegaraan.id_user, jurusan.id_user, pendaftaran.id_user FROM user, agama, kewarganegaraan, jurusan, pendaftaran WHERE user.id_user = agama.id_user AND user.id_user= kewarganegaraan.id_user AND user.id_user=jurusan.id_user AND user.id_user=pendaftaran.id_user AND user.id_user='" . $_GET['id_user'] . "'");
exit();
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
