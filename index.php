<?php
include 'koneksi.php';

$query = "SELECT * FROM menu";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Makan Radit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Rumah Makan Radit</a>
    </div>
</nav>

<div class="container py-5">
    <h2 class="mb-4">Daftar Menu</h2>

    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Menu</a>

    <?php if (isset($_GET['pesan'])): ?>
        <div class="alert alert-success">
            Data berhasil diproses.
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Status Halal</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;

                if ($result && mysqli_num_rows($result) > 0):
                    while ($menu = mysqli_fetch_assoc($result)):
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($menu['nama_menu']); ?></td>
                        <td><?= htmlspecialchars($menu['kategori']); ?></td>
                        <td><?= htmlspecialchars($menu['deskripsi']); ?></td>
                        <td><?= htmlspecialchars($menu['status_halal']); ?></td>
                        <td>Rp<?= number_format($menu['harga'], 0, ',', '.'); ?></td>
                        <td>
                            <a href="edit.php?id=<?= $menu['id']; ?>"
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="hapus.php" method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                <input type="hidden" name="id"
                                       value="<?= $menu['id']; ?>">
                                <button type="submit"
                                        class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                    endwhile;
                else:
                ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Belum ada data menu.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>      
</body>
</html>