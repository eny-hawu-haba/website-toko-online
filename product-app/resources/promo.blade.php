<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promo - StyleMart</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f5f7;
            color: #222;
        }

        /* HEADER */
        header {
            background: #1c1c20;
            color: white;
            padding: 17px 4%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            font-size: 27px;
            font-weight: bold;
            color: white;
        }

        .logo span {
            color: #ff3980;
        }

        nav {
            display: flex;
            gap: 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover,
        nav a.active {
            color: #ff3980;
        }

        .search input {
            padding: 12px 18px;
            border: none;
            border-radius: 25px;
            width: 230px;
            outline: none;
        }

        /* BANNER */
        .banner {
            margin: 12px 1.5%;
            min-height: 165px;
            border-radius: 20px;
            background: linear-gradient(110deg, #ffc2d7, #ffe5ed, #ffb5ce);
            display: flex;
            justify-content: space-around;
            align-items: center;
            text-align: center;
            padding: 25px;
        }

        .banner h1 {
            font-size: 42px;
            margin-bottom: 12px;
        }

        .banner h1 span {
            color: #f52d76;
        }

        .banner p {
            font-size: 20px;
        }

        .discount-banner {
            background: #f52d76;
            color: white;
            padding: 18px 30px;
            border-radius: 15px;
            transform: rotate(-5deg);
            font-weight: bold;
        }

        .discount-banner strong {
            display: block;
            font-size: 43px;
            color: #ffe45e;
        }

        /* JUDUL */
        .section-title {
            text-align: center;
            margin: 25px 0;
            font-size: 26px;
        }

        /* PRODUK */
        .products {
            padding: 0 1.5% 30px;
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 15px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 9px;
            text-align: center;
            position: relative;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: 0.3s;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.13);
        }

        .card img {
            width: 100%;
            height: 235px;
            object-fit: cover;
            border-radius: 11px;
        }

        .badge {
            position: absolute;
            top: 17px;
            left: 16px;
            background: #ff347b;
            color: white;
            padding: 8px 12px;
            border-radius: 12px;
            font-size: 19px;
            font-weight: bold;
            z-index: 1;
        }

        .badge small {
            display: block;
            font-size: 12px;
        }

        .card h3 {
            margin: 12px 0 8px;
            font-size: 18px;
        }

        .old-price {
            color: #999;
            text-decoration: line-through;
            margin-bottom: 5px;
        }

        .new-price {
            color: #d71955;
            font-weight: bold;
            font-size: 21px;
            margin-bottom: 10px;
        }

        .btn {
            display: block;
            background: #ff347b;
            color: white;
            text-decoration: none;
            padding: 12px 5px;
            border-radius: 25px;
            font-weight: bold;
            margin: 5px 8px 3px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #d71955;
        }

        /* FOOTER */
        footer {
            background: #1c1c20;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 20px;
        }

        footer span {
            color: #ff3980;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .products {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 700px) {
            header {
                justify-content: center;
            }

            nav {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .banner {
                flex-direction: column;
                gap: 20px;
            }

            .banner h1 {
                font-size: 28px;
            }

            .banner p {
                font-size: 16px;
            }

            .products {
                grid-template-columns: repeat(2, 1fr);
            }

            .card img {
                height: 190px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <div class="logo">♡ Style<span>Mart</span></div>

        <nav>
            <a href="/">Home</a>
            <a href="/kategori">Kategori</a>
            <a href="/promo" class="active">Promo</a>
            <a href="/tentang">Tentang</a>
        </nav>

        <div class="search">
            <input type="text" placeholder="Cari produk...">
        </div>
    </header>

    <!-- BANNER PROMO -->
    <section class="banner">
        <div>
            <h1>Promo Spesial <span>StyleMart</span></h1>
            <p>Dapatkan pakaian favoritmu dengan harga lebih hemat!</p>
        </div>

        <div class="discount-banner">
            Diskon hingga
            <strong>50%</strong>
        </div>
    </section>

    <!-- DAFTAR PRODUK -->
    <h2 class="section-title">🔥 Produk Promo Terbaru</h2>

    <section class="products">

        <!-- 1. DRESS WANITA -->
        <div class="card">
            <div class="badge">30% <small>OFF</small></div>
            <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=500" alt="Dress Wanita">
            <h3>Dress Wanita</h3>
            <p class="old-price">Rp150.000</p>
            <p class="new-price">Rp105.000</p>
            <a href="/kategori" class="btn">🛒 Beli Sekarang</a>
        </div>

        <!-- 2. KEMEJA PRIA -->
        <div class="card">
            <div class="badge">25% <small>OFF</small></div>
            <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=500" alt="Kemeja Pria">
            <h3>Kemeja Pria</h3>
            <p class="old-price">Rp160.000</p>
            <p class="new-price">Rp120.000</p>
            <a href="/kategori" class="btn">🛒 Beli Sekarang</a>
        </div>

        <!-- 3. KAOS OVERSIZE -->
        <div class="card">
            <div class="badge">20% <small>OFF</small></div>
            <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=500" alt="Kaos Oversize">
            <h3>Kaos Oversize</h3>
            <p class="old-price">Rp100.000</p>
            <p class="new-price">Rp80.000</p>
            <a href="/kategori" class="btn">🛒 Beli Sekarang</a>
        </div>

        <!-- 4. CELANA JEANS -->
        <div class="card">
            <div class="badge">50% <small>OFF</small></div>
            <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?w=500" alt="Celana Jeans">
            <h3>Celana Jeans</h3>
            <p class="old-price">Rp140.000</p>
            <p class="new-price">Rp70.000</p>
            <a href="/kategori" class="btn">🛒 Beli Sekarang</a>
        </div>

        <!-- 5. ROK WANITA -->
        <div class="card">
            <div class="badge">30% <small>OFF</small></div>
            <img src="https://images.unsplash.com/photo-1583496661160-fb5886a0aaaa?w=500" alt="Rok Wanita">
            <h3>Rok Wanita</h3>
            <p class="old-price">Rp120.000</p>
            <p class="new-price">Rp84.000</p>
            <a href="/kategori" class="btn">🛒 Beli Sekarang</a>
        </div>

        <!-- 6. HOODIE CASUAL -->
        <div class="card">
            <div class="badge">25% <small>OFF</small></div>
            <img src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=500" alt="Hoodie Casual">
            <h3>Hoodie Casual</h3>
            <p class="old-price">Rp180.000</p>
            <p class="new-price">Rp135.000</p>
            <a href="/kategori" class="btn">🛒 Beli Sekarang</a>
        </div>

        <!-- 7. BLOUSE WANITA -->
        <div class="card">
            <div class="badge">40% <small>OFF</small></div>
            <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=500" alt="Blouse Wanita">
            <h3>Blouse Wanita</h3>
            <p class="old-price">Rp130.000</p>
            <p class="new-price">Rp78.000</p>
            <a href="/kategori" class="btn">🛒 Beli Sekarang</a>
        </div>

        <!-- 8. JAKET DENIM -->
        <div class="card">
            <div class="badge">35% <small>OFF</small></div>
            <img src="https://images.unsplash.com/photo-1543076447-215ad9ba6923?w=500" alt="Jaket Denim">
            <h3>Jaket Denim</h3>
            <p class="old-price">Rp200.000</p>
            <p class="new-price">Rp130.000</p>
            <a href="/kategori" class="btn">🛒 Beli Sekarang</a>
        </div>

        <!-- 9. CELANA CARGO -->
        <div class="card">
            <div class="badge">45% <small>OFF</small></div>
            <img src="https://images.unsplash.com/photo-1517438476312-10d79c077509?w=500" alt="Celana Cargo">
            <h3>Celana Cargo</h3>
            <p class="old-price">Rp150.000</p>
            <p class="new-price">Rp82.000</p>
            <a href="/kategori" class="btn">🛒 Beli Sekarang</a>
        </div>

        <!-- 10. SWEATER RAJUT -->
        <div class="card">
            <div class="badge">20% <small>OFF</small></div>
            <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=500" alt="Sweater Rajut">
            <h3>Sweater Rajut</h3>
            <p class="old-price">Rp120.000</p>
            <p class="new-price">Rp96.000</p>
            <a href="/kategori" class="btn">🛒 Beli Sekarang</a>
        </div>

    </section>

    <!-- FOOTER -->
    <footer>
        <h3>Style<span>Mart</span></h3>
        <p>Gaya Pilihanmu, Harga Bersahabat.</p>
        <p>&copy; 2026 StyleMart — All Rights Reserved.</p>
    </footer>

</body>
</html>
