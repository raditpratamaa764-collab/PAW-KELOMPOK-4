<?php
require 'koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Nomor_Meja =trim( $_POST['nomor_meja']);
        $Kapasitas = trim($_POST['Kapasitas']);
        $Area = trim($_POST['area']);
        $Status = trim($_POST['status']);
        $sql = "INSERT INTO Data_Meja (Nomor_Meja, Kapasitas, Area, Status) 
                VALUES (?,?,?,?)";
        mysqli_execute_query($koneksi, $sql, [$Nomor_Meja, $Kapasitas, $Area, $Status]);

        header("Location: index.php");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Meja</title>
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
            <h4 class="heading">Tambah Master Meja</h4>

        
            <form action="#" method="POST">
                <div class="nomor-meja">
                    <label class="form-label">Nomor Meja</label>
                    <input type="text" class="form-control" name="nomor_meja" placeholder="Masukkan Nomor Meja" required>

                </div>

                
                <div class="kapasitas">
                    <label class="form-label">Kapasitas Kursi</label>
                    <select class="form-select" name="Kapasitas" required>
                        <option value="" disabled selected>Pilih Kapasitas Kursi</option>\
                        <option value="2">2 Kursi</option>
                        <option value="4">4 Kursi</option>
                        <option value="6">6 Kursi</option>
                    </select>
                </div>

                
                <div class="area">
                    <label class="form-label d-block">Area</label>
                    <div class="form-check-inline" style="display: flex; gap: 10px;">
                        <input class="form-check-input" type="radio" name="area" id="zona1" value="indoor" checked>
                        <label class="form-check-label" for="zona1">Indoor</label>
                        <input class="form-check-input" type="radio" name="area" id="zona2" value="outdoor">
                        <label class="form-check-label" for="zona2">Outdoor</label>
                        <input class="form-check-input" type="radio" name="area" id="zona3" value="VIP">
                        <label class="form-check-label" for="zona3">VIP</label>
                    </div>
                </div>

                
                 <div class="status">
                    <label class="form-label">Status Meja</label>
                    <select class="form-select" name="status" required>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                        <option value="Penuh">Penuh</option>
                    </select>
                 </div>

                 
                  <div class="submit">
                    <button type="submit" class="btn btn-success">Simpan Meja</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                  </div>
            </form>
            
        </div>

    </div>
</body>
</html>