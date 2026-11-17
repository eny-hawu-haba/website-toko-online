<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EnyMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4a2939, #a44f76 58%, #e8b5c6);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .login-card {
            background: #fff0f5;
            width: 100%;
            max-width: 420px;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,.2);
        }

        .brand {
            color: #873e61;
            font-weight: 800;
            font-size: 28px;
        }

        .btn-login {
            background: #873e61;
            color: white;
            border: none;
        }

        .btn-login:hover {
            background: #6b304d;
            color: white;
        }

        .password-toggle {
            min-width: 82px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="text-center mb-4">
        <h2 class="brand">ENYMART</h2>
        <h5 class="fw-bold mt-3">Selamat Datang!</h5>
        <p class="text-muted">Silakan login ke akun Anda.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Masukkan email"
                   value="{{ old('email') }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <div class="input-group">
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Masukkan password"
                       autocomplete="current-password"
                       required>
                <button type="button"
                        class="btn btn-outline-secondary password-toggle"
                        data-password-toggle
                        aria-label="Lihat password"
                        aria-pressed="false">
                    Lihat
                </button>
            </div>
        </div>

        <button type="submit" class="btn btn-login w-100 py-2">
            Login
        </button>
    </form>

    <div class="text-center mt-4">
        <p class="mb-1">
            Belum punya akun? Daftar akun terlebih dahulu.
            <a href="{{ route('register') }}">Daftar akun</a>
        </p>

        <a href="{{ route('home') }}" class="text-decoration-none">
            ← Kembali ke Beranda
        </a>
    </div>

</div>

<script>
    document.querySelectorAll('[data-password-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const passwordInput = button.parentElement.querySelector('input');
            const isVisible = passwordInput.type === 'text';

            passwordInput.type = isVisible ? 'password' : 'text';
            button.textContent = isVisible ? 'Lihat' : 'Sembunyikan';
            button.setAttribute('aria-label', isVisible ? 'Lihat password' : 'Sembunyikan password');
            button.setAttribute('aria-pressed', String(!isVisible));
        });
    });
</script>

</body>
</html>
