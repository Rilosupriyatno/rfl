<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Administration\Seller\ProductPicture;
use App\Models\User;
use App\Models\Administration\Cart\Order;
use PhpParser\Node\Stmt\Foreach_;

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

        foreach ($transactionList as $data) {
            $datachart= $data->carts;
            foreach ($datachart as $chardata) {
                $dataproduct = $chardata->product_id;
            }
        }
        // dd($dataproduct);
        $images = ProductPicture::all();
        // dd($images);
        return view('pages.administration.transaction.view',compact('transactionList','images'));
    }

    public function invoice(Request $request, $id)
    {
        $buyer_id = session()->get('id');

        $transactionList = Order::select('id', 'code', 'order_date', 'payment_method', 'discount_product', 'discount_shipment')
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

        
        $images = ProductPicture::all();
        $user = User::all();

        return view('pages.administration.transaction.invoice', compact('transactionList','images','user', 'id'));

    }

    public function transaction_list_detail(Request $request,$id){
        $buyer_id = session()->get('id');

        $transactionList = Order::select('id', 'code', 'order_date', 'payment_method', 'discount_product', 'discount_shipment')
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

        
        $images = ProductPicture::all();
        $user = User::all();

        return view('pages.administration.transaction.detail', compact('transactionList','images','user', 'id'));
    }
}