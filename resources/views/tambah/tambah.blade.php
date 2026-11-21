<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <nav class="navbar navbar-dark" style="background-color: #1d1d1d;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('tambah.index') }}">Daftar Pegawai Kelompok 4</a>
        </div>
    </nav>

    <div class="container mt-5" style="max-width: 600px;">
        <h2 class="text-center mb-4">Form Tambah Pegawai</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tambah.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Jabatan Kerja:</label>
                <select name="jabatan" class="form-select" required>
                    <option value="" disabled selected>Pilih Jabatan Kerja...</option>
                    <option value="Chef">Chef</option>
                    <option value="Waiters">Waiters</option>
                    <option value="Cashier">Cashier</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">No. Telpon:</label>
                <input type="text" name="nomor" class="form-control" placeholder="Masukkan Nomor" value="{{ old('nomor') }}" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('tambah.daftar') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>