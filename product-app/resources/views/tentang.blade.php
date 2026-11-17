<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - EnyMart</title>

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

        nav {
            background: #4a2939;
            color: white;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        nav h2 {
            color: #f1d6df;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .hero {
            background: linear-gradient(135deg, #4a2939, #b86c8a);
            color: white;
            text-align: center;
            padding: 85px 20px;
        }

        .hero h1 {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .content {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
        }

        .content h2 {
            color: #873e61;
            margin-bottom: 15px;
        }

        .content p {
            line-height: 1.8;
            margin-bottom: 25px;
            text-align: justify;
        }

        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .card {
            background: #fff0f5;
            padding: 25px;
            border-radius: 10px;
            flex: 1;
            min-width: 220px;
            box-shadow: 0 6px 20px rgba(74,41,57,.08);
            text-align: center;
        }

        .card h3 {
            color: #873e61;
            margin-bottom: 12px;
        }

        footer {
            background: #4a2939;
            color: white;
            text-align: center;
            padding: 22px;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <nav>
        <h2>EnyMart</h2>
        <div>
            <a href="/">Beranda</a>
            <a href="/promo">Promo</a>
            <a href="/kategori">Kategori</a>
            <a href="/tentang">Tentang Kami</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Tentang Kami</h1>
        <p>Kenali lebih dekat EnyMart, toko fashion pilihanmu.</p>
    </section>

    <section class="content">

        <h2>Selamat Datang di EnyMart</h2>

        <p>
            EnyMart adalah toko fashion online yang menyediakan
            berbagai pilihan pakaian untuk memenuhi kebutuhan
            gaya berpakaian masyarakat. Kami hadir untuk memberikan
            pengalaman berbelanja yang mudah, nyaman, dan menyenangkan.
        </p>

        <p>
            Kami menyediakan berbagai produk fashion dengan desain
            menarik, kualitas yang baik, serta harga yang terjangkau.
            Melalui EnyMart, pelanggan dapat menemukan gaya favorit
            mereka tanpa harus datang langsung ke toko.
        </p>

        <h2>Visi Kami</h2>

        <p>
            Menjadi toko fashion online yang terpercaya dan menjadi
            pilihan utama pelanggan dalam memenuhi kebutuhan fashion.
        </p>

        <h2>Misi Kami</h2>

        <p>
            Memberikan produk fashion berkualitas, menyediakan harga
            yang terjangkau, memberikan pelayanan terbaik, serta
            memudahkan pelanggan dalam berbelanja secara online.
        </p>

        <div class="cards">

            <div class="card">
                <h3>👗 Produk Berkualitas</h3>
                <p>Menyediakan pilihan fashion yang menarik dan berkualitas.</p>
            </div>

            <div class="card">
                <h3>💰 Harga Terjangkau</h3>
                <p>Memberikan produk dengan harga yang ramah di kantong.</p>
            </div>

            <div class="card">
                <h3>❤️ Pelayanan Terbaik</h3>
                <p>Mengutamakan kenyamanan dan kepuasan pelanggan.</p>
            </div>

        </div>

    </section>

    <footer>
        <p>© 2026 EnyMart — Gaya Pilihanmu</p>
    </footer>

</body>
</html>
