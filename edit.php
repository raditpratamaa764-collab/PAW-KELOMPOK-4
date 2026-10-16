<?php
include 'koneksi.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM menu WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$menu = mysqli_fetch_assoc($result);

if (!$menu) {
    die("Data menu tidak ditemukan.");
}

if (isset($_POST['simpan'])) {
    $nama_menu = trim($_POST['nama_menu']);
    $kategori = trim($_POST['kategori']);
    $deskripsi = trim($_POST['deskripsi']);
    $status_halal = trim($_POST['status_halal']);
    $harga = (int) $_POST['harga'];

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE menu
         SET nama_menu = ?, kategori = ?, deskripsi = ?,
             status_halal = ?, harga = ?
         WHERE id = ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssssii",
        $nama_menu,
        $kategori,
        $deskripsi,
        $status_halal,
        $harga,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?pesan=berhasil");
        exit;
    }

    $error = "Gagal mengubah data: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container py-5">
    <h2 class="mb-4">Edit Menu</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control"
                   value="<?= htmlspecialchars($menu['nama_menu']); ?>"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-select" required>
                <?php foreach (['Makanan', 'Minuman', 'Camilan'] as $kategori): ?>
                    <option value="<?= $kategori; ?>"
                        <?= $menu['kategori'] === $kategori ? 'selected' : ''; ?>>
                        <?= $kategori; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"
                      rows="3" required><?= htmlspecialchars($menu['deskripsi']); ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status Halal</label>
            <select name="status_halal" class="form-select" required>
                <?php foreach (['Halal', 'Belum Terverifikasi'] as $status): ?>
                    <option value="<?= $status; ?>"
                        <?= $menu['status_halal'] === $status ? 'selected' : ''; ?>>
                        <?= $status; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control"
                   value="<?= (int) $menu['harga']; ?>" min="0" required>
        </div>

        <button type="submit" name="simpan"
                class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html> 