<?php
$conn = mysqli_connect("localhost", "root", "", "db_sekolah");

if (mysqli_connect_errno()) {
    echo "koneksi database gagal:" . mysqli_connect_errno();
}
