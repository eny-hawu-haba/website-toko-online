<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// 1. Route untuk Login (Bisa diakses publik tanpa token)
Route::post('/login', [AuthController::class, 'login']);

// 2. Route yang dilindungi oleh Sanctum (Harus pakai token untuk mengakses)
Route::middleware('auth:sanctum')->group(function () {
    
    // Mengambil data profil user yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Melakukan logout dan menghapus token API
    Route::post('/logout', [AuthController::class, 'logout']);
    
});