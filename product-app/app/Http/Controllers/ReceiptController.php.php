<?php

namespace App\Http\Controllers;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class ReceiptController extends Controller
{
    public function print()
    {
        try {
            $tanggal = date('d-m-Y H:i');

            $connector = new FilePrintConnector(
                storage_path('app/struk-simulasi.prn')
            );

            $printer = new Printer($connector);

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("TOKO STYLEMART\n");
            $printer->text("STRUK PEMBELIAN\n");
            $printer->text("--------------------------\n");

            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Tanggal: $tanggal\n");
            $printer->text("Pelanggan: Eny\n");
            $printer->text("--------------------------\n");

            $printer->text("Dress Wanita 1 x 100.000\n");
            $printer->text("Kaos Pria 2 x 50.000\n");
            $printer->text("--------------------------\n");
            $printer->text("Diskon: Rp10.000\n");
            $printer->text("TOTAL: Rp190.000\n");

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("Terima kasih!\n");

            $printer->cut();
            $printer->close();

            return view('print-receipt', [
                'tanggal' => $tanggal
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
