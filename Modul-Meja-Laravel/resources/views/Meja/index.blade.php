<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Meja & Area - Restoran Kelompok 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- NAVBAR -->
    <div class="navbar navbar-dark" style="background-color: #1d1d1d;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('meja.index') }}">Restoran Kelompok 4</a>
            <a href="{{ route('meja.create') }}" class="btn btn-warning btn-sm fw-bold">Tambah Meja</a>
        </div>
    </div>

    <!-- DAFTAR MEJA -->
    <div class="container mt-4 text-dark">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_meja as $meja)
                    <tr class="text-center align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $meja->Nomor_Meja }}</td>
                        <td>{{ $meja->Kapasitas }} orang</td>
                        <td>{{ $meja->Area }}</td>
                        <td>
                            <span class="badge {{ $meja->Status == 'Tersedia' ? 'bg-success' : ($meja->Status == 'Penuh' ? 'bg-danger' : 'bg-secondary') }}">
                                {{ $meja->Status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('meja.edit', $meja->Nomor_Meja) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <form action="{{ route('meja.destroy', $meja->Nomor_Meja) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus meja ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data meja.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>