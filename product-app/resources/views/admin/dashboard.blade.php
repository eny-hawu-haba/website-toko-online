
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - EnyMart</title>
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
            text-decoration: none;
            display: block;
            padding: 12px;
            border-radius: 5px;
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
            <p>Admin Panel</p>

            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.products.index') }}">Kelola Produk</a>
            <a href="{{ route('admin.orders.history') }}">Riwayat Pembelian</a>
            <a href="{{ route('home') }}">Lihat Website</a>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light text-danger mt-3 w-100">
                    Logout
                </button>
            </form>
        </div>

        <div class="col-md-9 col-lg-10 content">
            <h2>Dashboard Admin</h2>
            <p>Selamat datang, {{ Auth::user()->name }}!</p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm p-4">
                        <h5>Kelola Produk</h5>
                        <p>Kelola semua produk EnyMart.</p>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-danger">
                            Buka Produk
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm p-4">
                        <h5>Tambah Produk</h5>
                        <p>Tambahkan pakaian baru ke toko.</p>
                        <a href="{{ route('products.create') }}" class="btn btn-danger">
                            Tambah Produk
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm p-4">
                        <h5>Website</h5>
                        <p>Lihat halaman utama EnyMart.</p>
                        <a href="{{ route('home') }}" class="btn btn-danger">
                            Buka Website
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm p-4">
                        <h5>Riwayat Pembelian</h5>
                        <p>Lihat transaksi dan rincian barang yang dibeli.</p>
                        <a href="{{ route('admin.orders.history') }}" class="btn btn-danger">
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
