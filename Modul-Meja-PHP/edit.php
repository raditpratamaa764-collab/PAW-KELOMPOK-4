<?php
require 'koneksi.php';

$id = $_GET['id'];
$sql_ambil = "SELECT * FROM Data_Meja WHERE Nomor_Meja = ?";
$result = mysqli_execute_query($koneksi, $sql_ambil, [$id]);
$meja = mysqli_fetch_assoc($result);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nomor_Meja = trim($_POST['nomor_meja']);
    $Kapasitas  = trim($_POST['Kapasitas']);
    $Area       = trim($_POST['area']);
    $Status     = trim($_POST['status']);

    $sql = "UPDATE Data_Meja 
            SET Nomor_Meja = ?, Kapasitas = ?, Area = ?, Status = ? 
            WHERE Nomor_Meja = ?";
            
    mysqli_execute_query($koneksi, $sql, [$Nomor_Meja, $Kapasitas, $Area, $Status, $id]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- NAVBAR -->
    <div class="navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Restoran Kelompok 4</a>
        </div>
    </div>

    <div class="container" style="color:white">
        <div class="area-input" style="max-width: 550px">
            <h4 class="heading">Edit Master Meja</h4>

            <form action="#" method="POST">
                <div class="nomor-meja">
                    <label class="form-label">Nomor Meja</label>
                    <input type="text" class="form-control" name="nomor_meja" value="<?= htmlspecialchars($meja['Nomor_Meja']); ?>" required>
                </div>

                <div class="kapasitas">
                    <label class="form-label">Kapasitas Kursi</label>
                    <select class="form-select" name="Kapasitas" required>
                        <option value="2" <?= ($meja['Kapasitas'] == '2') ? 'selected' : ''; ?>>2 Kursi</option>
                        <option value="4" <?= ($meja['Kapasitas'] == '4') ? 'selected' : ''; ?>>4 Kursi</option>
                        <option value="6" <?= ($meja['Kapasitas'] == '6') ? 'selected' : ''; ?>>6 Kursi</option>
                    </select>
                </div>

                <div class="area">
                    <label class="form-label d-block">Area</label>
                    <div class="form-check-inline" style="display: flex; gap: 10px;">
                        <input class="form-check-input" type="radio" name="area" id="zona1" value="indoor" <?= ($meja['Area'] == 'indoor') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="zona1">Indoor</label>

                        <input class="form-check-input" type="radio" name="area" id="zona2" value="outdoor" <?= ($meja['Area'] == 'outdoor') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="zona2">Outdoor</label>

                        <input class="form-check-input" type="radio" name="area" id="zona3" value="VIP" <?= ($meja['Area'] == 'VIP') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="zona3">VIP</label>
                    </div>
                </div>

                <div class="status">
                    <label class="form-label">Status Meja</label>
                    <select class="form-select" name="status" required>
                        <option value="Tersedia" <?= ($meja['Status'] == 'Tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                        <option value="Tidak Tersedia" <?= ($meja['Status'] == 'Tidak Tersedia') ? 'selected' : ''; ?>>Tidak Tersedia</option>
                        <option value="Penuh" <?= ($meja['Status'] == 'Penuh') ? 'selected' : ''; ?>>Penuh</option>
                    </select>
                </div>

                <div class="submit">
                    <button type="submit" class="btn btn-success">Update Meja</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>