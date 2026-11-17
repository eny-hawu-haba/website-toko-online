<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pembelian - EnyMart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8e9ee;
        }

        .page-header {
            background: linear-gradient(120deg, #4a2939, #873e61);
            color: white;
        }

        .history-card {
            background: #fff0f5;
            border: 0;
            border-radius: 12px;
        }
    </style>
</head>
<body>
    <header class="page-header py-4">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <h1 class="h3 mb-1">Riwayat Pembelian</h1>
                <p class="mb-0">Daftar transaksi pembelian EnyMart</p>
            </div>
            <a href="{{ route($dashboardRoute) }}" class="btn btn-light">
                Kembali ke Dashboard
            </a>
        </div>
    </header>

    <main class="container py-4">
        <div class="card history-card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-danger">
                            <tr>
                                <th>No. Transaksi</th>
                                <th>Tanggal</th>
                                <th>Pembeli</th>
                                <th>Barang</th>
                                <th>Pembayaran</th>
                                <th class="text-end">Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td class="text-nowrap">
                                        EM-{{ str_pad((string) $order->id, 6, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td class="text-nowrap">
                                        {{ $order->created_at?->format('d/m/Y H:i') ?? '-' }}
                                    </td>
                                    <td>
                                        <div class="fw-semibold">
                                            {{ $order->customer_name ?: ($order->user?->name ?? '-') }}
                                        </div>
                                        @if($order->customer_phone)
                                            <small class="text-muted">{{ $order->customer_phone }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @forelse($order->items as $item)
                                            <div>
                                                {{ $item->product_name }} ({{ $item->quantity }} ×
                                                Rp{{ number_format((float) $item->unit_price, 0, ',', '.') }})
                                            </div>
                                        @empty
                                            <span class="text-muted">Rincian tidak tersedia</span>
                                        @endforelse
                                    </td>
                                    <td>{{ $order->payment_method ?? '-' }}</td>
                                    <td class="text-end text-nowrap">
                                        Rp{{ number_format((float) $order->total, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <span class="badge {{ $order->status === 'pending' ? 'text-bg-warning' : 'text-bg-secondary' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-5">
                                        Belum ada riwayat pembelian.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($orders->hasPages())
                    <div class="mt-3">
                        {{ $orders->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
