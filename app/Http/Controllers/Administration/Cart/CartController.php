<?php

namespace App\Http\Controllers\Administration\Cart;

use Illuminate\Routing\Controller;
use App\Models\Administration\Seller\Product;
use App\Models\Administration\Seller\ProductPicture;
use App\Models\Administration\Cart\Cart;
use App\Models\Administration\Cart\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $url = "/administration/cart/";

    public function index(Request $request)
    {
        $view = null;
        if (!$request->index) {
        } else {
            // dd($request->index);
            session()->put('url_back_view', "katalog");
            session()->put('web', "category");
            session()->put('p_view', $request->index);
            return redirect()->route('cart');
        }

        if (!$request->xy) {
            // dd('dada');
            // dd($request->xy);
        } else {
            session()->put('url_back_view', "product_view");
            session()->put('web', "product");
            session()->put('p_view', $request->xy);
            return redirect()->route('cart');
        }
        $data['getSeller'] = Cart::select('seller_id')->where('buyer_id', session()->get('id'))
        ->where('status', 'belum selesai')
        ->groupBy('seller_id')
        ->get();
        // dd($data);
        return view('pages.administration.katalog.product.cart', $data);
    }

    public function add_buy_directly(Product $product)
    {
        // dd($product);
        $formFields = [
            'buyer_id' => session()->get('id'),
            'seller_id' => $product->seller_id,
            'product_id' => $product->id,
            'qty' => 1,
            'price' => $product->price,
            'status' => "belum selesai",
            'subtotal' => $product->price,
        ];

        $cart = Cart::create($formFields);
        $data = Cart::where('id', $cart->id)->where('status', "direct")->first();

        session()->put('data_buy_directly', $data);
        session()->put('url_back_view', "product_view");
        session()->put('p_view', $product->id);

        return redirect()->route('buy_directly');
    }

    public function buy_directly(Request $request)
    {
        $getOrder = session()->get('data_buy_directly');

        $data['url_back_view'] = session()->get('url_back_view');
        $data['p_view'] = session()->get('p_view');

        $data['image'] = ProductPicture::select('name')->where('product_id', $getOrder->product_id)->first();

        $data['dataDirect'] = $getOrder;
        $data['seller'] = User::where('id', $getOrder->seller_id)->first();

        return view('pages.administration.katalog.product.buy-directly', $data);
    }


    public function add(Product $product)
    {
        $getCart = Cart::where('product_id', $product->id)->where('status', "belum selesai")->first();

        if (!empty($getCart)) {
            $formFields = [
                'buyer_id' => session()->get('id'),
                'qty' => $getCart->qty + 1,
                'seller_id' => $product->seller_id,
                'price' => $product->price,
                'subtotal' => ($getCart->qty + 1) * $product->price,
            ];

            $cart = Cart::find($getCart->id)->update($formFields);
        } else {
            $formFields = [
                'buyer_id' => session()->get('id'),
                'seller_id' => $product->seller_id,
                'product_id' => $product->id,
                'qty' => 1,
                'price' => $product->price,
                'subtotal' => $product->price,
            ];

            $cart = Cart::create($formFields);
        }

        return redirect('administration/katalog/product/' . $product->id . '/view')->with('status', 'barang sudah masuk ke keranjang');
    }

    public function update(Request $request)
    {
        // count how many orders have been created
        $count = Order::count();
        // create invoice or order number
        $code = 'INV/' . date('Ymd') . '/' .  str_pad($count + 1, 5, '0', STR_PAD_LEFT);

        // form fields where will be inserted into order
        $formFields = [
            'grandtotal' => $request->input('grandtotal'),
            'code' => $code,
            'expeditions_id' => 1,
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
            // Cart::create([
            //     'order_id' => $order_id,
            //     'buyer_id' => session()->get('id'),
            //     'seller_id' => $request->input('seller_id'),
            //     'product_id' => $orderDetailIds[$row],
            //     'qty' => (int)$qty,
            //     'price' => (int)$price,
            //     'subtotal' => ((int)$qty * (int)$price),
            //     'status' => 'belum selesai',
            // ]);
        }

        return redirect()->route('redirect_shipment', ['order_id' => $order->id]);
    }

    public function delete(Cart $orderDetails)
    {
        $formFields = [
            'status' => "canceled",
        ];

        $cart = Cart::find($orderDetails->id)->update($formFields);

        return redirect('administration/cart/')->with('status', '1 Barang telah di hapus');
    }

    public function getSeller($id)
    {
        $seller = User::where('id', $id)->first();
        return $seller;
    }
    public function getProductSeller($id)
    {
        $cart  = Cart::where('buyer_id', session()->get('id'))->where('seller_id', $id)
            ->where('status', 'belum selesai')
            ->get();

        return $cart;
    }
}
