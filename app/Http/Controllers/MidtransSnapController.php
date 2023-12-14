<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Administration\Cart\Order;
use App\Models\Administration\Cart\Cart;


class MidtransSnapController extends Controller
{
    //
    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');
    }
    public function pay(Request $request)
    {
        // count how many orders have been created
        $count = Order::count();
        // create invoice or order number
        $code = 'INV/' . date('Ymd') . '/' .  str_pad($count + 1, 5, '0', STR_PAD_LEFT);

        // form fields where will be inserted into order
        $formFields = [
            'grandtotal' => $request->input('grandtotal'),
            'code' => $code,
            'payment_method' => '-',
            'discount_product' => '0',
            'discount_shipment' => '0',
            'tax' => '0',
            'payment_status' => 'unpaid',
            'order_status' => 'pending',
            'order_date' => date('Y-m-d'),
        ];

        // create order
        $order = Order::create($formFields);
        $payload = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => $request->input('grandtotal'),
            ],
            'item_details' => [
                [
                    'id' => $request->input('product_id'),
                    'price' => $request->input('grantotal'),
                    'quantity' => 1,
                    'name' => $request->input('product_name'),
                ],
            ],
        ];


        $snapToken = \Midtrans\Snap::getSnapToken($payload);
        $formFields['snap_token'] = $snapToken;
        $order->update($formFields);

        // get input form hidden fields (for updating the cart (order details))
        $orderDetailIds = explode(',', $request->input('order_detail_id_inputter')[0]);
        $qtys = explode(',', $request->input('qty_inputter')[0]);
        $prices = explode(',', $request->input('price_inputter')[0]);

        for ($row = 0; $row < count($orderDetailIds); $row++) {
            // split by each data
            $order_id = $order->id;
            $orderDetailId = $orderDetailIds[$row];
            $qty = $qtys[$row];
            $price = $prices[$row];

            // update the cart
            Cart::where('id', (int)$orderDetailId)
                ->update([
                    'subtotal' => ((int)$qty * (int)$price),
                    'qty' => (int)$qty,
                    'order_id' => $order_id
                ]);
        }
        return response()->json([
            'status'     => 'success',
        ]);

        return redirect()->route('redirect_shipment', ['order_id' => $order->id]);
    }
}
