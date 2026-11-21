<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai - Kelompok 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1d1d1d;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('tambah.index') }}">Daftar Pegawai Kelompok 4</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        <!-- Tamabah Admin -->
                        @can('kelola-pegawai')
                            <li class="nav-item me-2">
                                <a href="{{ route('tambah.daftar') }}" class="btn btn-success btn-sm">Tambah Pegawai</a>
                            </li>
                        @endcan

                        <!-- Tombol Logout -->
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">
                                    Logout ({{ Auth::user()->username }})
                                </button>
                            </form>
                        </li>
                    @else
                        <!-- Tombol Login -->
                        <li class="nav-item">
                            <a class="btn btn-outline-light btn-sm px-3" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="mb-4">
            <h3 class="fw-bold">Daftar Pegawai Kelompok 4</h3>
            <p class="text-muted">Rekapitulasi data pegawai yang terdaftar di dalam sistem.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive bg-white p-3 border rounded-1 shadow-sm">
            <table class="table table-bordered table-striped align-middle m-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-center" style="width: 5%;">No</th>
                        <th scope="col" style="width: 25%;">Nama</th>
                        <th scope="col" style="width: 25%;">Jabatan Kerja</th>
                        <th scope="col" style="width: 25%;">No. Telpon</th>

                        <!-- Admin only -->
                        @can('kelola-pegawai')
                            <th scope="col" class="text-center" style="width: 20%;">Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($tambah as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->Nama }}</td>
                            <td>{{ $item->Jabatan }}</td>
                            <td>{{ $item->Nomor }}</td>

                            <!-- Edit & Hapus Admin -->
                            @can('kelola-pegawai')
                                <td class="text-center">
                                    <a href="{{ route('tambah.edit', $item->No) }}" class="btn btn-warning btn-sm me-1">Edit</a>

                                    <form action="{{ route('tambah.destroy', $item->No) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->user()?->can('kelola-pegawai') ? 5 : 4 }}" class="text-center text-muted py-4">
                                Belum ada data pegawai yang masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>