<?php
$conn = mysqli_connect("localhost", "root", "", "db_wad");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>