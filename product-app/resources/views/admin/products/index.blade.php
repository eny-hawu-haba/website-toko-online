
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - EnyMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fff1f5;
            font-family: Arial, sans-serif;
        }

        .header {
            background: linear-gradient(120deg, #4a2939, #873e61);
            color: white;
            padding: 22px;
        }

        .main-card {
            background: #fff0f5;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 8px 26px rgba(62, 42, 67, .08);
        }

        .btn-pink {
            background: #873e61;
            color: white;
        }

        .btn-pink:hover {
            background: #6b304d;
            color: white;
        }

        .product-img {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="header">
    <div class="container d-flex justify-content-between align-items-center">
        <h3>EnyMart - Kelola Produk</h3>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-light">
            Kembali ke Dashboard
        </a>
    </div>
</div>

<div class="container py-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="main-card">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Daftar Produk</h4>

            <a href="{{ route('products.create') }}" class="btn btn-pink">
                + Tambah Produk
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead class="table-danger">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $product)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                @if($product->image)
                                    <img
                                        src="{{ $product->image_url }}"
                                        class="product-img"
                                        alt="{{ $product->name }}">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>

                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>

                            <td>
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Belum ada produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

</body>
</html>
