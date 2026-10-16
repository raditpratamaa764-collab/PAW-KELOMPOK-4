<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_menu = trim($_POST['nama_menu']);
    $kategori = trim($_POST['kategori']);
    $deskripsi = trim($_POST['deskripsi']);
    $status_halal = trim($_POST['status_halal']);
    $harga = (int) $_POST['harga'];

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO menu (nama_menu, kategori, deskripsi, status_halal, harga)
         VALUES (?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssssi",
        $nama_menu,
        $kategori,
        $deskripsi,
        $status_halal,
        $harga
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?pesan=berhasil");
        exit;
    }

    $error = "Gagal menambahkan data: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container py-5">
    <h2 class="mb-4">Tambah Menu</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-select" required>
                <option value="">Pilih Kategori</option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Camilan">Camilan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"
                      rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status Halal</label>
            <select name="status_halal" class="form-select" required>
                <option value="">Pilih Status</option>
                <option value="Halal">Halal</option>
                <option value="Belum Terverifikasi">Belum Terverifikasi</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control"
                   min="0" required>
        </div>

        <button type="submit" name="simpan"
                class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>