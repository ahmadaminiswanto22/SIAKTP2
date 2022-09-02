<?php
include 'koneksi/koneksi.php';
mysqli_query($conn, "DELETE FROM agama JOIN pendaftaran ON agama.id_agama = pendaftaran.id_agama WHERE id_agama='" . $_GET['id_agama'] . "'");
if (mysqli_affected_rows($conn) > 0) {
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href='data_agama.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href='data_agama.php';
        </script>
        ";
}
