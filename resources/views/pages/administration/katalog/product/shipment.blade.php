<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/icons/logo.png') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet" />
    <title>Rattan For Life</title>
</head>
@php
use App\Http\Controllers\Administration\Katalog\ProductController;
$productController = app(ProductController::class);
@endphp

<body>
    <main class="main-container">
        <header class="w-full pt-[2rem] pb-[1.5rem]">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex items-center">
                <div class="w-full items-center justify-between">
                    <div class="flex items-center gap-8">
                        <div class="w-[2rem] hover:cursor-pointer">
                            <a href="{{ route(session('url_back_view')) }}">
                                <img src="{{ asset('assets/icons/left-arrow.png') }}" alt="Left Arrow" class="w-full">
                            </a>
                        </div>
                        <span class="text-[1.4rem] font-bold">Pengiriman</span>
                    </div>
                </div>
            </div>
        </header>
        <main class="w-full pb-[3rem]">
            <section class="w-full py-[1rem]">
                <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex flex-col gap-[1.5rem] items-start">
                    <div class="w-full flex items-center justify-between">
                        <h6 class="text-[1.4rem] font-bold">Alamat Pengiriman</h6>
                        <a href="javascript:;" class="text-[1.4rem] text-orange-400 font-bold">Pilih Alamat Lain</a>
                    </div>
                    <div class="w-full flex flex-col border border-gray-300 rounded-2xl px-6 py-2">
                        <span class="text-[1.4rem] font-bold">Nama Pembeli (Nomor Handphone)</span>
                        <p class="text-[#767676] wrap-one-line">Alamat Pembeli</p>
                    </div>
                    @php
                    // list variable value for shipment order
                    $orderId = $getShipmentOrder->id;
                    $orderCode = $getShipmentOrder->code;
                    $orderPaymentMethod = $getShipmentOrder->payment_method;
                    $orderDiscountProduct = $getShipmentOrder->discount_product;
                    $orderDiscountShipment = $getShipmentOrder->discount_shipment;
                    $orderTax = $getShipmentOrder->tax;
                    $orderGrandTotal = $getShipmentOrder->grandtotal;
                    $orderPaymentStatus = $getShipmentOrder->payment_status;
                    $orderStatus = $getShipmentOrder->order_status;

                    // totaling all
                    $total_qty = 0;
                    $weight = 0;
                    @endphp
                    <!-- list orders -->
                    @foreach ($listOrders as $order)
                    @php
                    $orderNumber = $loop->iteration;
                    $buyerId = 0;
                    $buyerAddress = '';
                    $sub_total = 0;
                    $order_detail_ids = [];
                    $sellerId = $order->id;
                    $sellerName = ucwords($order->name);
                    $cityName = ucwords($order->cities->description);
                    $cartProducts = $order->carts;
                    @endphp
                    <span class="text-[1.4rem] font-bold">Pesanan {{ $orderNumber }}</span>
                    <div class="w-full flex flex-col border border-gray-300 rounded-2xl py-2">
                        <div class="flex flex-col px-6 pb-2">
                            <span class="text-[1.4rem] font-bold">{{ $sellerName }}</span>
                            <p class="text-[#767676]">{{ $sellerName }}, {{ $cityName }}</p>
                        </div>
                        <!-- cart product list -->
                        @foreach ($cartProducts as $cartProduct)
                        @php
                        // list variable value for cart product
                        $cartId = $cartProduct->id;
                        $cartPrice = $cartProduct->price;
                        $cartQuantity = $cartProduct->qty;
                        $cartSubTotal = $cartProduct->subtotal;
                        $cartStatus = $cartProduct->status;
                        $product = $cartProduct->products;
                        $buyer = $cartProduct->user_buyers;

                        // data product
                        $productId = $product->id;
                        $productName = $product->name;
                        $productRattanFrom = $product->rattan_form;
                        $productWeight = $product->weight;
                        $productSizeMax = $product->size_max;
                        $productSizeMin = $product->size_min;
                        $productPrice = $product->price;
                        $productGradeDesc = $product->grades->description;

                        // product image
                        $getImage = $productController->getImage($productId);

                        if ($getImage) {
                        $image = $getImage->name;
                        }

                        // count all
                        array_push($order_detail_ids, $cartId);
                        $weight += $productWeight * $cartQuantity;
                        $sub_total += $cartSubTotal;
                        $total_qty += $cartQuantity;
                        $buyerId = $cartProduct->buyer_id;
                        $buyerAddress = $buyer->address;
                        @endphp
                        <div class="flex items-center gap-5 border-t-2 px-6 py-4">
                            <div class="w-[7.5rem] h-[7.5rem]">
                                <img src="/{{ $image }}" alt="rattan-material" class="w-full h-full">
                            </div>
                            <div class="flex flex-col gap-2">
                                <div class="flex flex-col">
                                    <span class="text-[1.4rem] font-bold">{{ $productName }}</span>
                                    <span class="text-[#767676]">{{ $productRattanFrom }}</span>
                                </div>
                                <div class="flex items-center gap-[0.5rem]">
                                    <span class="text-[#767676]">{{ $productSizeMin }}mm - {{ $productSizeMax
                                        }}mm</span>
                                    <span class="bg-[#FFCC33] px-[0.5rem] py-[0.1rem] rounded-[1rem]">{{
                                        $productGradeDesc }}</span>
                                </div>
                                <div class="flex items-end gap-2">
                                    <span class="font-bold text-[1.2rem]">{{ rupiah($productPrice) }}</span>
                                    <span class="text-[#767676]">{{ $cartQuantity }} Barang</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="flex flex-col px-6 pb-2 gap-4">
                            <div class="courier-selection flex flex-col gap-2">
                                <select name="courier" id="courier"
                                    class="courier border border-gray-200 p-4 rounded-lg focus:border-gray-200 font-bold text-[1.2rem]">
                                    <option value="" selected disabled>Pilih Kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS INDONESIA</option>
                                </select>
                                <input type="hidden" value="{{ join(" ,", $order_detail_ids) }}" id="order_detail_list">
                                <input type="hidden" value="{{ $sellerId }}" id="city_seller">
                                <input type="hidden" value="{{ $buyerId }}" id="city_buyer">
                                <input type="hidden" value="{{ $buyerAddress }}" id="buyer_address">
                                <input type="hidden" value="{{ $weight }}" id="total_weight">
                            </div>
                            <div
                                class="shipment-container flex items-center justify-between px-6 py-4 pointer-events-none rounded-lg border border-gray-200 bg-gray-200">
                                <span class="font-bold text-[1.2rem]">Pilih Pengiriman</span>
                                <div class="w-[1.5rem] h-[1.5rem] gray-arrow">
                                    <img src="{{ asset('assets/icons/more-than.png') }}" alt="Right Arrow"
                                        class="w-full h-full">
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between px-6 py-4">
                            <span class="text-[1.2rem] font-bold">Subtotal</span>
                            <span class="text-[1.2rem] font-bold">{{ rupiah($sub_total) }}</span>
                        </div>
                    </div>
                    @endforeach
                    <div
                        class="cart-overview-container w-full flex flex-col gap-4 border border-gray-300 rounded-2xl px-6 py-2">
                        <h6 class="text-[1.4rem] font-bold">Ringkasan Belanja</h6>
                        <div class="cart-overview-total flex flex-col gap-2">
                            <div class="total-price flex items-center justify-between">
                                <input type="hidden" value="{{ $orderGrandTotal }}">
                                <span class="text-[1.2rem] text-[#767676]">Total Harga ({{ $total_qty }} Barang)</span>
                                <span class="text-[1.2rem] font-bold">{{ rupiah($orderGrandTotal) }}</span>
                            </div>
                            <div class="total-shipment flex items-center justify-between">
                                <span class="text-[1.2rem] text-[#767676]">Total Ongkos Barang</span>
                                <span class="text-[1.2rem] font-bold ongkos">-</span>
                            </div>
                        </div>
                        <div class="cart-overview-sub-total border-t-2 flex flex-col gap-4 py-4">
                            <div class="sub-total flex items-center justify-between">
                                <span class="text-[1.2rem] text-[#767676]">Total Tagihan</span>
                                <span class="text-[1.2rem] font-bold total_tagihan">{{ rupiah($orderGrandTotal)
                                    }}</span>
                            </div>
                            <div class="cursor-not-allowed">
                                <a href="javascript:;"
                                    class="w-full inline-block bg-gray-200 rounded-lg text-[1.2rem] font-bold text-center py-3 pointer-events-none"
                                    id="pay-button" data-order="{{ $orderId }}">Pilih Pembayaran</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </main>
    <script defer src="{{ mix('js/pages/administration/product/shipment-payment.js') }}"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>