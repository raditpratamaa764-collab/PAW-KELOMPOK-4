<?php
$koneksi = mysqli_connect("localhost", "root", "", "supplier_bahan_baku");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}