<!DOCTYPE html>
<html>
<head>
    <title>Upload File Laravel</title>
</head>
<body>

    <h2>Form Upload File</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('upload.file') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <label>Pilih File:</label>
        <input type="file" name="file" required>

        <button type="submit">Upload</button>

    </form>

</body>
</html>
