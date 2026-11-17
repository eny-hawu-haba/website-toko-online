<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Keranjang - EnyMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #fff1f5;
        }

        .navbar-style {
            background: linear-gradient(120deg, #4a2939, #873e61);
        }

        .text-style {
            color: #873e61;
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

        .btn-outline-style {
            border: 1px solid #b86c8a;
            color: #873e61;
        }

        .btn-outline-style:hover {
            background: #873e61;
            color: white;
        }

        .cart-card {
            border: none;
            border-radius: 12px;
        }

        .product-photo {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border-radius: 10px;
        }

        .empty-cart {
            font-size: 70px;
        }
    </style>
</head>

<body>


<!-- NAVBAR -->
<nav class="navbar-style shadow-sm">

    <div class="container py-3">

        <div class="d-flex justify-content-between align-items-center">

            <a href="{{ route('home') }}"
               class="text-white text-decoration-none fw-bold fs-4">

                👗 EnyMart

            </a>

            <a href="{{ route('products.index') }}"
               class="btn btn-light">

                🛍️ Belanja Lagi

            </a>

        </div>

    </div>

</nav>


<div class="container py-5">


    <!-- JUDUL -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                🛒 Keranjang Belanja
            </h2>

            <p class="text-muted mb-0">
                Periksa produk fashion yang ingin kamu beli.
            </p>

        </div>

        <a href="{{ route('products.index') }}"
           class="btn btn-outline-style">

            ← Kembali ke Produk

        </a>

    </div>


    <!-- PESAN SUKSES -->
    @if(session('success'))

        <div class="alert alert-success shadow-sm">

            {{ session('success') }}

        </div>

    @endif


    <!-- KERANJANG KOSONG -->
    @if(empty($cart))

        <div class="card cart-card shadow-sm">

            <div class="card-body text-center py-5">

                <div class="empty-cart">
                    🛍️
                </div>

                <h4 class="fw-bold mt-3">
                    Keranjang masih kosong
                </h4>

                <p class="text-muted">
                    Yuk pilih fashion favoritmu di EnyMart.
                </p>

                <a href="{{ route('products.index') }}"
                   class="btn btn-style">

                    🛍️ Belanja Sekarang

                </a>

            </div>

        </div>

    @else


        <!-- DAFTAR PRODUK -->
        @foreach($cart as $item)

            <div class="card cart-card shadow-sm mb-3">

                <div class="card-body">

                    <div class="row align-items-center g-3">


                        <!-- FOTO -->
                        <div class="col-md-2 text-center">

                            @if(!empty($item['image']))

                                <img src="{{ $item['image_url'] ?? asset('storage/' . $item['image']) }}"
                                     alt="{{ $item['name'] }}"
                                     class="product-photo">

                            @else

                                <div class="product-photo bg-light border
                                            d-flex align-items-center
                                            justify-content-center">

                                    <span style="font-size: 40px;">
                                        👗
                                    </span>

                                </div>

                            @endif

                        </div>


                        <!-- PRODUK -->
                        <div class="col-md-3">

                            <span class="badge mb-2"
                                  style="background:#f7e6ea;color:#704b35;">

                                Fashion

                            </span>

                            <h5 class="fw-bold mb-1">

                                {{ $item['name'] }}

                            </h5>

                            <p class="text-style fw-bold mb-0">

                                Rp {{ number_format(
                                    $item['price'],
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </p>

                        </div>


                        <!-- JUMLAH -->
                        <div class="col-md-3">

                            <label class="form-label text-muted">
                                Jumlah
                            </label>

                            <form action="{{ route('cart.update', $item['id']) }}"
                                  method="POST"
                                  class="d-flex gap-2">

                                @csrf

                                @method('PUT')

                                <input type="number"
                                       name="quantity"
                                       value="{{ $item['quantity'] }}"
                                       min="1"
                                       class="form-control"
                                       style="width:90px;">

                                <button type="submit"
                                        class="btn btn-outline-primary">

                                    Ubah

                                </button>

                            </form>

                        </div>


                        <!-- SUBTOTAL & HAPUS -->
                        <div class="col-md-4 text-md-end">

                            <small class="text-muted">
                                Subtotal
                            </small>

                            <h5 class="fw-bold text-style">

                                Rp {{ number_format(
                                    $item['price'] * $item['quantity'],
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </h5>


                            <form action="{{ route('cart.remove', $item['id']) }}"
                                  method="POST">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus produk ini?')">

                                    🗑️ Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @endforeach


        <!-- RINGKASAN TOTAL -->
        <div class="card cart-card shadow-sm mt-4">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h4 class="fw-bold mb-1">
                            Total Belanja
                        </h4>

                        <p class="text-muted mb-0">
                            Belum termasuk ongkos kirim.
                        </p>

                    </div>

                    <h3 class="text-style fw-bold mb-0">

                        Rp {{ number_format(
                            $total,
                            0,
                            ',',
                            '.'
                        ) }}

                    </h3>

                </div>


                <hr>


                <div class="d-flex justify-content-between align-items-center">


                    <!-- KOSONGKAN -->
                    <form action="{{ route('cart.clear') }}"
                          method="POST">

                        @csrf

                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-outline-danger"
                                onclick="return confirm('Yakin ingin mengosongkan keranjang?')">

                            🗑️ Kosongkan Keranjang

                        </button>

                    </form>


                    <!-- CHECKOUT -->
                    <a href="{{ route('checkout.index') }}"
                       class="btn btn-style btn-lg">

                        Lanjut Checkout →

                    </a>

                </div>

            </div>

        </div>

    @endif

</div>


<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-4 mt-5">

    <div class="container">

        <h5 class="fw-bold">
            👗 EnyMart
        </h5>

        <p class="mb-1">
            Toko Fashion Online
        </p>

        <small>
            © {{ date('Y') }} EnyMart.
            Semua Hak Dilindungi.
        </small>

    </div>

</footer>


</body>
</html>