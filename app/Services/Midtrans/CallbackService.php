<?php

namespace App\Services\Midtrans;

use App\Models\Administration\Cart\Order;
use App\Models\Administration\Cart\Cart;
use App\Services\Midtrans\Midtrans;
use Midtrans\Notification;

class CallbackService extends Midtrans
{
    public function updateOrder()
    {
        // Buat instance midtrans notification
        $notification = new Notification();
        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari transaksi berdasarkan ID
        $transaction = Order::where('id', $order_id)->first();
        // $orderDetail = Cart::where('order_id', $order_id)->first();

        // Handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->payment_status = "unpaid";
                } else {
                    $transaction->payment_status = "paid";
                }
            } else {
                // Jika $type bukan 'credit_card', atur nilai payment_status ke sesuatu yang sesuai
                $transaction->payment_status = "paid"; // Atau nilai lainnya yang relevan
            }
        }else{
            if($transaction_status =  "settlement"){
                 $transaction->payment_status = "paid"; // Atau nilai lainnya yang relevan
                //  $transaction->payment_status = "paid"; // Atau nilai lainnya yang relevan
                Cart::where('order_id', $order_id)
                ->update([
                    'status' => "selesai",
                ]);
            }
        }

        // Simpan transaksi
        $transaction->save();
        return view('pages.administration.transaction.invoice');

        // dd($notification);
    }
}
