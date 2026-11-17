<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StyleMart - Toko Fashion Online</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff5f8;
            color: #333;
        }

        .navbar {
            background: white;
            padding: 16px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,.08);
        }

        .navbar-brand {
            color: #d63384 !important;
            font-size: 27px;
            font-weight: bold;
        }

        .nav-link {
            color: #444 !important;
            font-weight: 600;
            margin-left: 10px;
        }

        .nav-link:hover {
            color: #d63384 !important;
        }

        .hero {
            background: linear-gradient(120deg, #f7a8c9, #d63384);
            color: white;
            text-align: center;
            padding: 65px 15px;
        }

        .hero h1 {
            font-size: 36px;
            font-weight: bold;
        }

        main {
            max-width: 1150px;
            margin: 35px auto;
            padding: 15px;
        }

        .section-title {
            color: #c02670;
            font-weight: bold;
        }

        .product-card {
            background: white;
            border: none;
            border-radius: 14px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 3px 12px rgba(0,0,0,.08);
        }

        .product-image {
            width: 100%;
            height: 230px;
            background: #fce4ec;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .placeholder {
            font-size: 70px;
        }

        .product-info {
            padding: 18px;
        }

        .category {
            color: #d63384;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .price {
            color: #d63384;
            font-size: 19px;
            font-weight: bold;
        }

        .btn-pink {
            background: #d63384;
            color: white;
            border: none;
        }

        .btn-pink:hover {
            background: #b52b70;
            color: white;
        }

        footer {
            background: #d63384;
            color: white;
            text-align: center;
            padding: 22px;
            margin-top: 45px;
        }

        @media(max-width: 576px) {
            .hero h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
    &#9825; EnyMart
</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#menu">
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
                    <a class="nav-link" href="{{ route('promo') }}">Promo</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tentang') }}">Tentang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">Keranjang 🛒</a>
                </li>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                Admin
                            </a>
                        </li>

                        <li class="nav-item">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm mt-1">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endif
                @else
                   <a href="{{ route('login') }}"
   class="btn btn-outline-primary rounded-pill px-3">
    Login Pelanggan
</a>
                @endauth

            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <h1>Temukan Gaya Favoritmu di StyleMart</h1>
    <p>Koleksi pakaian wanita dan pria dengan model modern dan harga terjangkau.</p>
</section>

<main>

    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <h2 class="section-title">Koleksi Produk Terbaru</h2>

        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('products.create') }}" class="btn btn-pink">
                    + Tambah Produk
                </a>
            @endif
        @endauth
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($products->isEmpty())
        <div class="alert alert-info">Belum ada produk tersedia.</div>
    @else

        <div class="row g-4">

            @foreach($products as $product)

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="product-card">

                        <div class="product-image">

                            @if($product->image)
                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                                >
                                <span class="placeholder" style="display:none">👚</span>
                            @else
                                <span class="placeholder">👚</span>
                            @endif

                        </div>

                        <div class="product-info">

                            <span class="category">{{ $product->category }}</span>

                            <h5 class="mt-2">{{ $product->name }}</h5>

                            <p class="text-muted small">
                                {{ $product->description }}
                            </p>

                            <p class="price">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </p>

                            <p class="small text-muted">
                                Stok: {{ $product->stock }}
                            </p>

                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-pink w-100">
                                    + Keranjang
                                </button>
                            </form>

                        </div>
                    </div>

                </div>

            @endforeach

        </div>

    @endif

</main>

<footer>
    <strong>StyleMart</strong>
    <p class="mb-0">Gaya Pilihanmu - Belanja Fashion Lebih Mudah</p>
    <small>&copy; 2026 StyleMart. Semua hak dilindungi.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
