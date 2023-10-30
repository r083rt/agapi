<?php
namespace App\Helper;

class Midtrans
{

    public function __construct()
    {
        // \Midtrans\Config::$serverKey = "Mid-server-Nm-f1lgAL6i3jYoxDBDBSQUJ";
        // \Midtrans\Config::$isProduction = true;
        // \Midtrans\Config::$isSanitized = true;
        // \Midtrans\Config::$is3ds = true;

        \Midtrans\Config::$serverKey = "SB-Mid-server-f3kMDse4fDbYgXzVJk7vIVvU";
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    // membuat turunan fungsi Veritrans_Snap::createTransaction() agar dapat digunakan dengan veritrans config
    public static function createTransaction($params)
    {
        new Midtrans();
        return \Midtrans\Snap::createTransaction($params);
    }

    // membuat turunan fungsi Veritrans_transaction::status() agar dapat digunakan dengan veritrans config
    public static function status($id)
    {
        new Midtrans();
        return \Midtrans\Transaction::status($id);
    }

    // membuat turunan fungsi Veritrans_Snap::getSnapToken() agar dapat digunakan dengan veritrans config
    public static function getSnapToken($params)
    {
        new Midtrans();
        return \Midtrans\Snap::getSnapToken($params);
    }

    public function notification()
    {
        new Midtrans();
        return new \Midtrans\Notification();
    }

}
