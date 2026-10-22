<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('meja.index') }}">Restoran Kelompok 4</a>
        </div>
    </div>

    <div class="container text-dark">
        <div class="area-input mx-auto" style="max-width: 550px">
            <h4 class="heading mb-4">Edit Master Meja</h4>

            @if ($errors->any())
                <div class="alert alert-danger">Pastikan semua field terisi dengan benar.</div>
            @endif

            <form action="{{ route('meja.update', $meja->Nomor_Meja) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Nomor Meja</label>
                    <input type="text" class="form-control" name="nomor_meja" value="{{ $meja->Nomor_Meja }}" readonly>
                    <small class="text-muted">Nomor meja tidak dapat diubah.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kapasitas Kursi</label>
                    <select class="form-select" name="Kapasitas" required>
                        <option value="2" {{ $meja->Kapasitas == '2' ? 'selected' : '' }}>2 Kursi</option>
                        <option value="4" {{ $meja->Kapasitas == '4' ? 'selected' : '' }}>4 Kursi</option>
                        <option value="6" {{ $meja->Kapasitas == '6' ? 'selected' : '' }}>6 Kursi</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Area</label>
                    <div style="display: flex; gap: 10px;">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="area" id="zona1" value="indoor" {{ $meja->Area == 'indoor' ? 'checked' : '' }}>
                            <label class="form-check-label" for="zona1">Indoor</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="area" id="zona2" value="outdoor" {{ $meja->Area == 'outdoor' ? 'checked' : '' }}>
                            <label class="form-check-label" for="zona2">Outdoor</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="area" id="zona3" value="VIP" {{ $meja->Area == 'VIP' ? 'checked' : '' }}>
                            <label class="form-check-label" for="zona3">VIP</label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status Meja</label>
                    <select class="form-select" name="status" required>
                        <option value="Tersedia" {{ $meja->Status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Tidak Tersedia" {{ $meja->Status == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                        <option value="Penuh" {{ $meja->Status == 'Penuh' ? 'selected' : '' }}>Penuh</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Update Meja</button>
                    <a href="{{ route('meja.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>