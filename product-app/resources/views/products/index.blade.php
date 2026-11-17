<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produk - EnyMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #fff1f5;
            color: #3b2631;
        }

        .navbar {
            background: #fff0f5;
            padding: 17px 0;
            box-shadow: 0 3px 15px rgba(0,0,0,.05);
        }

        .navbar > .container {
            flex-direction: column;
        }

        .navbar-header {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .navbar-brand {
            color: #873e61;
            font-size: 26px;
            font-weight: 800;
        }

        .navbar-collapse {
            width: 100%;
            flex-direction: column;
            align-items: center;
        }

        .navbar-nav {
            flex-direction: column;
            align-items: center;
        }

        .nav-link {
            color: #59434d;
            font-weight: 500;
            margin: 0;
            padding: 6px 8px;
        }

        .navbar-actions {
            flex-wrap: nowrap;
            justify-content: center;
            margin-top: 8px;
        }

        .nav-link:hover {
            color: #a44f76;
        }

        .btn-pink {
            background: #b86c8a;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 22px;
            font-weight: 600;
        }

        .btn-pink:hover {
            background: #873e61;
            color: white;
        }

        .page-banner {
            background: linear-gradient(120deg, #f9e3eb, #fff0f4);
            padding: 65px 0;
            text-align: center;
            border-radius: 0 0 45px 45px;
        }

        .page-banner h1 {
            font-weight: 800;
            font-size: 40px;
            color: #3b2631;
        }

        .page-banner span {
            color: #873e61;
        }

        .page-banner p {
            color: #735d67;
        }

        .section-title {
            font-weight: 800;
            color: #3b2631;
        }

        .filter-box {
            background: #fde7ef;
            padding: 22px;
            border-radius: 18px;
            box-shadow: 0 4px 18px rgba(0,0,0,.04);
        }

        .form-select {
            border-radius: 25px;
            padding: 11px 15px;
            border-color: #efd1dc;
        }

        .product-card {
            height: 100%;
            background: #fff0f5;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);
            transition: .3s;
        }

        .product-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 12px 25px rgba(220,100,150,.15);
        }

        .product-img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            background: #f9e3eb;
        }

        .product-info {
            padding: 18px;
        }

        .category {
            display: inline-block;
            background: #f9e3eb;
            color: #873e61;
            font-size: 11px;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .product-name {
            font-size: 16px;
            font-weight: 700;
            margin-top: 13px;
            min-height: 24px;
        }

        .price {
            color: #873e61;
            font-weight: 800;
            font-size: 19px;
            margin: 10px 0;
        }

        .stock {
            color: #88747d;
            font-size: 12px;
        }

        .empty-box {
            background: #fff0f5;
            border-radius: 20px;
            padding: 55px 20px;
            text-align: center;
        }

        footer {
            background: #4a2939;
            color: white;
            padding: 40px 0 20px;
            margin-top: 70px;
        }

        footer h4 {
            color: #f1d6df;
            font-weight: 800;
        }

        footer p {
            color: #eadde2;
            font-size: 14px;
        }

        @media(max-width: 768px) {
            .page-banner h1 {
                font-size: 30px;
            }

            .product-img {
                height: 190px;
            }
        }

        @media(min-width: 992px) {
            .navbar-collapse {
                display: flex !important;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand text-decoration-none" href="{{ route('home') }}">
                &#9825; EnyMart
            </a>

            <button class="navbar-toggler position-absolute end-0" type="button"
                    data-bs-toggle="collapse" data-bs-target="#menu"
                    aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

<div class="collapse navbar-collapse" id="menu">

    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Beranda</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('promo') }}">Promo</a>
        </li>
    </ul>

    <div class="navbar-actions d-flex align-items-center gap-2">

        <a href="{{ route('cart.index') }}" class="btn btn-pink">
            Keranjang
        </a>

        <a href="{{ route('login') }}"
           class="btn btn-pink rounded-pill px-3">
            Login
        </a>

    </div>

</div>
</nav>

<section class="page-banner">
<div class="container">
        <h1>Our <span>Fashion Collection</span></h1>

        <p class="mt-3 mb-0">
            Temukan koleksi fashion favoritmu hanya di EnyMart.
        </p>

    </div>
</section>


<!-- DAFTAR PRODUK -->
<section class="container py-5">

    <div class="text-center mb-4">
        <h2 class="section-title">Koleksi Produk Kami</h2>
        <p class="text-muted">
            Pilihan pakaian terbaik untuk gaya sehari-harimu.
        </p>
    </div>


    <!-- FILTER KATEGORI -->
    <div class="filter-box mb-5">

        <form action="{{ route('products.index') }}" method="GET">

            <div class="row align-items-center g-3">

                <div class="col-md-4">
                    <h6 class="fw-bold mb-0">
                        Temukan Produk Favoritmu &#9825;
                    </h6>
                </div>

                <div class="col-md-5">

                    <select name="category" class="form-select"
                            onchange="this.form.submit()">

                        <option value="">Semua Kategori</option>

                        @foreach($products->pluck('category')->filter()->unique() as $category)
                            <option value="{{ $category }}"
                                {{ request('category') == $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="col-md-3">
                    <a href="{{ route('products.index') }}"
                       class="btn btn-outline-danger rounded-pill w-100">
                        Reset Filter
                    </a>
                </div>

            </div>

        </form>

    </div>


    <!-- PRODUK -->
    <div class="row g-4">

        @forelse($products as $product)

            <div class="col-6 col-md-4 col-lg-3">

                <div class="product-card">

                    @if($product->image)
                        <img
                           src="{{ $product->image_url }}"
                            alt="{{ $product->name }}"
                            class="product-img">
                    @else
                        <div class="product-img d-flex justify-content-center align-items-center">
                            <span style="font-size:60px">ðŸ‘—</span>
                        </div>
                    @endif

                    <div class="product-info">

                        <span class="category">
                            {{ $product->category }}
                        </span>

                        <h6 class="product-name">
                            {{ $product->name }}
                        </h6>

                        <p class="text-muted small mb-1">
                            {{ \Illuminate\Support\Str::limit($product->description, 55) }}
                        </p>

                        <div class="price">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>

                        <div class="stock mb-3">
                            Stok tersedia: {{ $product->stock }}
                        </div>

                        @if($product->stock > 0)

                            <form action="{{ route('cart.add', $product->id) }}"
                                  method="POST">
                                @csrf

                                <button type="submit"
                                        class="btn btn-pink w-100">
                                   &#128722; Tambah Keranjang
                                </button>
                            </form>

                        @else

                            <button class="btn btn-secondary w-100" disabled>
                                Stok Habis
                            </button>

                        @endif

                    </div>
                </div>

            </div>

        @empty

            <div class="col-12">
                <div class="empty-box">
                    <div style="font-size:55px">ðŸ›ï¸</div>

                    <h5 class="fw-bold mt-3">
                        Produk Belum Tersedia
                    </h5>

                    <p class="text-muted">
                        Belum ada produk dalam kategori ini.
                    </p>

                    <a href="{{ route('products.index') }}"
                       class="btn btn-pink">
                        Lihat Semua Produk
                    </a>
                </div>
            </div>

        @endforelse

    </div>

</section>


<!-- FOOTER -->
<footer>
    <div class="container">

        <div class="row g-4">

            <div class="col-md-5">
                <h4>&#9825; EnyMart</h4>

                <p class="mt-3">
                    Temukan gaya terbaikmu bersama koleksi
                    fashion pilihan dari EnyMart.
                </p>
            </div>

            <div class="col-md-3">
                <h6 class="fw-bold">Menu</h6>

                <p><a href="{{ route('home') }}" class="text-white text-decoration-none">Beranda</a></p>

                <p><a href="{{ route('products.index') }}" class="text-white text-decoration-none">Produk</a></p>

                <p><a href="{{ url('/promo') }}" class="text-white text-decoration-none">Promo</a></p>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold">Hubungi Kami</h6>
                <p>EnyMart Fashion Store</p>
                <p>Fashion pilihanmu, gaya percaya dirimu.</p>
            </div>

        </div>

        <hr>

        <div class="text-center">
            <p class="mb-0">
                Â© {{ date('Y') }} EnyMart. All Rights Reserved.
            </p>
        </div>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
