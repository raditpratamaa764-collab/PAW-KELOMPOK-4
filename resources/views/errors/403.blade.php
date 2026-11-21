<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | Restoran Kelompok 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="navbar navbar-dark" style="background-color: #1d1d1d;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('meja.index') }}">Restoran Kelompok 4</a>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh;">
        <div class="card shadow-sm text-center p-4" style="max-width: 480px; width: 100%;">
            <div class="card-body">
                <h1 class="display-3 fw-bold text-danger">403</h1>
                <h5 class="card-title mb-3">Akses Ditolak</h5>
                <p class="card-text text-muted mb-4">
                    {{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses untuk membuka halaman ini.' }}
                </p>
                <a href="{{ route('meja.index') }}" class="btn btn-gold">Kembali ke Daftar Meja</a>
            </div>
        </div>
    </div>
</body>
</html>