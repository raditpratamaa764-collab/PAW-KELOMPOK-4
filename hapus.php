<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

if (!isset($_POST['id']) || !ctype_digit($_POST['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_POST['id'];

$stmt = mysqli_prepare($conn, "DELETE FROM menu WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php?pesan=berhasil");
    exit;
}

die("Gagal menghapus data: " . mysqli_error($conn));
?>