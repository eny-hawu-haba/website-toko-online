
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Kasir - EnyMart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8e9ee; }
        .sidebar {
            background: linear-gradient(160deg, #4a2939, #873e61);
            min-height: 100vh;
            color: white;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 12px;
            text-decoration: none;
            border-radius: 6px;
        }
        .sidebar a:hover { background: #a44f76; }
        .content { padding: 30px; }
        .card { border: none; border-radius: 12px; background: #fff0f5; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-2 sidebar p-3">
            <h4>EnyMart</h4>
            <p>Panel Kasir</p>

            <a href="{{ route('kasir.dashboard') }}">Dashboard</a>
            <a href="{{ route('kasir.orders.history') }}">Riwayat Pembelian</a>
            <a href="{{ route('home') }}">Lihat Website</a>

            <form action="{{ route('kasir.logout') }}" method="POST">
                @csrf
                <button class="btn btn-light text-danger w-100 mt-3" type="submit">
                    Logout
                </button>
            </form>
        </div>

        <div class="col-md-9 col-lg-10 content">
            <h2>Dashboard Kasir</h2>
            <p>Selamat datang, {{ Auth::user()->name }}!</p>

            <div class="row mt-4">
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm p-4">
                        <h5>Transaksi Penjualan</h5>
                        <p>Layani pembelian pelanggan melalui halaman checkout.</p>
                        <a href="{{ route('checkout.index') }}" class="btn btn-danger">
                            Buka Checkout
                        </a>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm p-4">
                        <h5>Website EnyMart</h5>
                        <p>Lihat produk yang tersedia di toko.</p>
                        <a href="{{ route('home') }}" class="btn btn-danger">
                            Lihat Produk
                        </a>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm p-4">
                        <h5>Riwayat Pembelian</h5>
                        <p>Lihat transaksi dan rincian barang yang dibeli.</p>
                        <a href="{{ route('kasir.orders.history') }}" class="btn btn-danger">
                            Buka Riwayat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
