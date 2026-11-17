<?php

namespace App\Http\Controllers;

use App\Models\Order;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'items'])
            ->latest()
            ->paginate(15);

        $dashboardRoute = auth()->user()->role === 'admin'
            ? 'admin.dashboard'
            : 'kasir.dashboard';

        return view('orders.history', compact('orders', 'dashboardRoute'));
    }
}
