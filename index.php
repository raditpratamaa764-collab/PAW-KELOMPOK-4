<?php
include "koneksi.php";
/** @var mysqli $koneksi */
$result = mysqli_query($koneksi, "SELECT * FROM supplier ORDER BY ID_Perusahaan") or die("Query error: " . mysqli_error($koneksi));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alamat Toko Vendor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Navbar</a>
            <ul class="navbar-nav flex-row gap-3">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="tambah.php">Tambah</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Alamat Toko Vendor</h1>
            <a href="tambah.php" class="btn btn-primary">+ Tambah Vendor</a>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID_Perusahaan</th>
                    <th>Nama_Supplier</th>
                    <th>Alamat</th>
                    <th>No_Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['ID_Perusahaan']) ?></td>
                    <td><?= htmlspecialchars($row['Nama_Supplier']) ?></td>
                    <td><?= htmlspecialchars($row['Alamat']) ?></td>
                    <td><?= htmlspecialchars($row['No_Telepon']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= urlencode($row['ID_Perusahaan']) ?>"
                           class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus.php?id=<?= urlencode($row['ID_Perusahaan']) ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>