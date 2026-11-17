<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - EnyMart</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff1f5;
            color: #333;
        }

        header {
            background: #4a2939;
            padding: 20px;
            color: white;
        }

        .nav {
            max-width: 1100px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        .logo span {
            color: #f1d6df;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 8px;
        }

        nav a:hover {
            color: #f1d6df;
        }

        .hero {
            background: linear-gradient(120deg, #873e61, #b86c8a);
            color: white;
            text-align: center;
            padding: 40px 15px;
        }

        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 15px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: #fff0f5;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 10px #ddd;
        }

        .picture {
            height: 220px;
            background: #f9e3eb;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            font-size: 75px;
        }

        .picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info {
            padding: 18px;
        }

        .tag {
            color: #873e61;
            font-size: 12px;
            font-weight: bold;
        }

        .price {
            color: #704b35;
            font-size: 18px;
            font-weight: bold;
        }

        button {
            background: #873e61;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #4a2939;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .empty {
            background: #fff0f5;
            padding: 30px;
            text-align: center;
            border-radius: 12px;
        }

        footer {
            background: #4a2939;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }

        @media(max-width: 800px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 540px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="nav">
        <a href="{{ route('home') }}" class="logo">
            Style<span>Mart</span>
        </a>

        <nav>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('products.index') }}">Produk</a>
            <a href="{{ route('kategori') }}">Kategori</a>
            <a href="{{ route('promo') }}">Promo</a>
            <a href="{{ route('tentang') }}">Tentang</a>
            <a href="{{ route('cart.index') }}">Keranjang 🛒</a>
        </nav>
    </div>
</header>

<section class="hero">
    <h1>Produk Terbaru EnyMart</h1>
    <p>Temukan pakaian favoritmu dengan harga bersahabat.</p>
</section>

<main>

    <h2>Semua Produk</h2>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if($products->isEmpty())

        <div class="empty">
            <h3>Belum Ada Produk</h3>
            <p>Silakan tambahkan produk melalui halaman admin.</p>
        </div>

    @else

        <div class="grid">

            @foreach($products as $product)

                <article class="card">

                    <div class="picture">

                        @if($product->image)
                            <img
                                src="{{ $product->image_url }}"
                                alt="{{ $product->name }}"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                            >
                            <span style="display:none;">👚</span>
                        @else
                            👚
                        @endif

                    </div>

                    <div class="info">

                        <span class="tag">
                            {{ strtoupper($product->category) }}
                        </span>

                        <h3>{{ $product->name }}</h3>

                        <p>
                            {{ $product->description }}
                        </p>

                        <div class="price-row">

                            <span class="price">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </span>

                            <span>
                                <small>Stok: {{ $product->stock }}</small>
                            </span>

                        </div>

                        <br>

                        <form action="{{ route('cart.add', $product->id) }}"
                              method="POST">
                            @csrf

                            <button type="submit">
                                + Keranjang
                            </button>
                        </form>

                    </div>

                </article>

            @endforeach

        </div>

    @endif

</main>

<footer>
    &copy; 2026 EnyMart. Semua hak dilindungi.
</footer>

</body>
</html>
