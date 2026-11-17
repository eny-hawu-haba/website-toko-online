<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan Berhasil - EcoMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            EcoMart
        </a>
    </div>
</nav>

<div class="container py-5">

    <div class="card shadow mx-auto" style="max-width: 700px;">

        <div class="card-body text-center p-5">

            <h1 class="text-success mb-3">
                🎉 Pesanan Berhasil!
            </h1>

            <p class="text-muted">
                Terima kasih sudah berbelanja di EcoMart.
            </p>

            <hr>

            <div class="text-start">

                <h5>Data Pembeli</h5>

                <p class="mb-1">
                    <strong>Nama:</strong>
                    {{ $order['nama'] }}
                </p>

                <p class="mb-1">
                    <strong>No. HP:</strong>
                    {{ $order['no_hp'] }}
                </p>

                <p>
                    <strong>Alamat:</strong>
                    {{ $order['alamat'] }}
                </p>

                <hr>

                <h5>Detail Pesanan</h5>

                @foreach ($order['cart'] as $item)

                    <div class="d-flex justify-content-between mb-2">

                        <div>
                            <strong>{{ $item['name'] }}</strong>

                            <br>

                            <small class="text-muted">
                                {{ $item['quantity'] }} ×
                                Rp {{ number_format($item['price'], 0, ',', '.') }}
                            </small>
                        </div>

                        <strong>
                            Rp {{ number_format(
                                $item['price'] * $item['quantity'],
                                0,
                                ',',
                                '.'
                            ) }}
                        </strong>

                    </div>

                @endforeach

                <hr>

                <div class="d-flex justify-content-between">

                    <h5>Total Pembayaran</h5>

                    <h5 class="text-success">
                        Rp {{ number_format($order['total'], 0, ',', '.') }}
                    </h5>

                </div>

            </div>

            <div class="mt-4">

                <a href="{{ route('home') }}"
                   class="btn btn-success">
                    Kembali Belanja
                </a>

                <a href="{{ route('cart.index') }}"
                   class="btn btn-outline-secondary">
                    Lihat Keranjang
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>