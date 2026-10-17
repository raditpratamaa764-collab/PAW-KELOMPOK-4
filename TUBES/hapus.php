<?php
include "koneksi.php";
 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
 
    $stmt = mysqli_prepare($koneksi, "DELETE FROM supplier WHERE ID_Perusahaan = ?");
    mysqli_stmt_bind_param($stmt, "s", $id);
 
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus: " . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
    exit;
}
