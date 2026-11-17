<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ReceiptController;
use App\Models\Product;
// Pengunjung boleh melihat produk
Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

// Halaman khusus Kasir
Route::middleware(['auth', 'kasir'])->group(function () {

    Route::get('/kasir/dashboard', function () {
        return view('kasir.dashboard');
    })->name('kasir.dashboard');

    Route::get('/kasir/purchase-history', [PurchaseHistoryController::class, 'index'])
        ->name('kasir.orders.history');

    Route::post('/kasir/logout', [AdminAuthController::class, 'logout'])
        ->name('kasir.logout');

});

// Hanya admin yang boleh mengelola produk
Route::middleware(['auth', 'admin'])->group(function () {    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
});
Route::redirect('/admin/login', '/login')->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('login.process');
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/purchase-history', [PurchaseHistoryController::class, 'index'])
        ->name('admin.orders.history');

    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');
            Route::get('/admin/products', function () {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    })->name('admin.products.index');

});
// Halaman Kategori sudah tidak digunakan
Route::redirect('/kategori', '/');
// Halaman Promo
Route::get('/promo', function () {
    return view('promo');
})->name('promo');

// Halaman Tentang
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

// Halaman Kontak
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
// Keranjang Belanja
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');

Route::post('/cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::delete('/cart/clear', [CartController::class, 'clear'])
    ->name('cart.clear');
    // Halaman Akun
Route::get('/account', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'admin'])->name('account');
// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

// Login dan Register
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Halaman Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Proses Register
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])
    ->name('register.process');// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');

// Struk
Route::get('/struk', function () {
    return view('checkout.struk');
})->name('struk');

// Cetak struk
Route::get('/print-receipt', [ReceiptController::class, 'print']);

// Upload file
Route::get('/upload', [FileController::class, 'index'])->name('upload.form');
Route::post('/upload', [FileController::class, 'upload'])->name('upload.file');
