<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kategori - StyleMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #fff8fb;
            color: #49303c;
        }

        .navbar {
            background: white;
            padding: 17px 0;
            box-shadow: 0 3px 15px rgba(0,0,0,.05);
        }

        .navbar-brand {
            color: #d94f88;
            font-size: 26px;
            font-weight: 800;
        }

        .nav-link {
            color: #55434c;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #d94f88;
        }

        .banner {
            background: linear-gradient(120deg, #ffe1ed, #fff1f7);
            padding: 75px 15px;
            text-align: center;
            border-radius: 0 0 40px 40px;
        }

        .banner h1 {
            font-size: 42px;
            font-weight: 800;
        }

        .banner h1 span {
            color: #d94f88;
        }

        .banner p {
            color: #806b76;
            margin-top: 15px;
        }

        .section-title {
            font-weight: 800;
            color: #49303c;
        }

        .category-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
            transition: .3s;
        }

        .category-card:hover {
            transform: translateY(-7px);
        }

        .category-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .image-placeholder {
            height: 250px;
            background: #ffe5ef;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 75px;
        }

        .category-info {
            padding: 22px;
            text-align: center;
        }

        .category-number {
            color: #d94f88;
            font-size: 12px;
            font-weight: 700;
        }

        .category-info h5 {
            font-size: 20px;
            font-weight: 700;
            margin: 10px 0;
        }

        .btn-pink {
            background: #e879a5;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 23px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }

        .btn-pink:hover {
            background: #d94f88;
            color: white;
        }

        footer {
            background: #392b34;
            color: white;
            padding: 40px 0 20px;
            margin-top: 70px;
            text-align: center;
        }

        footer h4 {
            color: #ff9fc4;
            font-weight: 800;
        }

        footer p {
            color: #d5c7ce;
        }

        @media(max-width: 768px) {
            .banner h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <a class="navbar-brand text-decoration-none"
           href="{{ route('home') }}">
            ♡ StyleMart
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('kategori') }}">Kategori</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/promo') }}">Promo</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/tentang') }}">Tentang Kami</a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<!-- BANNER -->
<section class="banner">
    <div class="container">
        <h1>Koleksi <span>Kategori</span></h1>

        <p>
            Temukan berbagai pilihan fashion favoritmu
            hanya di StyleMart.
        </p>
    </div>
</section>

<!-- DAFTAR KATEGORI -->
<section class="container py-5">

    <div class="text-center mb-5">
        <h2 class="section-title">Jelajahi Kategori</h2>
        <p class="text-muted">
            Pilih kategori fashion yang kamu sukai
        </p>
    </div>

    <div class="row g-4">

        @forelse($categories as $index => $category)

            <div class="col-12 col-sm-6 col-lg-4">

                <div class="category-card">

                    @if(!empty($category['image']))
                        <img
                            src="{{ asset('storage/' . $category['image']) }}"
                            class="category-img"
                            alt="{{ $category['name'] }}">
                    @else
                        <div class="image-placeholder">
                            👗
                        </div>
                    @endif

                    <div class="category-info">

                        <div class="category-number">
                            COLLECTION {{ $index + 1 }}
                        </div>

                        <h5>{{ $category['name'] }}</h5>

                        <p class="text-muted">
                            {{ $category['count'] }} Produk
                        </p>

                        <a href="{{ route('products.index', ['category' => $category['name']]) }}"
                           class="btn-pink">
                            Lihat Produk →
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">
                <div class="text-center bg-white p-5 rounded-4">
                    <h4>Belum Ada Kategori</h4>
                    <p class="text-muted">
                        Silakan tambahkan produk terlebih dahulu.
                    </p>
                </div>
            </div>

        @endforelse

    </div>

</section>

<!-- FOOTER -->
<footer>
    <div class="container">
        <h4>♡ StyleMart</h4>
        <p>Fashion Pilihanmu, Gaya Terbaikmu.</p>
        <p>© {{ date('Y') }} StyleMart. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
