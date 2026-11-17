<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Events\OrderPlaced;

class CheckoutController extends Controller
{
    public function index()
    {
        $order = session()->get('checkout_order');
        $cart = session()->get('cart', []);

        if (!empty($order)) {
            return view('checkout.index', [
                'cart' => $order['cart'],
                'total' => $order['total'],
                'order' => $order,
            ]);
        }

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += (float) $item['price']
                * (int) $item['quantity'];
        }

        return view('checkout.index', [
            'cart' => $cart,
            'total' => $total,
            'order' => null,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:1000',
            'pembayaran' => 'required|in:Transfer Bank,COD,E-Wallet',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        $total = 0;

        foreach ($cart as $item) {
            $total += (float) $item['price']
                * (int) $item['quantity'];
        }

        $user = auth()->user();

        try {
            $savedOrder = DB::transaction(function () use ($user, $total, $cart, $validated) {
                $order = Order::create([
                    'user_id' => $user?->id,
                    'customer_name' => $validated['nama'],
                    'customer_phone' => $validated['no_hp'],
                    'customer_address' => $validated['alamat'],
                    'payment_method' => $validated['pembayaran'],
                    'total' => $total,
                    'status' => 'pending',
                ]);

                foreach ($cart as $item) {
                    $quantity = (int) $item['quantity'];
                    $unitPrice = (float) $item['price'];

                    $order->items()->create([
                        'product_name' => $item['name'] ?? 'Produk',
                        'unit_price' => $unitPrice,
                        'quantity' => $quantity,
                        'subtotal' => $unitPrice * $quantity,
                    ]);
                }

                return $order;
            });

            $order = [
                'nomor' => 'SM-' . date('YmdHis'),
                'tanggal' => now()->format('d-m-Y H:i'),
                'nama' => $validated['nama'],
                'no_hp' => $validated['no_hp'],
                'alamat' => $validated['alamat'],
                'pembayaran' => $validated['pembayaran'],
                'cart' => $cart,
                'total' => $total,
            ];

            session()->put('checkout_order', $order);
            session()->forget('cart');

            // Kirim notifikasi kepada pembeli yang login
            if ($user) {
                OrderPlaced::dispatch($savedOrder);
            }

            return redirect()->route('struk')
                ->with('success', 'Checkout berhasil.');

        } catch (\Throwable $e) {
            report($e);

            return back()->withInput()
                ->with('error', 'Checkout gagal. Silakan coba kembali.');
        }
    }
}
