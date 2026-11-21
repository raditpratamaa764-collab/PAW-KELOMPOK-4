<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Meja & Area - Restoran Kelompok 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- NAVBAR -->
    <div class="navbar navbar-dark";>
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('meja.index') }}">Restoran Kelompok 4</a>
            
            <div class="d-flex align-items-center">
                @auth
                    @can('tambah-meja')
                        <a href="{{ route('meja.create') }}" class="btn btn-gold btn-sm fw-bold me-2">Tambah Meja</a>
                    @endcan
                    <form action="{{ route('logout') }}" method="POST" class="d-inline mb-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">
                            Logout ({{ Auth::user()->username }})
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-gold btn-sm fw-bold">Login</a>
                @endauth
            </div>
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
                        @auth
                            <th>Aksi</th>
                        @endauth
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
                        @auth
                        <td class="text-center">
                            @can('update', $meja)
                                <a href="{{ route('meja.edit', $meja) }}" class="btn btn-gold btn-sm">Edit</a>
                            @endcan

                            @can('delete', $meja)
                                <form action="{{ route('meja.destroy', $meja) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus meja ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endcan

                            @cannot('update', $meja)
                                @cannot('delete', $meja)
                                    <span class="badge bg-secondary">Terkunci (Meja Penuh)</span>
                                @endcannot
                            @endcannot
                            </td>
                        @endauth
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ Auth::check() ? 6 : 5 }}" class="text-center">Belum ada data meja.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>