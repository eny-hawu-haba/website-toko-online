<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk StyleMart</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eee;
            padding: 20px;
        }

        .struk {
            width: 300px;
            background: white;
            margin: auto;
            padding: 20px;
        }

        h2, .center {
            text-align: center;
        }

        .garis {
            border-top: 1px dashed black;
            margin: 12px 0;
        }

        table {
            width: 100%;
            font-size: 13px;
        }

        .total {
            font-weight: bold;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 25px;
            cursor: pointer;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .struk {
                margin: 0;
                width: 280px;
            }

            button {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="struk">

    <h2>STYLEMART</h2>
    <p class="center">TOKO FASHION ONLINE</p>

    <div class="garis"></div>

    <p>Tanggal: {{ $tanggal }}</p>
    <p>Nomor: SM-001</p>

    <div class="garis"></div>

    <table>
        @foreach ($barang as $item)
        <tr>
            <td>{{ $item['nama'] }}</td>
            <td>{{ $item['jumlah'] }} x</td>
            <td align="right">
                Rp{{ number_format($item['harga'], 0, ',', '.') }}
            </td>
        </tr>
        @endforeach
    </table>

    <div class="garis"></div>

    <p class="total">
        TOTAL: Rp{{ number_format($total, 0, ',', '.') }}
    </p>

    <div class="garis"></div>

    <p class="center">
        Terima kasih telah berbelanja!
    </p>

    <button onclick="window.print()">
        CETAK STRUK
    </button>

</div>

<script>
    window.onload = function () {
        window.print();
    };
</script>

</body>
</html>
