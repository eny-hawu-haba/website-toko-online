<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Menampilkan semua data buku
    public function index()
    {
        return response()->json(Book::all(), 200);
    }

    // Menyimpan data buku
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|integer',
        ]);

        $book = Book::create($validated);

        return response()->json([
            'message' => 'Data buku berhasil ditambahkan',
            'data' => $book
        ], 201);
    }

    // Menampilkan satu data buku
    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return response()->json($book, 200);
    }

    // Memperbarui data buku
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|integer',
        ]);

        $book->update($validated);

        return response()->json([
            'message' => 'Data buku berhasil diperbarui',
            'data' => $book
        ], 200);
    }

    // Menghapus data buku
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json([
            'message' => 'Data buku berhasil dihapus'
        ], 200);
    }
}
