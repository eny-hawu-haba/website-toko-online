<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - EnyMart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #fff1f5;
        }

        .form-container {
            max-width: 700px;
            margin: 40px auto;
            background: #fff0f5;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,.08);
        }

        h2 {
            color: #873e61;
            font-weight: bold;
        }

        .btn-pink {
            background: #873e61;
            color: white;
        }

        .btn-pink:hover {
            background: #6b304d;
            color: white;
        }

        #preview {
            display: none;
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="form-container">

        <h2 class="text-center mb-4">Tambah Produk EnyMart</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="name"
                       class="form-control"
                       value="{{ old('name') }}"
                       placeholder="Contoh: Blouse Wanita"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ([
                        'Atasan', 'Dress', 'Celana', 'Rok',
                        'Outer', 'Tunik', 'Setelan', 'Jaket',
                        'Celana Pendek', 'Sweater'
                    ] as $category)
                        <option value="{{ $category }}"
                            {{ old('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Produk</label>
                <textarea name="description"
                          class="form-control"
                          rows="4"
                          placeholder="Masukkan deskripsi produk"
                          required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" name="price"
                       class="form-control"
                       value="{{ old('price') }}"
                       min="0" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stock"
                       class="form-control"
                       value="{{ old('stock') }}"
                       min="0" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pilih Gambar Produk</label>
                <input type="file"
                       name="image"
                       id="image"
                       class="form-control"
                       accept="image/jpeg,image/png,image/webp"
                       required>

                <small class="text-muted">
                    Pilih gambar sesuai pakaian. Format JPG, PNG, atau WEBP. Maksimal 2 MB.
                </small>

                <img id="preview" alt="Pratinjau gambar produk">
            </div>

            <button type="submit" class="btn btn-pink w-100">
                Simpan Produk
            </button>

            <a href="{{ route('products.index') }}"
               class="btn btn-secondary w-100 mt-2">
                Kembali
            </a>

        </form>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    });
</script>

</body>
</html>
