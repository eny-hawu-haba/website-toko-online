<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnyMart - Fashion Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --pink: #b86c8a;
            --dark-pink: #873e61;
            --light-pink: #f9e3eb;
            --text: #3b2631;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #fff1f5;
            color: var(--text);
        }

        /* NAVBAR */
        .navbar {
            background: #fff0f5;
            padding: 17px 0;
            box-shadow: 0 3px 18px rgba(0,0,0,.05);
        }

        .navbar-brand {
            color: var(--dark-pink) !important;
            font-size: 27px;
            font-weight: 800;
        }

        .navbar-nav .nav-link {
            color: #59434d;
            font-weight: 500;
            margin: 0 9px;
        }

        .navbar-nav .nav-link:hover {
            color: var(--dark-pink);
        }

        .btn-pink {
            background: var(--pink);
            color: white;
            border-radius: 30px;
            padding: 10px 23px;
            border: none;
            font-weight: 600;
        }

        .btn-pink:hover {
            background: var(--dark-pink);
            color: white;
        }

        /* HERO */
        .hero {
            min-height: 510px;
            display: flex;
            align-items: center;
            background: linear-gradient(90deg, rgba(255,241,245,.96), rgba(255,241,245,.68)),
            url('https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=1600&q=85');
            background-position: center;
            background-size: cover;
            border-radius: 0 0 55px 55px;
        }

        .hero-content {
            padding: 75px 0;
        }

        .hero h1 {
            font-size: clamp(35px, 5vw, 57px);
            font-weight: 800;
            line-height: 1.25;
            color: #3b2631;
        }

        .hero h1 span {
            color: var(--dark-pink);
        }

        .hero p {
            color: #735d67;
            font-size: 16px;
            line-height: 1.9;
            max-width: 520px;
            margin: 20px 0 27px;
        }

        .hero-tag {
            color: var(--dark-pink);
            font-weight: 700;
            letter-spacing: 2px;
        }

        /* SECTION */
        .section-title {
            font-weight: 800;
            color: #3b2631;
            text-align: center;
            margin-bottom: 10px;
        }

        .section-desc {
            color: #88747d;
            text-align: center;
            margin-bottom: 38px;
        }

        /* CATEGORY */
        .category-card {
            background: #fff0f5;
            border-radius: 18px;
            padding: 27px 12px;
            text-align: center;
            text-decoration: none;
            color: #4a3540;
            display: block;
            box-shadow: 0 5px 20px rgba(0,0,0,.04);
            transition: .3s;
            height: 100%;
        }

        .category-card:hover {
            transform: translateY(-7px);
            background: var(--light-pink);
            color: var(--dark-pink);
        }

        .category-icon {
            font-size: 37px;
            margin-bottom: 12px;
        }

        .category-card h6 {
            font-weight: 600;
            margin: 0;
        }

        /* PROMO */
        .promo {
            background: linear-gradient(120deg, #873e61, #b86c8a);
            padding: 45px;
            border-radius: 25px;
            color: white;
        }

        .promo h2 {
            font-weight: 800;
        }

        .btn-white {
            display: inline-block;
            background: #fff0f5;
            color: var(--dark-pink);
            text-decoration: none;
            border-radius: 30px;
            padding: 11px 25px;
            font-weight: 700;
        }

        /* PRODUCTS */
        .product-card {
            background: #fff0f5;
            border-radius: 18px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 5px 22px rgba(0,0,0,.05);
            transition: .3s;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(135,62,97,.16);
        }

        .product-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background: #f9e3eb;
        }

        .product-info {
            padding: 17px;
        }

        .category-badge {
            display: inline-block;
            background: #f9e3eb;
            color: #873e61;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .product-name {
            font-size: 15px;
            font-weight: 700;
            margin-top: 12px;
            color: #3b2631;
        }

        .product-price {
            color: var(--dark-pink);
            font-size: 18px;
            font-weight: 800;
        }

        .product-stock {
            color: #88747d;
            font-size: 12px;
        }

        /* FOOTER */
        footer {
            background: #4a2939;
            color: white;
            padding: 45px 0 20px;
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
            .hero {
                min-height: 430px;
            }

            .hero-content {
                padding: 55px 15px;
            }

            .promo {
                padding: 30px 22px;
            }

            .product-img {
                height: 190px;
            }
        }
    </style>
</head>

<body>


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

