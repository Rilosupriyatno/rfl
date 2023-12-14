<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/icons/rattan-logo.svg') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Rattan For Life</title>
</head>
@php
use App\Http\Controllers\Administration\Cart\CartController;
use App\Http\Controllers\Administration\Katalog\ProductController;
$cartController = app(CartController::class);
$productController = app(ProductController::class);
@endphp

<body>
    <main>
        <header class="w-full pt-[2rem] pb-[1.5rem]">
            <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex items-center">
                <div class="w-full flex items-center justify-between">
                    <div class="flex items-center gap-8">
                        <div class="w-[2rem] hover:cursor-pointer">
                            <a href="{{ route(session('url_back_view'), [session('web') => session('p_view')]) }}">
                                <img src="{{ asset('assets/icons/left-arrow.png') }}" alt="Left Arrow" class="w-full">
                            </a>
                        </div>
                        <span class="text-[1.4rem] font-bold">Keranjang</span>
                    </div>
                </div>
            </div>
        </header>
        <main class="w-full pb-[3rem]">
            <section class="w-full py-[1rem]">
                <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex flex-col gap-[1.5rem] items-start">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="check-all" name="select-all">
                        <label for="check-all" class="text-[1.4rem]">Pilih Semua</label>
                    </div>
                    <section class="w-full py-[1rem]">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    </section>
                    @foreach($getSeller as $seller)
                    @php
                    $getSeller = $cartController->getSeller($seller->seller_id);
                    $getProductSeller = $cartController->getProductSeller($seller->seller_id);
                    @endphp
                    <div class="w-full flex flex-col border border-gray-300 rounded-2xl py-2">
                        <div class="flex flex-col">
                            <div class="flex gap-4 items-center px-6 pb-4">
                                <input type="checkbox" id="check-product" data="{{$seller->seller_id}}" name="check-product">
                                <div>
                                    <span class="text-[1.4rem] font-bold">{{ $getSeller->name }}</span>
                                    <p class="text-[#767676]">Petani , {{ $getSeller->cities->description }}</p>
                                </div>
                            </div>
                            @foreach ($getProductSeller as $data)
                            @php
                            $getImage = $productController->getImage($data->products->id);
                            if ($getImage){
                            $image = $getImage->name;
                            }
                            @endphp
                            <div class="flex flex-col gap-5 border-t-2 py-4 px-6">
                                <div class="flex gap-4 items-center">
                                    <input type="checkbox" id="check-list-product{{$seller->seller_id}}" name="check-list-product{{$seller->seller_id}}[]">
                                    <div class="flex gap-5 items-center">
                                        <div class="w-[7.5rem] h-[7.5rem]">
                                            <!-- <img src="{{ asset('assets/image/rotan1.jpg') }}" alt="rattan-material" class="w-full h-full"> -->
                                            <img src="/{{ $image }}" alt="rattan-material" class="w-full h-full">
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <div class="flex flex-col">
                                                <span class="text-[1.4rem] font-bold">{{ $data->products->name }}</span>
                                                <span class="text-[#767676]">{{ $data->products->rattan_from }}</span>
                                            </div>
                                            <div class="flex items-center gap-[0.5rem]">
                                                <span class="text-[#767676]">{{ $data->products->size_min }}mm - {{ $data->products->size_max }}mm</span>
                                                <span class="bg-[#FFCC33] px-[0.5rem] py-[0.1rem] rounded-[1rem]">{{ $data->products->grades->description }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-6 pb-2">
                                    <div class="flex items-center justify-between">
                                        <span class="text-[1.2rem] text-orange-400 cursor-pointer">Tulis Catatan</span>
                                        <span class="text-[1.2rem] font-bold"> Rp. {{ number_format($data->products->price, 0, ',', '.') }}</span>
                                        <input type="hidden" name="subtotal" data="{{$data->subtotal}}" id="subtotal">
                                        <input type="hidden" name="price" data="{{$data->products->price}}" id="price">
                                        {{-- <input type="hidden" name="order_detail_id" data="{{$data->id}}" id="order_detail_id"> --}}
                                        <input type="hidden" pattern="\d*" class="w-full max-w-[3rem] text-center outline-none" name="order_detail_id" id="order_detail_id" value="{{$data->id}}">
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <a href="javascript:;" class="text-[1.2rem] text-[#767676]">Tambahkan ke Wishlist</a>
                                        <div class="flex items-center gap-6">
                                            <form method="POST" action="/administration/cart/{{ $data->id }}/delete" method="POST" class="d-inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-sm ">
                                                    <div class="w-[2rem] h-[2rem] cursor-pointer">
                                                        <img src="{{ asset('assets/icons/trash.png') }}" id="delete_data" data="{{ $data->id }}" alt="Trash" class="w-full h-full">
                                                    </div>
                                                </button>
                                            </form>
                                            <div class="flex items-center border border-gray-300 px-4 py-2 rounded-xl gap-6 add-remove-container">
                                                <button class="w-[1.2rem] h-[1.2rem] bg-transparent active-qty">
                                                    <img src="{{ asset('assets/icons/minus.png') }}" alt="minus">
                                                </button>
                                                <input type="text" pattern="\d*" class="w-full max-w-[3rem] text-center outline-none" name="qty" id="qty" value="{{ $data->qty }}">
                                                <button class="w-[1.2rem] h-[1.2rem] active-qty">
                                                    <img src="{{ asset('assets/icons/plus.png') }}" alt="plus">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    <div class="w-full flex flex-col gap-4  bottom-0 border border-gray-300 rounded-2xl px-6 py-2">
                        <h6 class="text-[1.4rem] font-bold">Ringkasan Belanja</h6>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center justify-between">
                                <span id="total-barang" class="text-[1.2rem] text-[#767676]">Total Harga (0 Barang)</span>
                                {{-- <span class="text-[1.2rem] font-bold">Rp. 342.200</span> --}}
                                <span class="text-[1.2rem] font-bold" id="total-subtotal">Rp. 0</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-[1.2rem] text-[#767676]">Total Diskon Barang</span>
                                <span class="text-[1.2rem] font-bold">-Rp. 0</span>
                            </div>
                        </div>
                        <div class="border-t-2 flex flex-col gap-4 py-4">
                            <div class="flex items-center justify-between">
                                <span class="text-[1.2rem] text-[#767676]">Total Bayar</span>
                                <span class="text-[1.2rem] font-bold" id="grandtotal_data">Rp. 0</span>
                            </div>
                            <form method="POST" action="/administration/cart/update" class="card mb-5 tooltip-end-top">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="order_detail_id_inputter[]" id="order_detail_id_inputter">
                                <input type="hidden" name="qty_inputter[]" id="qty_inputter">
                                <input type="hidden" name="price_inputter[]" id="price_inputter">
                                <input type="hidden" name="grandtotal" id="grandtotal">
                                <button type="submit" class="bg-[#FFCC33] rounded-lg text-[1.2rem] font-bold text-center py-3">
                                    <i data-acorn-icon="save" class="icon"></i>
                                    <span>Beli</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </main>
    <script src="/js/pages/administration/product/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#check-all').click(function() {
                var isChecked = $(this).prop('checked');
                $('input[name^="check-list-product"]').prop('checked', isChecked);
                $('input[name^="check-product"]').prop('checked', isChecked);
                updateTotalChecked();
            });

            $('input[name^="check-product"]').click(function() {
                var sellerId = $(this).attr('data');
                var isChecked = $(this).prop('checked');
                $('input[name="check-list-product' + sellerId + '[]"]').prop('checked', isChecked);
                updateTotalChecked();
            });

            $('input[name^="check-list-product"]').click(function() {
                updateTotalChecked();
            });

            function updateTotalChecked() {
                var checkboxes = $('input[type="checkbox"][name^="check-list-product"]:checked');
                var total = 0;
                var total_qty = 0;
                var orderDetails = [];

                checkboxes.each(function() {
                    var parentDiv = $(this).closest('.flex.flex-col.gap-5.border-t-2.py-4.px-6');
                    var orderDetailIdInput = parentDiv.find('input[name="order_detail_id"]');
                    var qtyInput = parentDiv.find('.add-remove-container input[name="qty"]');

                    if (orderDetailIdInput.length > 0 && qtyInput.length > 0) {
                        var orderDetailId = orderDetailIdInput.val();
                        var qty = parseInt(qtyInput.val());

                        var priceElement = parentDiv.find('.flex.items-center.justify-between span.font-bold');
                        var priceText = priceElement.text().replace('Rp. ', '').replace(/\./g, '').replace(',', '.');
                        var price = parseFloat(priceText);

                        var subtotal = price * qty;
                        total += subtotal;
                        total_qty += qty;

                        var orderDetail = {
                            orderDetailId: orderDetailId,
                            qty: qty,
                            price: price
                        };
                        orderDetails.push(orderDetail);
                    } else {
                        console.error('Elemen input[name="qty"] atau elemen harga tidak ditemukan dalam parentDiv');
                    }
                });

                $('#total-barang').text('Total Harga (' + total_qty + ' Barang)');
                $('#total-subtotal').text('Rp. ' + total.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
                $('#grandtotal_data').text('Rp. ' + total.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
                $('#grandtotal').val(total);

                updateHiddenFields(orderDetails);
            }

            function updateHiddenFields(orderDetails) {
                var orderDetailIds = [];
                var qtys = [];
                var prices = [];

                orderDetails.forEach(function(orderDetail) {
                    orderDetailIds.push(orderDetail.orderDetailId);
                    qtys.push(orderDetail.qty);
                    prices.push(orderDetail.price);
                });

                $('#order_detail_id_inputter').val(orderDetailIds.join(','));
                $('#qty_inputter').val(qtys.join(','));
                $('#price_inputter').val(prices.join(','));
            }
        });
    </script>
</body>

</html>