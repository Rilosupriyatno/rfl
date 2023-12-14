<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Models\Administration\Cart\Order;

class TransactionController extends Controller
{
    public function transaction_list()
    {
        // get buyer id
        $buyer_id = session()->get('id');

        // get all list of transaction
        $transactionList = Order::select('id', 'code', 'order_status', 'order_date')
        ->with(['carts' => function($cart) use ($buyer_id) {
            $cart->select('id', 'order_id', 'buyer_id', 'seller_id', 'product_id', 'price', 'qty', 'subtotal', 'status')
            ->with(['products' => function($product) {
                $product->select('id', 'seller_id', 'grade_id', 'name', 'rattan_from', 'weight', 'size_max', 'size_min', 'price')
                ->with(['grades' => function($category) {
                    $category->select('id', 'description');
                }]);
            }])
            ->where('buyer_id', $buyer_id);
        }])
        ->whereHas('carts', function($cart) use ($buyer_id) {
            $cart->where('buyer_id', $buyer_id);
        })
        ->get();

        dd($transactionList);

        return view('pages.administration.transaction.view');
    }

    public function invoice(Request $request)
    {
        return view('pages.administration.transaction.invoice');

    }
}