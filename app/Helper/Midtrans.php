<?php
namespace App\Helper;

use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Transaction;

class Midtrans
{

    public function __construct()
    {
        Veritrans_Config::$serverKey = "Mid-server-Nm-f1lgAL6i3jYoxDBDBSQUJ";
        Veritrans_Config::$isProduction = true;
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }

    // membuat turunan fungsi Veritrans_Snap::createTransaction() agar dapat digunakan dengan veritrans config
    public static function createTransaction($params)
    {
        new Midtrans();
        return Veritrans_Snap::createTransaction($params);
    }

    // membuat turunan fungsi Veritrans_transaction::status() agar dapat digunakan dengan veritrans config
    public static function status($id)
    {
        new Midtrans();
        return Veritrans_Transaction::status($id);
    }

    // membuat turunan fungsi Veritrans_Snap::getSnapToken() agar dapat digunakan dengan veritrans config
    public static function getSnapToken($params)
    {
        new Midtrans();
        return Veritrans_Snap::getSnapToken($params);
    }

}
