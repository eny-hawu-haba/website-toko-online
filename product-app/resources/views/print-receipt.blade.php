<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk EnyMart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8e9ee;
            padding: 30px;
        }

        .struk {
            background: white;
            width: 320px;
            margin: auto;
            padding: 20px;
            box-shadow: 0 0 8px #aaa;
        }

        h2, p {
            text-align: center;
        }

        .garis {
            border-top: 1px dashed black;
            margin: 12px 0;
        }

        .total {
            font-weight: bold;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            cursor: pointer;
        }

        @media print {
            body { background: white; padding: 0; }
            .struk { box-shadow: none; }
            button { display: none; }
        }
    </style>
</head>
<body>

<div class="struk">
    <h2>ENYMART</h2>
    <p>TOKO FASHION ONLINE</p>

    <div class="garis"></div>

    <p>Tanggal: {{ $tanggal }}</p>
    <p>No. Struk: SM-001</p>

    <div class="garis"></div>

    <p>Baju Wanita — Rp100.000</p>
    <p>Celana Jeans — Rp150.000</p>

    <div class="garis"></div>

    <p class="total">TOTAL: Rp250.000</p>

    <div class="garis"></div>

    <p>Terima kasih telah berbelanja!</p>
    <p>ENYMART</p>

    <button onclick="window.print()">Cetak Struk</button>
</div>

</body>
</html>
