
<?php
require 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM Data_Meja");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Meja & Area - Restoran Kelompok 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- NAVBAR -->
    <div class="navbar navbar-dark" style="background-color: #1d1d1d;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Restoran Kelompok 4</a>
            <a href="tambah.php" class="btn btn-gold btn-sm"> Tambah Meja</a>
        </div>
    </div>

    <!-- DAFTAR MEJA -->
    <div class="container">
        <div class="kotak-meja">
            <div class="mb-3">
                <h4 class="heading">Daftar Meja</h4>
            </div>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr class="text-center align-middle">
                        <th>No</th>
                        <th>Nomor Meja</th>
                        <th>Kapasitas</th>
                        <th>Area</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $nomor = 1; while ($meja = mysqli_fetch_assoc($result)): ?>
                        <tr class="text-center">
                        <td><?= $nomor++; ?></td>
                        <td><?= htmlspecialchars($meja['Nomor_Meja']); ?></td>
                        <td><?= htmlspecialchars($meja['Kapasitas']); ?> orang</td>
                        <td><?= htmlspecialchars($meja['Area']); ?></td>
                        <td>
                            <span class="badge bg-success"><?= htmlspecialchars($meja['Status']); ?></span>
                        </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>

            </table>
        </div>

    </div>
    
</body>
</html>