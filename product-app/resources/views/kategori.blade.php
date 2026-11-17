<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kategori Produk - Stylmart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #fff1f5;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #4a2939;
        }

        .navbar-brand {
            color: #f1d6df !important;
            font-weight: bold;
            font-size: 25px;
        }

        .category-card {
            border: none;
            border-radius: 15px;
            padding: 25px 10px;
            height: 100%;
            transition: 0.3s;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .category-icon {
            font-size: 50px;
        }

        .category-link {
            text-decoration: none;
            color: #3b2631;
        }

        .category-link:hover {
            color: #873e61;
        }

        footer {
            background-color: #4a2939;
            color: white;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            Stylmart
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarStylmart"
                aria-controls="navbarStylmart"
                aria-expanded="false"
                aria-label="Buka menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarStylmart">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('kategori') }}">
                        Kategori
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">
                        Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('promo') }}">
                        Promo
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tentang') }}">
                        Tentang Kami
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kontak') }}">
                        Kontak
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        🛒 Keranjang
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- JUDUL -->
<header class="container text-center py-5">
    <h1 class="fw-bold">Kategori Produk</h1>

    <p class="text-secondary">
        Temukan pakaian dan aksesori favoritmu di Stylmart.
    </p>
</header>

<!-- DAFTAR KATEGORI -->
<main class="container pb-5">

    <div class="row g-4">

        <div class="col-6 col-md-4 col-lg-3">
            <a class="category-link"
               href="{{ route('products.index', ['category' => 'Atasan']) }}">
                <div class="card category-card text-center">
                    <div class="category-icon">👕</div>
                    <h5 class="mt-3">Atasan</h5>
                    <p class="text-secondary mb-0">Kaos dan kemeja</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <a class="category-link"
               href="{{ route('products.index', ['category' => 'Dress']) }}">
                <div class="card category-card text-center">
                    <div class="category-icon">👗</div>
                    <h5 class="mt-3">Dress</h5>
                    <p class="text-secondary mb-0">Dress wanita</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <a class="category-link"
               href="{{ route('products.index', ['category' => 'Celana']) }}">
                <div class="card category-card text-center">
                    <div class="category-icon">👖</div>
                    <h5 class="mt-3">Celana</h5>
                    <p class="text-secondary mb-0">Berbagai model celana</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <a class="category-link"
               href="{{ route('products.index', ['category' => 'Jaket']) }}">
                <div class="card category-card text-center">
                    <div class="category-icon">🧥</div>
                    <h5 class="mt-3">Jaket</h5>
                    <p class="text-secondary mb-0">Jaket dan outer</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <a class="category-link"
               href="{{ route('products.index', ['category' => 'Sepatu']) }}">
                <div class="card category-card text-center">
                    <div class="category-icon">👟</div>
                    <h5 class="mt-3">Sepatu</h5>
                    <p class="text-secondary mb-0">Alas kaki pilihan</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
            <a class="category-link"
               href="{{ route('products.index', ['category' => 'Aksesoris']) }}">
                <div class="card category-card text-center">
                    <div class="category-icon">👜</div>
                    <h5 class="mt-3">Aksesoris</h5>
                    <p class="text-secondary mb-0">Tas dan aksesori gaya</p>
                </div>
            </a>
        </div>

    </div>

</main>

<!-- FOOTER -->
<footer class="text-center py-4">
    <p class="mb-1">© {{ date('Y') }} Stylmart</p>
    <small>Belanja pakaian favoritmu dengan mudah.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
