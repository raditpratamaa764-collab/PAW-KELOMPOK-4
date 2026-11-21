<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Restoran Kelompok 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container w-100">
        <a class="navbar-brand fw-bold" href="{{ url('/meja') }}">Restoran Kelompok 4</a>
    </div>
    </nav>

    <!-- FORM LOGIN -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card card-custom p-4 border-0 my-0">
                        <h2 class="h4 fw-bold mb-3 border-bottom pb-2">Login Petugas</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger py-2">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger py-2">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('login.proses') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="username" class="form-label fw-semibold">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>

                            <button type="submit" class="btn btn-gold w-100 py-2">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>