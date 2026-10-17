<?php
include "koneksi.php";
/** @var mysqli $koneksi */

$error = "";
if (isset($_POST['update'])) {
    $id_lama = $_POST['id_lama'];
    $id      = trim($_POST['id']);
    $nama    = trim($_POST['nama']);
    $alamat  = trim($_POST['alamat']);
    $telp    = trim($_POST['telp']);

    $stmt = mysqli_prepare($koneksi,
        "UPDATE supplier SET ID_Perusahaan = ?, Nama_Supplier = ?, Alamat = ?, No_Telepon = ? WHERE ID_Perusahaan = ?");
    mysqli_stmt_bind_param($stmt, "sssss", $id, $nama, $alamat, $telp, $id_lama);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}

if (!isset($_GET['id']) && !isset($_POST['id_lama'])) {
    header("Location: index.php");
    exit;
}
$id_cari = isset($_GET['id']) ? $_GET['id'] : $_POST['id_lama'];

$stmt = mysqli_prepare($koneksi, "SELECT * FROM supplier WHERE ID_Perusahaan = ?");
mysqli_stmt_bind_param($stmt, "s", $id_cari);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$data) {
    die("Data tidak ditemukan. <a href='index.php'>Kembali</a>");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Vendor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <h1 class="mb-4">Edit Vendor</h1>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" action="">
        <input type="hidden" name="id_lama" value="<?= htmlspecialchars($data['ID_Perusahaan']) ?>">

        <div class="mb-3">
            <label class="form-label">ID Perusahaan</label>
            <input type="text" name="id" class="form-control" maxlength="10"
                   value="<?= htmlspecialchars($data['ID_Perusahaan']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Supplier</label>
            <input type="text" name="nama" class="form-control"
                   value="<?= htmlspecialchars($data['Nama_Supplier']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control"
                   value="<?= htmlspecialchars($data['Alamat']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">No Telepon</label>
            <input type="text" name="telp" class="form-control"
                   value="<?= htmlspecialchars($data['No_Telepon']) ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>