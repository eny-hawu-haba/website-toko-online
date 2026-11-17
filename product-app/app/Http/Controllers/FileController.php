<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    // 1. Upload File
    public function upload(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
    ]);

    $file = $request->file('file');

    $namaFile = time() . '_' . $file->getClientOriginalName();

    $path = $file->storeAs('documents', $namaFile, 'public');

    return redirect()->back()->with(
        'success',
        'File berhasil diupload: ' . $path
    );
}

    // 2. Mengecek File
    public function cekFile()
    {
        return Storage::disk('public')->exists(
            'documents/8XgkTU6QFsD4X4dxsrAYzW7F0PZV5tVRixqjLbNr.png'
        ) ? 'File ditemukan!' : 'File tidak ditemukan!';
    }

    // 3. Mengambil Isi File
    public function ambilFile()
    {
        $isi = Storage::disk('public')->get(
            'documents/8XgkTU6QFsD4X4dxsrAYzW7F0PZV5tVRixqjLbNr.png'
        );

        return 'Isi file berhasil diambil. Ukuran: '
            . strlen($isi) . ' byte';
    }

    // 4. Menghapus File
    public function hapusFile()
    {
        Storage::disk('public')->delete(
            'documents/8XgkTU6QFsD4X4dxsrAYzW7F0PZV5tVRixqjLbNr.png'
        );

        return 'File berhasil dihapus!';
    }

    // 5. Mengganti Nama File
    public function gantiNama()
    {
        $berhasil = Storage::disk('public')->move(
            'documents/55Tlb09Zrtc6ZPITtRYeb1YdxwA659zBk8HgPUOL.png',
            'documents/gambar_baru.png'
        );

        return $berhasil
            ? 'Nama file berhasil diganti!'
            : 'File gagal diganti. Periksa nama file asal.';
    }
    
    // 6. Menyalin File
    public function salinFile()
    {
        $berhasil = Storage::disk('public')->copy(
            'documents/gambar_baru.png',
            'documents/gambar_salinan.png'
        );

        return $berhasil
            ? 'File berhasil disalin!'
            : 'File gagal disalin!';
    }
// 7. Menampilkan URL File
public function urlFile()
{
    $url = Storage::disk('public')->url('documents/gambar_baru.png');

    return 'URL File: ' . $url;
}

// 8. Menampilkan Path File
public function pathFile()
{
    $path = Storage::disk('public')->path('documents/gambar_baru.png');

    return 'Lokasi File: ' . $path;
}
}
