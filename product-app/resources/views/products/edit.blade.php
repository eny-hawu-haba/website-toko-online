<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Produk - EcoMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow border-0">
                <div class="card-body p-4">

                    <h3 class="text-warning fw-bold mb-4">
                        Edit Produk
                    </h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', $product->name) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text"
                                   name="category"
                                   class="form-control"
                                   value="{{ old('category', $product->category) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description"
                                      class="form-control"
                                      rows="4">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number"
                                       name="price"
                                       class="form-control"
                                       value="{{ old('price', $product->price) }}"
                                       min="0"
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number"
                                       name="stock"
                                       class="form-control"
                                       value="{{ old('stock', $product->stock) }}"
                                       min="0"
                                       required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Produk Baru</label>
                            <input type="file"
                                   name="image"
                                   class="form-control"
                                   accept="image/*">
                        </div>

                        @if ($product->image)
                            <div class="mb-3">
                                <p class="mb-2">Foto saat ini:</p>

                                <img src="{{ $product->image_url }}"
                                     width="150"
                                     class="img-thumbnail">
                            </div>
                        @endif

                        <div class="form-check mb-4">
                            <input type="checkbox"
                                   name="is_active"
                                   class="form-check-input"
                                   id="is_active"
                                   {{ $product->is_active ? 'checked' : '' }}>

                            <label for="is_active" class="form-check-label">
                                Produk aktif
                            </label>
                        </div>

                        <button type="submit" class="btn btn-warning">
                            Update Produk
                        </button>

                        <a href="{{ route('products.index') }}"
                           class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html> 