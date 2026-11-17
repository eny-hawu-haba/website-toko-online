<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struk Pembelian - EnyMart</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8e9ee;
            padding: 20px;
        }

        .struk {
            background: white;
            width: 100%;
            max-width: 380px;
            margin: auto;
            padding: 25px;
            box-sizing: border-box;
            border: 1px solid #ddd;
        }

        h2, .center {
            text-align: center;
        }

        h2 { margin-bottom: 5px; }

        .garis {
            border-top: 1px dashed #333;
            margin: 10px 0;
        }

        .info p {
            margin: 4px 0;
            overflow-wrap: anywhere;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            table-layout: fixed;
        }

        td, th {
            padding: 5px 2px;
            text-align: left;
            vertical-align: top;
        }

        td:first-child, th:first-child {
            overflow-wrap: anywhere;
        }

        td:nth-child(2), th:nth-child(2) {
            width: 15%;
        }

        td:nth-child(3), th:nth-child(3) {
            width: 37%;
            white-space: nowrap;
        }

        .kanan { text-align: right; }

        .total {
            font-size: 17px;
            font-weight: bold;
        }

        .tombol {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background: #198754;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        @page {
            size: 80mm auto;
            margin: 0;
        }

        @media print {
            body {
                background: white;
                padding: 0;
                margin: 0;
                width: 80mm;
                font-family: "Courier New", monospace;
                font-size: 11px;
                color: #000;
            }

            .struk {
                width: 72mm;
                border: none;
                max-width: 72mm;
                margin: 0;
                padding: 3mm 0;
                background: white;
            }

            h2 { font-size: 16px; }

            p { margin: 5px 0; }

            table { font-size: 10px; }

            .tombol { display: none; }
        }
    </style>
</head>
<body>

@php
    $order = session('checkout_order', []);

    $nomor = $order['nomor'] ?? 'Belum tersedia';
    $tanggal = $order['tanggal'] ?? now()->format('d-m-Y H:i');
    $nama = $order['nama'] ?? '-';
    $no_hp = $order['no_hp'] ?? '-';
    $alamat = $order['alamat'] ?? '-';
    $pembayaran = $order['pembayaran'] ?? '-';
    $items = $order['cart'] ?? [];
    $total = (float) ($order['total'] ?? 0);
@endphp

<div class="struk">

    <h2>ENYMART</h2>
    <p class="center">Struk Pembelian</p>

    <div class="garis"></div>

    <div class="info">
        <p>Nomor: {{ $nomor }}</p>
        <p>Tanggal: {{ $tanggal }}</p>
        <p>Pembeli: {{ $nama }}</p>
        <p>No. HP: {{ $no_hp }}</p>
        <p>Alamat: {{ $alamat }}</p>
        <p>Pembayaran: {{ $pembayaran }}</p>
    </div>

    <div class="garis"></div>

    <table>
        <thead>
            <tr>
                <th>Barang</th>
                <th class="kanan">Jumlah</th>
                <th class="kanan">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                @php
                    $harga = (float) ($item['price'] ?? 0);
                    $jumlah = (int) ($item['quantity'] ?? 1);
                @endphp

                <tr>
                    <td>
                        {{ $item['name'] ?? 'Produk' }}
                        <br>
                        <small>
                            Rp{{ number_format($harga, 0, ',', '.') }}
                        </small>
                    </td>
                    <td class="kanan">{{ $jumlah }}</td>
                    <td class="kanan">
                        Rp{{ number_format($harga * $jumlah, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="center">
                        Belum ada data transaksi.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="garis"></div>

    <p class="kanan total">
        Total: Rp{{ number_format($total, 0, ',', '.') }}
    </p>

    <div class="garis"></div>

    <p class="center">Terima kasih telah berbelanja!</p>
    <p class="center">EnyMart — Gaya Pilihanmu</p>

    <button class="tombol" onclick="window.print()">
        Cetak Struk
    </button>

</div>
</body>
</html>
