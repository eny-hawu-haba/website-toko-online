<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} - EcoMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f5f8f6;
        }

        .product-detail {
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .price {
            color: #198754;
            font-size: 28px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a href="{{ route('home') }}"
           class="navbar-brand fw-bold">
            EcoMart
        </a>
    </div>
</nav>

<div class="container py-5">

    <div class="card product-detail shadow-sm">
        <div class="row g-0">

            <div class="col-md-6">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="product-image"
                         alt="{{ $product->name }}">
                @else
                    <div class="product-image bg-secondary text-white d-flex align-items-center justify-content-center">
                        Tidak ada foto
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <div class="card-body p-4">

                    <span class="badge bg-success mb-3">
                        {{ $product->category }}
                    </span>

                    <h2 class="fw-bold">
                        {{ $product->name }}
                    </h2>

                    <div class="price my-3">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>

                    <p class="text-muted">
                        Stok tersedia: {{ $product->stock }}
                    </p>

                    <hr>

                    <h5>Deskripsi Produk</h5>

                    <p>
                        {{ $product->description ?: 'Tidak ada deskripsi produk.' }}
                    </p>

                    @if ($product->stock > 0)
                        @if ($product->stock > 0)
    <form action="{{ route('cart.add', $product->id) }}"
          method="POST">

        @csrf

        <button type="submit"
                class="btn btn-success w-100 mb-2">
            🛒 Tambah ke Keranjang
        </button>
    </form>
@else
    <button class="btn btn-secondary w-100 mb-2" disabled>
        Stok Habis
    </button>
@endif
                    @endif

                    <a href="{{ route('home') }}"
                       class="btn btn-outline-secondary w-100">
                        Kembali ke Home
                    </a>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>