<div class="d-flex gap-2 align-items-center flex-wrap">

    <a href="{{ route('cart.index') }}" class="btn btn-pink">
        Keranjang
    </a>

    @auth
        <span class="small fw-semibold">
            Halo, {{ Auth::user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-pink" type="submit">
                Logout
            </button>
        </form>
    @else
        <a href="{{ route('login') }}" class="btn btn-pink">
            Login
        </a>
    @endauth

</div>
            </div>
        </div>
    </div>
</nav>


<!-- HERO BANNER -->
<section class="hero">
    <div class="container">
        <div class="hero-content">

            <div class="hero-tag">WELCOME TO ENYMART</div>

            <h1>
                Temukan Gaya <br>
                <span>Terbaikmu!</span>
            </h1>

            <p>
                Tampil percaya diri dengan koleksi fashion terbaru.
                Temukan berbagai pilihan pakaian cantik, modern,
                dan nyaman hanya di EnyMart.
            </p>

            <a href="{{ route('products.index') }}" class="btn btn-pink">
                Belanja Sekarang →
            </a>

        </div>
    </div>
</section>


    <h2 class="section-title">Kategori Fashion</h2>
    <p class="section-desc">
        Temukan berbagai pilihan fashion favoritmu
    </p>

    <div class="row g-3">

        @php
            
$categories = [
    ["\u{1F457}", 'Fashion Wanita'],
    ["\u{1F454}", 'Fashion Pria'],
    ["\u{1F483}", 'Dress'],
    ["\u{1F45A}", 'Kemeja'],
];

        @endphp

        @foreach($categories as $category)
            <div class="col-6 col-md-3">
                <a href="{{ route('products.index') }}"
                   class="category-card">
                    <div class="category-icon">{{ $category[0] }}</div>
                    <h6>{{ $category[1] }}</h6>
                </a>
            </div>
        @endforeach

    </div>
</section>


<!-- PROMO -->
<section class="container py-4">

    <div class="promo">
        <div class="row align-items-center">

            <div class="col-md-8">
                <h2>Special Fashion Collection!</h2>

                <p class="mb-0 mt-3">
                    Saatnya tampil lebih stylish dengan koleksi
                    pilihan dari EnyMart.
                </p>
            </div>

            <div class="col-md-4 text-md-end mt-4 mt-md-0">
                <a href="{{ route('products.index') }}" class="btn-white">
                    Lihat Koleksi →
                </a>
            </div>

        </div>
    </div>

</section>


<!-- PRODUK TERBARU -->
<section class="container py-5">

    <h2 class="section-title">Produk Terbaru</h2>

    <p class="section-desc">
        Pilihan fashion menarik untuk melengkapi penampilanmu
    </p>

    <div class="row g-4">

        @forelse($products as $product)

            <div class="col-6 col-md-4 col-lg-3">

                <div class="product-card">

                    <a href="{{ route('products.show', $product->id) }}">
                        @if($product->image)
                            <img
                                src="{{ $product->image_url }}"
                                class="product-img"
                                alt="{{ $product->name }}">
                        @else
                            <div class="product-img d-flex align-items-center justify-content-center">
                                <span class="text-muted">Tidak ada foto</span>
                            </div>
                        @endif
                    </a>

                    <div class="product-info">

                        <span class="category-badge">
                            {{ $product->category }}
                        </span>

                        <h6 class="product-name">
                            {{ $product->name }}
                        </h6>

                        <p class="small text-muted mb-2">
                            {{ \Illuminate\Support\Str::limit($product->description, 65) }}
                        </p>

                        <div class="product-price">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>

                        <div class="product-stock mb-3">
                            Stok: {{ $product->stock }}
                        </div>

                        <a href="{{ route('products.show', $product->id) }}"
                           class="btn btn-pink w-100">
                            Lihat Produk
                        </a>

                    </div>
                </div>

            </div>

        @empty

            <div class="col-12 text-center py-5">
                <h5>Belum ada produk tersedia.</h5>
                <p class="text-muted">
                    Silakan tambahkan produk terlebih dahulu.
                </p>
            </div>

        @endforelse

    </div>

    <div class="text-center mt-5">
        <a href="{{ route('products.index') }}"
           class="btn btn-pink px-5">
            Lihat Semua Produk →
        </a>
    </div>

</section>


<!-- FOOTER -->
<footer>
    <div class="container">

        <div class="row g-4">

            <div class="col-md-5">
                <h4>♡ EnyMart</h4>
                <p class="mt-3">
                    Toko fashion online untuk menemukan gaya
                    terbaikmu. Tampil cantik, modern, dan percaya diri.
                </p>
            </div>

            <div class="col-md-3">
                <h6 class="fw-bold">Menu</h6>
                <p><a href="{{ route('home') }}" class="text-white text-decoration-none">Beranda</a></p>
                <p><a href="{{ route('products.index') }}" class="text-white text-decoration-none">Produk</a></p>
                <p><a href="{{ route('cart.index') }}" class="text-white text-decoration-none">Keranjang</a></p>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold">EnyMart</h6>
                <p>Fashion pilihanmu, gaya percaya dirimu.</p>
                <p>Belanja mudah dan nyaman bersama kami.</p>
            </div>

        </div>

        <hr style="border-color:#9c6a7f">

        <div class="text-center">
            <p class="mb-0">
                © {{ date('Y') }} EnyMart. All Rights Reserved.
            </p>
        </div>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
