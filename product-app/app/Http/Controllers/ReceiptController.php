<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function print()
    {
        $tanggal = date('d-m-Y H:i:s');

        $barang = [
            [
                'nama' => 'Baju Wanita',
                'jumlah' => 1,
                'harga' => 100000
            ],
            [
                'nama' => 'Celana Jeans',
                'jumlah' => 1,
                'harga' => 150000
            ],
        ];

        $total = 0;

        foreach ($barang as $item) {
            $total += $item['jumlah'] * $item['harga'];
        }

        return view('print-receipt', compact(
            'tanggal',
            'barang',
            'total'
        ));
    }
}
