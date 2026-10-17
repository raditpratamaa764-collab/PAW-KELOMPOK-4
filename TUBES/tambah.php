<?php
include "koneksi.php";
/** @var mysqli $koneksi */
$error = "";

if (isset($_POST['simpan'])) {
    $id     = trim($_POST['id']);
    $nama   = trim($_POST['nama']);
    $alamat = trim($_POST['alamat']);
    $telp   = trim($_POST['telp']);

    $stmt = mysqli_prepare($koneksi,
        "INSERT INTO supplier (ID_Perusahaan, Nama_Supplier, Alamat, No_Telepon) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $id, $nama, $alamat, $telp);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal menyimpan: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Toko Vendor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <h1 class="mb-4">Tambah Vendor</h1>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="mb-3">
            <label class="form-label">ID Perusahaan</label>
            <input type="text" name="id" class="form-control" maxlength="10" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Supplier</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">No Telepon</label>
            <input type="text" name="telp" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>