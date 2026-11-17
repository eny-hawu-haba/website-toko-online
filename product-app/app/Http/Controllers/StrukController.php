<?php

namespace App\Http\Controllers;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Exception;

class StrukController extends Controller
{
    public function struk()
    {
        try {
            $connector = new WindowsPrintConnector('POS80-NEW');
            $printer = new Printer($connector);

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("================================\n");
            $printer->text("            ECOMART\n");
            $printer->text("       STRUK PEMBELIAN\n");
            $printer->text("================================\n");

            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Tanggal: " . date('d-m-Y H:i:s') . "\n");
            $printer->text("--------------------------------\n");
            $printer->text("Tas daur ulang       Rp 25.000\n");
            $printer->text("Kaos wanita          Rp 50.000\n");
            $printer->text("--------------------------------\n");
            $printer->text("TOTAL                Rp 75.000\n");
            $printer->text("================================\n");

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("Terima kasih telah berbelanja!\n");
            $printer->text("           EcoMart\n\n\n");

            $printer->cut();
            $printer->close();

            return response('Struk berhasil dicetak.', 200);

        } catch (Exception $e) {
            return response(
                'Gagal mencetak struk: ' . $e->getMessage(),
                500
            );
        }
    }
}