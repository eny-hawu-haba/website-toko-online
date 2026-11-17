<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - EnyMart</title>

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

        nav a:hover {
            color: #f1d6df;
        }

        .hero {
            background: linear-gradient(135deg, #4a2939, #b86c8a);
            color: white;
            text-align: center;
            padding: 65px 20px;
        }

        .hero h1 {
            font-size: 38px;
            margin-bottom: 15px;
        }

        .container {
            max-width: 1000px;
            margin: 45px auto;
            padding: 20px;
        }

        .container h2 {
            color: #873e61;
            margin-bottom: 15px;
        }

        .contact-wrapper {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .contact-info, .contact-form {
            background: #fff0f5;
            padding: 30px;
            border-radius: 12px;
            flex: 1;
            min-width: 280px;
            box-shadow: 0 6px 20px rgba(74,41,57,.08);
        }

        .contact-info p {
            margin: 22px 0;
            line-height: 1.7;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 13px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .contact-form textarea {
            height: 130px;
            resize: vertical;
        }

        .contact-form button {
            background: #873e61;
            color: white;
            border: none;
            padding: 13px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .contact-form button:hover {
            background: #6b304d;
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
            <a href="/kontak">Kontak</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Hubungi Kami</h1>
        <p>Kami siap membantu dan melayani kebutuhan fashion Anda.</p>
    </section>

    <section class="container">

        <h2>Kontak EnyMart</h2>
        <p>
            Punya pertanyaan, saran, atau membutuhkan bantuan?
            Silakan hubungi kami melalui informasi kontak berikut.
        </p>

        <div class="contact-wrapper">

            <div class="contact-info">
                <h2>Informasi Kontak</h2>

                <p>
                    📍 <strong>Alamat</strong><br>
                    Toko Online EnyMart, Sabu Raijua
                </p>

                <p>
                    📞 <strong>Telepon</strong><br>
                    081239615351
                </p>

                <p>
                    ✉️ <strong>Email</strong><br>
                    stylemart@gmail.com
                </p>

                <p>
                    🕒 <strong>Jam Pelayanan</strong><br>
                    Senin - Sabtu, 08.00 - 22.00 WIB
                </p>
            </div>

            <div class="contact-form">
                <h2>Kirim Pesan</h2>

                <form action="mailto:stylemart@gmail.com"
                      method="post"
                      enctype="text/plain">

                    <input type="text" name="Nama"
                           placeholder="Nama Lengkap" required>

                    <input type="email" name="Email"
                           placeholder="Alamat Email" required>

                    <input type="text" name="Subjek"
                           placeholder="Subjek Pesan" required>

                    <textarea name="Pesan"
                              placeholder="Tulis pesan Anda..."
                              required></textarea>

                    <button type="submit">Kirim Pesan</button>
                </form>
            </div>

        </div>

    </section>

    <footer>
        <p>© 2026 EnyMart — Gaya Pilihanmu</p>
    </footer>

</body>
</html>
