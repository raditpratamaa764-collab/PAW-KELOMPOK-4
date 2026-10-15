<?php
require 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Data_Meja WHERE Nomor_Meja = ?";
    mysqli_execute_query($koneksi, $sql, [$id]);

}
    header("Location: index.php");
    exit;
?>
