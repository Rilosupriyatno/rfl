<?php

namespace App\Http\Controllers\Administration\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administration\Cart\Cart;

class AdministrationOrderController extends Controller
{
    protected $url = "administration/order-in";
    protected $pages = 10;

    public function detailOrderIn()
    {
        // get seller from auth
        $seller = auth()->user()->id;

        // get all order in
        $data['order_in'] = Cart::select('id', 'order_id', 'buyer_id', 'seller_id', 'product_id', 'qty')
                    ->with(['orders' => function($order) {
                        $order->select('id', 'code', 'payment_method', 'payment_status', 'created_at');
                    }])
                    ->with(['user_buyers' => function($user_buyer) {
                        $user_buyer->select('id', 'name');
                    }])
                    ->with(['products' => function($product) {
                        $product->select('id', 'name', 'description', 'price');
                    }])
                    ->where('seller_id', $seller)
                    ->whereNotNull('order_id')
                    ->orderBy('id', 'desc')
                    ->paginate($this->pages);

        return view('pages.administration.order.view', $data);
    }
}