<?php

namespace App\Http\Controllers\Administration\Cart;

use Illuminate\Routing\Controller;
use App\Models\Administration\Seller\Product;
use App\Models\Administration\Seller\ProductPicture;
use App\Models\Administration\Cart\Cart;
use App\Services\Rajaongkir\RajaongkirService;
use App\Models\Administration\Cart\Order;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Models\User;
use App\Models\Transaction\Shipping;
use App\Models\Expedition;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{

    protected $rajaongkirService;
    public function __construct(RajaongkirService $rajaongkirService)
    {
        $this->rajaongkirService = $rajaongkirService;
    }

    public function redirect_shipment(Request $request)
    {
        // variable
        $order_id = $request->order_id;
        $seller_role_id = 1;

        // get query for detailing shipment order
        $getShipmentOrder = Order::select('id', 'code','expeditions_id', 'payment_method', 'discount_product', 'discount_shipment', 'tax', 'grandtotal', 'payment_status', 'order_status', 'snap_token')
            ->where('id', $order_id)
            ->first();

        $listOrders = User::select('id', 'user_role_id', 'city_id', 'name', 'address')
            ->with(['cities' => function ($city) {
                $city->select('id', 'description');
            }])
            ->with(['carts' => function ($cart) {
                $cart->select('id', 'order_id', 'buyer_id', 'seller_id', 'product_id', 'price', 'qty', 'subtotal', 'status')
                    ->with(['user_buyers' => function ($user_buyer) {
                        $user_buyer->select('id', 'address');
                    }])
                    ->with(['products' => function ($product) {
                        $product->select('id', 'seller_id', 'grade_id', 'name', 'rattan_from', 'weight', 'size_max', 'size_min', 'price')
                            ->with(['grades' => function ($category) {
                                $category->select('id', 'description');
                            }]);
                    }])
                    ->where('status', 'belum selesai');
            }])
            ->whereHas('carts', function ($cart) {
                $cart->where('status', 'belum selesai');
            })
            ->where('user_role_id', $seller_role_id)
            ->get();

            // get the expedition data

            $expeditions = Expedition::select('id', 'name', 'price')->get();


        // add session
        session()->put('data_order_shipment', $getShipmentOrder);
        session()->put('list_orders', $listOrders);
        // session()->put('expeditions', $expeditions);

        return redirect()->route('shipment');
    }

    public function shipment(Request $request)
    {
        $data['getShipmentOrder'] = session()->get('data_order_shipment');
        $data['listOrders'] = session()->get('list_orders');
        // $data['expeditions'] = session()->get('expeditions');

        session()->put('url_back_view', "cart");

        return view('pages.administration.katalog.product.shipment', $data);
    }
    public function create_snaptoken(Request $request)
    {

        // from request user
        $dataOrder = $request->data_order;
        $updatedGrandTotal = $request->grand_total;
        $shippingData = json_decode($request->shipping_data, true);
        $shippingFees = explode(",", $request->shipping_fees);

        // get from session data
        $data['listOrders'] = session()->get('list_orders');

        // update the grand total first before going create snaptoken
        $updateOrder = tap(Order::where('id', $dataOrder))
            ->update(['grandtotal' => $updatedGrandTotal])
            ->first();

        // array empty for item carts
        $itemCarts = [];

        // get the cart item list
        foreach ($data['listOrders'] as $listOrder) {
            $carts = $listOrder->carts;

            foreach ($carts as $cart) {
                array_push($itemCarts, $cart);
            }
        }

        // get only one shipping data
        $oneShippingData = $shippingData[0];

        // shipping billing address data
        $shippingBillingAddress = [
            'billingAddress' => $oneShippingData['billing_address'],
            'shippingAddress' => $oneShippingData['shipping_address'],
        ];

        // create snap token service
        $midtrans = new CreateSnapTokenService($updateOrder, $itemCarts, $shippingFees, $shippingBillingAddress);

        // get snap token
        $snapToken = $midtrans->getSnapToken();

        // get order detail
        $getOrderDetailIds = collect($shippingData)->map(function ($shipping) {
            return (int) $shipping['order_detail_id'];
        });

        $countExistShipmentData = Shipping::whereIn('order_detail_id', $getOrderDetailIds)->count();

        // insert shipment where shipment is not exist
        if ($countExistShipmentData == 0) {
            // insert the shipping data
            $shipping = new Shipping();

            // shipping data
            foreach ($shippingData as $data) {
                // define the shipping estimate
                $shippingEstimate = $data['shipping_estimate'][0];
                $shippingEstimateDayStart = $shippingEstimate['estimate_day'][0];
                $shippingEstimateDayEnd = count($shippingEstimate['estimate_day']) > 1 ? $shippingEstimate['estimate_day'][1] : $shippingEstimate['estimate_day'][0];

                // change the format to yyyy dd mmm
                $estimateStart = date('Y-m-d', strtotime($shippingEstimateDayStart));
                $estimateEnd = date('Y-m-d', strtotime($shippingEstimateDayEnd));
                $dateNow = date('Y-m-d H:i:s');

                $shippings[] = [
                    'order_detail_id' => $data['order_detail_id'],
                    'shipping_name' => $data['shipping_name'],
                    'shipping_number' => $data['shipping_number'],
                    'shipping_address' => $data['shipping_address'],
                    'billing_address' => $data['billing_address'],
                    'shipping_weight' => $data['shipping_weight'],
                    'shipping_fee' => $data['shipping_fee'][0]['amount'],
                    'shipping_estimate_start' => $estimateStart,
                    'shipping_estimate_end' => $estimateEnd,
                    'shipping_service_detail' => $data['shipping_services'][0]['service'],
                    'created_at' => $dateNow,
                    'updated_at' => $dateNow
                ];
            }

            // insert to shipping data with multiple data
            $shipping->insert($shippings);
        }

        // get query for take current order
        $currOrder = Order::where('id', $dataOrder)->first();

        // save the token into database
        $saveToken = Order::where('id', $currOrder->id)->update([
            'snap_token' => $snapToken,
        ]);

        if ($saveToken) {
            return response()->json([
                'snap_token' => $snapToken,
                'order_id' => $currOrder->id,
            ]);
        }
    }

    public function success_payment(Request $order, $order_id)
    {
        // get the current order
        $findOrder = Order::Where('id', $order_id)->first();

        // update the payment status for current order
        $paidStatus = [
            'payment_method' => $order->payment_type,
            'payment_status' => 'paid',
            'order_status' => 'prosess'
        ];

        // do update payment status
        $updatePaymentStatus = Order::find($findOrder->id)->update($paidStatus);

        // update the cart data status
        $cartStatus = [
            'status' => 'selesai',
        ];

        // do update cart status
        $updateCartStatus = Cart::where('order_id', $findOrder->id)->update($cartStatus);

        // check the both of process is successful
        if ($updatePaymentStatus && $updateCartStatus) {
            // make it empty the session data
            session()->put('data_order_shipment', []);
            session()->put('list_orders', []);

            // return the success response
            return response()->json([
                'success_payment' => 'Pembayaran berhasil'
            ], 200);
        }
    }

    public function getSeller($seller_id)
    {
        $seller = User::where('id', $seller_id)->first();
        return $seller;
    }

    public function getProductSeller($seller_id, $order_id)
    {
        $cart  = Cart::where('buyer_id', session()->get('id'))->where('seller_id', $seller_id)->where('order_id', $order_id)
            ->where('status', 'belum selesai')
            ->get();

        return $cart;
    }
}
