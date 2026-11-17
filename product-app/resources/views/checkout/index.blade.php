
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - EnyMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #fff1f5;
        }

        .navbar-style {
            background: linear-gradient(120deg, #4a2939, #873e61);
        }

        .card {
            border: none;
            border-radius: 12px;
            background: #fff0f5;
        }

        .btn-style {
            background: #873e61;
            color: white;
            border: none;
        }

        .btn-style:hover {
            background: #6b304d;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar-style py-3 shadow-sm">
    <div class="container d-flex justify-content-between">
        <a href="{{ route('home') }}"
           class="text-white text-decoration-none fw-bold fs-4">
            👗 EnyMart
        </a>

        <a href="{{ route('cart.index') }}" class="btn btn-light">
            ← Keranjang
        </a>
    </div>
</nav>

<div class="container py-5">
    <h2 class="fw-bold mb-4">Checkout Pembelian</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Informasi Pembeli</h5>

                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Pembeli</label>
                            <input type="text" name="nama"
                                   class="form-control"
                                   value="{{ old('nama', $order['nama'] ?? '') }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" name="no_hp"
                                   class="form-control"
                                   value="{{ old('no_hp', $order['no_hp'] ?? '') }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Pengiriman</label>
                            <textarea name="alamat" class="form-control"
                                      rows="3" required>{{ old('alamat', $order['alamat'] ?? '') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Metode Pembayaran</label>
                            <select name="pembayaran" class="form-select" required>
                                <option value="">Pilih pembayaran</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="COD">Bayar di Tempat (COD)</option>
                                <option value="E-Wallet">E-Wallet</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-style btn-lg w-100">
                            Buat Pesanan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Ringkasan Belanja</h5>

                    @forelse ($cart as $item)
                        @php
                            $harga = (float) ($item['price'] ?? 0);
                            $jumlah = (int) ($item['quantity'] ?? 1);
                        @endphp

                        <div class="d-flex justify-content-between gap-3 mb-3">
                            <div>
                                <div class="fw-semibold">
                                    {{ $item['name'] ?? 'Produk' }}
                                </div>
                                <small class="text-muted">
                                    {{ $jumlah }} × Rp{{ number_format($harga, 0, ',', '.') }}
                                </small>
                            </div>

                            <div class="text-nowrap">
                                Rp{{ number_format($harga * $jumlah, 0, ',', '.') }}
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">
                            Tidak ada barang dalam keranjang.
                        </p>
                    @endforelse

                    <hr>

                    <div class="d-flex justify-content-between fw-bold fs-5">
                        <span>Total</span>
                        <span>Rp{{ number_format((float) $total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
