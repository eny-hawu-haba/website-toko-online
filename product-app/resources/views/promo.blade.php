<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promo - EnyMart</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #fff1f5;
            color: #3b2631;
        }

        header {
            background: linear-gradient(120deg, #4a2939, #873e61);
            color: white;
            padding: 22px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        header h1 {
            color: #f1d6df;
            font-size: 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 18px;
            font-size: 14px;
        }

        nav a:hover {
            color: #f1d6df;
        }

        .hero {
            background: linear-gradient(120deg, #873e61, #b86c8a);
            color: white;
            text-align: center;
            padding: 65px 20px;
        }

        .hero h2 {
            font-size: 38px;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 17px;
            line-height: 1.5;
        }

        .container {
            padding: 45px 7%;
        }

        .section-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .section-title h2 {
            font-size: 29px;
            margin-bottom: 10px;
            color: #3b2631;
        }

        .section-title p {
            color: #873e61;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 25px;
        }

        .product {
            background: #fff0f5;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 12px #00000012;
            transition: 0.3s;
        }

        .product:hover {
            transform: translateY(-6px);
        }

        .product img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
            background: #f9e3eb;
        }

        .product-info {
            padding: 17px;
        }

        .product-info h3 {
            margin: 10px 0;
            font-size: 18px;
        }

        .price {
            color: #873e61;
            font-size: 19px;
            font-weight: bold;
        }

        .old-price {
            color: #999;
            text-decoration: line-through;
            font-size: 13px;
            margin-left: 5px;
            font-weight: normal;
        }

        .discount {
            display: inline-block;
            background: #f7e6ea;
            color: #704b35;
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 12px;
        }

        .buy-btn {
            display: block;
            text-align: center;
            background: #b86c8a;
            color: white;
            padding: 11px;
            text-decoration: none;
            border-radius: 7px;
            margin-top: 15px;
        }

        .buy-btn:hover {
            background: #873e61;
        }

        footer {
            background: #4a2939;
            color: white;
            text-align: center;
            padding: 22px;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            header {
                justify-content: center;
                text-align: center;
            }

            nav a {
                display: inline-block;
                margin: 7px;
            }

            .hero h2 {
                font-size: 29px;
            }
        }
    </style>
</head>

<body>


<header>
    <h1>♡ EnyMart</h1>

    <nav>
        <a href="{{ route('home') }}">Beranda</a>

        <a href="{{ route('products.index') }}">Produk</a>

        <a href="{{ route('promo') }}">Promo</a>

        <a href="{{ route('cart.index') }}">Keranjang</a>

        <a href="{{ route('login') }}">Login</a>
    </nav>
</header>


<section class="hero">
    <h2>Promo Spesial EnyMart!</h2>
    <p>Temukan pakaian favoritmu dengan harga lebih hemat.</p>
    <p>Diskon hingga 50% untuk berbagai pilihan fashion!</p>
</section>

<section class="container">

    <div class="section-title">
        <h2>10 Produk Promo Terbaru</h2>
        <p>Pilihan fashion terbaik dengan harga spesial</p>
    </div>

    <div class="products">

        <!-- 1. Dress Wanita -->
        <div class="product">
            <img src="{{ asset('images/promo/dress.jpg') }}"
                 alt="Dress Wanita">
            <div class="product-info">
                <span class="discount">Diskon 30%</span>
                <h3>Dress Wanita</h3>
                <p class="price">Rp140.000 <span class="old-price">Rp200.000</span></p>
                <a href="/checkout" class="buy-btn">Beli Sekarang</a>
            </div>
        </div>

        <!-- 2. Kemeja Pria -->
        <div class="product">
            <img src="{{ asset('images/promo/kemeja.jpg') }}"
                 alt="Kemeja Pria">
            <div class="product-info">
                <span class="discount">Diskon 20%</span>
                <h3>Kemeja Pria</h3>
                <p class="price">Rp120.000 <span class="old-price">Rp150.000</span></p>
                <a href="/checkout" class="buy-btn">Beli Sekarang</a>
            </div>
        </div>

        <!-- 3. Kaos Polos -->
        <div class="product">
            <img src="{{ asset('images/promo/kaos.jpg') }}"
                 alt="Kaos Polos">
            <div class="product-info">
                <span class="discount">Diskon 25%</span>
                <h3>Kaos Polos</h3>
                <p class="price">Rp75.000 <span class="old-price">Rp100.000</span></p>
                <a href="/checkout" class="buy-btn">Beli Sekarang</a>
            </div>
        </div>

        <!-- 4. Jaket Casual -->
        <div class="product">
            <img src="{{ asset('images/promo/jaket.jpg') }}"
                 alt="Jaket Casual">
            <div class="product-info">
                <span class="discount">Diskon 35%</span>
                <h3>Jaket Casual</h3>
                <p class="price">Rp195.000 <span class="old-price">Rp300.000</span></p>
                <a href="/checkout" class="buy-btn">Beli Sekarang</a>
            </div>
        </div>

        <!-- 5. Celana Jeans -->
        <div class="product">
            <img src="{{ asset('images/promo/jeans.jpg') }}"
                 alt="Celana Jeans">
            <div class="product-info">
                <span class="discount">Diskon 20%</span>
                <h3>Celana Jeans</h3>
                <p class="price">Rp160.000 <span class="old-price">Rp200.000</span></p>
                <a href="/checkout" class="buy-btn">Beli Sekarang</a>
            </div>
        </div>

        <!-- 6. Rok Wanita -->
        <div class="product">
            <img src="{{ asset('images/promo/rok.jpg') }}"
                 alt="Rok Wanita">
            <div class="product-info">
                <span class="discount">Diskon 30%</span>
                <h3>Rok Wanita</h3>
                <p class="price">Rp105.000 <span class="old-price">Rp150.000</span></p>
                <a href="/checkout" class="buy-btn">Beli Sekarang</a>
            </div>
        </div>

        <!-- 7. Hoodie Unisex -->
        <div class="product">
            <img src="{{ asset('images/promo/hoodie.jpg') }}"
                 alt="Hoodie Unisex">
            <div class="product-info">
                <span class="discount">Diskon 25%</span>
                <h3>Hoodie Unisex</h3>
                <p class="price">Rp150.000 <span class="old-price">Rp200.000</span></p>
                <a href="/checkout" class="buy-btn">Beli Sekarang</a>
            </div>
        </div>

        <!-- 8. Cardigan Wanita -->
        <div class="product">
            <img src="{{ asset('images/promo/cardigan.jpg') }}"
                 alt="Cardigan Wanita">
            <div class="product-info">
                <span class="discount">Diskon 20%</span>
                <h3>Cardigan Wanita</h3>
                <p class="price">Rp120.000 <span class="old-price">Rp150.000</span></p>
                <a href="/checkout" class="buy-btn">Beli Sekarang</a>
            </div>
        </div>

        <!-- 9. Blazer Wanita -->
        <div class="product">
            <img src="{{ asset('images/promo/blazer.jpg') }}"
                 alt="Blazer Wanita">
            <div class="product-info">
                <span class="discount">Diskon 25%</span>
                <h3>Blazer Wanita</h3>
                <p class="price">Rp180.000 <span class="old-price">Rp240.000</span></p>
                <a href="/checkout" class="buy-btn">Beli Sekarang</a>
            </div>
        </div>

        <!-- 10. Blouse Wanita -->
        <div class="product">
            <img src="{{ asset('images/promo/blouse.jpg') }}"
                 alt="Blouse Wanita">
            <div class="product-info">
                <span class="discount">Diskon 30%</span>
                <h3>Blouse Wanita</h3>
                <p class="price">Rp105.000 <span class="old-price">Rp150.000</span></p>
                <a href="/checkout" class="buy-btn">Beli Sekarang</a>
            </div>
        </div>

    </div>
</section>

<footer>
    <p>&copy; 2026 EnyMart - Gaya Pilihanmu</p>
    <p>Belanja Fashion Mudah, Hemat, dan Nyaman.</p>
</footer>

</body>
</html>
