<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <nav class="navbar navbar-dark" style="background-color: #1d1d1d;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Daftar Pegawai Kelompok 4</a>
        </div>
    </nav>

    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm p-4">
            <h3 class="fw-bold mb-3 border-bottom pb-2">Edit Pegawai</h3>

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('tambah.update', $tambah->No) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama:</label>
                    <input type="text" class="form-control" name="nama" 
                           value="{{ old('nama', $tambah->Nama) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jabatan Kerja:</label>
                    <select class="form-select" name="jabatan" required>
                        <option value="" disabled>Pilih Jabatan Kerja...</option>
                        <option value="Chef" @selected($tambah->Jabatan == 'Chef')>Chef</option>
                        <option value="Waiters" @selected($tambah->Jabatan == 'Waiters')>Waiters</option>
                        <option value="Cashier" @selected($tambah->Jabatan == 'Cashier')>Cashier</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">No. Telpon:</label>
                    <input type="text" class="form-control" name="nomor" 
                           value="{{ old('nomor', $tambah->Nomor) }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('tambah.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
