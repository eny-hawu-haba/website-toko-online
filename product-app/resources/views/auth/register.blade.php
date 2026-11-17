<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - EnyMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f9e3eb, #fffafa 55%, #f7e6ea);
            min-height: 100vh;
        }

        .navbar-style {
            background: linear-gradient(120deg, #4a2939, #873e61);
        }

        .register-card {
            border: none;
            border-radius: 18px;
            background: #fff0f5;
        }

        .brand-icon {
            width: 80px;
            height: 80px;
            background: #f9e3eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: auto;
        }

        .btn-style {
            background: #873e61;
            color: white;
            border: none;
        }

        .btn-style:hover {
            background: #6b304d;
            color: white;
        }

        .text-style {
            color: #873e61;
        }

        .password-toggle {
            min-width: 100px;
        }
    </style>
</head>

<body>

<nav class="navbar-style shadow-sm">

    <div class="container py-3">

        <a href="{{ route('home') }}"
           class="text-white text-decoration-none fw-bold fs-4">

            👗 EnyMart

        </a>

    </div>

</nav>


<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card register-card shadow-sm mt-5">

                <div class="card-body p-4">

                    <div class="brand-icon">
                        👗
                    </div>

                    <h3 class="text-center fw-bold mt-3">
                        Buat Akun
                    </h3>

                    <p class="text-center text-muted">
                        Daftar menjadi member EnyMart
                    </p>


                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form action="{{ route('register.process') }}"
                          method="POST">

                        @csrf


                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Nama Lengkap
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name') }}"
                                   placeholder="Masukkan nama lengkap"
                                   required>

                        </div>


                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email') }}"
                                   placeholder="Masukkan email"
                                   required>

                        </div>


                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Password
                            </label>

                            <div class="input-group">
                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       placeholder="Minimal 8 karakter"
                                       autocomplete="new-password"
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


                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Konfirmasi Password
                            </label>

                            <div class="input-group">
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control"
                                       placeholder="Ulangi password"
                                       autocomplete="new-password"
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


                        <button type="submit"
                                class="btn btn-style w-100 py-2 fw-bold">

                            ✨ Daftar Sekarang

                        </button>

                    </form>


                    <div class="text-center mt-4">

                        <span class="text-muted">
                            Sudah punya akun?
                        </span>

                        <a href="{{ route('login') }}"
                           class="text-style fw-bold text-decoration-none">

                            Login

                        </a>

                    </div>


                    <div class="text-center mt-3">

                        <a href="{{ route('home') }}"
                           class="text-muted text-decoration-none">

                            ← Kembali ke EnyMart

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<footer class="text-center text-muted py-4 mt-4">

    <small>
        © {{ date('Y') }} EnyMart.
        Semua Hak Dilindungi.
    </small>

</footer>

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