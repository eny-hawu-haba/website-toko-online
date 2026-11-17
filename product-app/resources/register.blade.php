<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - StyleMart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100 py-4">
    <div class="card shadow border-0 rounded-4 p-4" style="max-width:430px;width:100%">
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color:#ed1760">StyleMart</h2>
            <p class="text-muted">Buat akun baru untuk mulai belanja</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control"
                       minlength="8" required>
                <small class="text-muted">Minimal 8 karakter.</small>
            </div>

            <div class="mb-4">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                       class="form-control" minlength="8" required>
            </div>

            <button type="submit" class="btn text-white w-100"
                    style="background:#ed1760">
                Daftar Sekarang
            </button>
        </form>

        <p class="text-center mt-3 mb-2">
            Sudah punya akun?
            <a href="{{ route('login') }}" style="color:#ed1760">Login</a>
        </p>

        <div class="text-center">
            <a href="{{ route('home') }}" class="text-decoration-none text-secondary">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

</body>
</html>
