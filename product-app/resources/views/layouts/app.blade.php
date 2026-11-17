<div class="d-flex gap-2 align-items-center">

    @guest

        <a href="{{ route('login') }}"
           class="btn btn-outline-success">
            Login
        </a>

    @else

        <span class="text-success fw-bold">
            Halo, {{ Auth::user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="s<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout - EcoMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            EcoMart
        </a>

        <a href="{{ route('cart.index') }}" class="btn btn-light">
            ← Kembali ke Keranjang
        </a>
    </div>
</nav>

<div class="container py-4">

    <h2 class="mb-4">Checkout</h2>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">

        {{-- FORM DATA PEMBELI --}}
        <div class="col-md-7">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Data Pembeli</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Nama Lengkap
                            </label>

                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   value="{{ old('nama', session('checkout.nama')) }}"
                                   placeholder="Masukkan nama lengkap"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                No. HP
                            </label>

                            <input type="text"
                                   name="no_hp"
                                   class="form-control"
                                   value="{{ old('no_hp', session('checkout.no_hp')) }}"
                                   placeholder="Masukkan nomor HP"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Alamat
                            </label>

                            <textarea name="alamat"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Masukkan alamat lengkap"
                                      required>{{ old('alamat', session('checkout.alamat')) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            Simpan Data Checkout
                        </button>

                    </form>

                </div>
            </div>

        </div>

        {{-- RINGKASAN PESANAN --}}
        <div class="col-md-5">

            <div class="card shadow-sm">

                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Ringkasan Pesanan</h5>
                </div>

                <div class="card-body">

                    @foreach ($cart as $item)

                        <div class="d-flex justify-content-between mb-3">

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
                        <strong>Total</strong>

                        <strong class="text-success">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </strong>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>ubmit" class="btn btn-outline-danger">
                Logout
            </button>
        </form>

    @endguest

</div>