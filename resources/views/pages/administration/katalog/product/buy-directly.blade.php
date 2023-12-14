<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/icons/rattan-logo.svg') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <title>Rattan For Life</title>
</head>

<body>
    <main>
        <header class="w-full pt-[2rem] pb-[1.5rem]">
            <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex items-center">
                <div class="w-full flex items-center justify-between">
                    <div class="flex items-center gap-8">
                        <div class="w-[2rem] hover:cursor-pointer">
                            <a href="{{ route(session('url_back_view'), ['product' => session('p_view')]) }}">
                                <img src="{{ asset('assets/icons/left-arrow.png') }}" alt="Left Arrow" class="w-full">
                            </a>
                        </div>
                        <span class="text-[1.4rem] font-bold">Beli Langsung</span>
                    </div>
                </div>
            </div>
        </header>
        <main class="w-full pb-[3rem]">
            <section class="w-full py-[1rem]">
                <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex flex-col gap-[1.5rem] items-start">
                    <h6 class="text-[1.4rem] text-[#767676] font-bold">Barang yang dibeli</h6>
                    <div class="w-full flex flex-col border border-gray-300 rounded-2xl py-2">
                        <div class="flex flex-col">
                            <div class="flex gap-4 items-center px-6 pb-4">
                                <input type="checkbox" id="check-product" name="check-product">
                                <div>
                                    <span class="text-[1.4rem] font-bold">{{ $seller->name }}</span>
                                    <p class="text-[#767676]">Petani , {{ $seller->cities->description }}</p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-5 border-t-2 py-4 px-6">
                                <div class="flex gap-4 items-center">
                                    <input type="checkbox" name="check-list-product">
                                    <div class="flex gap-5 items-center">
                                        <div class="w-[7.5rem] h-[7.5rem]">
                                            <img src="/{{ $image->name }}" alt="rattan-material" class="w-full h-full">
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <div class="flex flex-col">
                                                <span class="text-[1.4rem] font-bold">{{ $dataDirect->products->name }}</span>
                                                <span class="text-[#767676]">{{ $dataDirect->products->rattan_from }}</span>
                                            </div>
                                            <div class="flex items-center gap-[0.5rem]">
                                                <span class="text-[#767676]">{{ $dataDirect->products->size_min }}mm - {{ $dataDirect->products->size_max }}mm</span>
                                                <span class="bg-[#FFCC33] px-[0.5rem] py-[0.1rem] rounded-[1rem]">{{ $dataDirect->products->grades->description }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-6 pb-2">
                                    <div class="flex items-center justify-between">
                                        <span class="text-[1.2rem] text-orange-400 cursor-pointer">Tulis Catatan</span>
                                        <span class="text-[1.2rem] font-bold">{{ rupiah($dataDirect->subtotal) }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <a href="javascript:;" class="text-[1.2rem] text-[#767676]">Tambahkan ke Wishlist</a>
                                        <div class="flex items-center gap-6">
                                            <form method="POST" action="/administration/cart/{{ $dataDirect->id }}/delete" method="POST" class="d-inline">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-sm ">
                                                    <div class="w-[2rem] h-[2rem] cursor-pointer">
                                                        <img src="{{ asset('assets/icons/trash.png') }}" id="delete_data" data="{{ $dataDirect->id }}" alt="Trash" class="w-full h-full">
                                                    </div>
                                                </button>
                                            </form>
                                            <div class="flex items-center border border-gray-300 px-4 py-2 rounded-xl gap-6 add-remove-container">
                                                <button class="w-[1.2rem] h-[1.2rem] bg-transparent active-qty">
                                                    <img src="{{ asset('assets/icons/minus.png') }}" alt="minus">
                                                </button>
                                                <input type="text" pattern="\d*" class="w-full max-w-[3rem] text-center outline-none" value="{{ $dataDirect->qty }}">
                                                <button class="w-[1.2rem] h-[1.2rem] active-qty">
                                                    <img src="{{ asset('assets/icons/plus.png') }}" alt="plus">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col border border-gray-300 rounded-2xl py-2">
                        <div class="flex flex-col gap-6 px-4">
                            <h6 class="text-[1.4rem] text-[#767676] font-bold">Pengiriman dan pembayaran</h6>
                            <div class="flex flex-col gap-6 px-5 pb-4 border-b-2">
                                <div class="flex items-center justify-between cursor-pointer">
                                    <div class="flex flex-col gap-1">
                                        <div>
                                            <span class="bg-gray-400 p-1 rounded-md text-[1.2rem] text-white font-bold">Utama</span>
                                            <span class="font-bold text-[1.2rem]">Rumah</span>
                                            <span class="before:content-['-'] before:inline-block text-[1.2rem]"> Ilham Malik</span>
                                        </div>
                                        <div>
                                            <span>(Boleh dititip ke Satpam)</span>
                                            <span>(6289674200074)</span>
                                        </div>
                                        <p class="text-[#767676] wrap-one-line">Jl. Nyi Gede Cangkring Perumahan Villa Indah Panembahan No 5 Sebelum Gang Putih</p>
                                    </div>
                                    <div class="w-[1.2rem] h-[1.2rem] gray-arrow">
                                        <img src="{{ asset('assets/icons/more-than.png') }}" alt="Right Arrow" class="w-full h-full">
                                    </div>
                                </div>
                                <div class="list-menu flex items-center justify-between cursor-pointer">
                                    <span class="font-bold text-[1.2rem]">Reguler</span>
                                    <div class="w-[1.2rem] h-[1.2rem] gray-arrow">
                                        <img src="{{ asset('assets/icons/more-than.png') }}" alt="Right Arrow" class="w-full h-full">
                                    </div>
                                </div>
                                <div class="list-menu flex items-center justify-between cursor-pointer">
                                    <div class="flex flex-col gap-1">
                                        <span class="font-bold text-[1.2rem]">JNE Reg (Rp. 11.000)</span>
                                        <p class="text-[#767676]">Estimasi tiba 14 - 18 May</p>
                                    </div>
                                    <div class="w-[1.2rem] h-[1.2rem] gray-arrow">
                                        <img src="{{ asset('assets/icons/more-than.png') }}" alt="Right Arrow" class="w-full h-full">
                                    </div>
                                </div>
                                <div class="list-menu flex items-center justify-between cursor-pointer">
                                    <div class="flex flex-col gap-2">
                                        <img src="{{ asset('assets/icons/bca-va.webp') }}" alt="BCA VA" width="40" height="40">
                                        <span class="font-bold text-[1.2rem]">BCA Virtual Account</span>
                                    </div>
                                    <div class="w-[1.2rem] h-[1.2rem] gray-arrow">
                                        <img src="{{ asset('assets/icons/more-than.png') }}" alt="Right Arrow" class="w-full h-full">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex p-4 justify-between">
                            <div class="flex items-center gap-4">
                                <div class="flex flex-col">
                                    <span class="text-[#767676]">Total Bayar</span>
                                    <span class="text-[1.4rem] font-bold">Rp. 40.000</span>
                                </div>
                                <div class="w-[1.2rem] h-[1.2rem] gray-arrow">
                                    <img src="{{ asset('assets/icons/arrow-down.png') }}" alt="Arrow Down" class="w-full h-full">
                                </div>
                            </div>
                            <a href="{{ url('checkout/payment/finish-payment') }}" class="bg-[#FFBA00] flex items-center gap-2 px-7 rounded-xl">
                                <img src="{{ asset('assets/icons/verified.png') }}" alt="Secure Icon" width="15" height="15">
                                <span class="text-[1.2rem] font-bold">Bayar</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <div class="bg-transparent invisible w-full h-screen fixed bottom-0 left-0 transition-all" id="modal">
            <div class="hidden w-full h-full z-10" id="modal-overlay"></div>
            <div class="absolute w-full max-w-rattan-mobile bottom-0 left-1/2 -translate-x-1/2 translate-y-[40rem] bg-white rounded-tl-2xl rounded-tr-2xl flex flex-col gap-5 pt-4 z-50 transition-transform duration-300" id="modal-content">
                <div class="flex items-center px-6 gap-4">
                    <a href="javascript:;" class="text-[3rem] leading-none" modal-dismiss="modal-close">&times;</a>
                    <h2 class="text-[1.2rem] font-bold mt-[0.5rem]">Pilih Pengiriman</h2>
                </div>
                <div class="modal-body h-100">
                    <ul class="flex flex-col">
                        <li class="border-b-2 px-6 py-4 cursor-pointer transition-all hover:bg-gray-200">
                            <a href="javascript:;">
                                <span class="text-[1.2rem] text-gray-400 font-bold">Instan (3 Jam)</span>
                                <p class="text-red-600">Jarak pengiriman melebihi batas maks. 40km.</p>
                            </a>
                        </li>
                        <li class="border-b-2 px-6 py-4 cursor-pointer transition-all hover:bg-gray-200">
                            <a href="javascript:;">
                                <span class="text-[1.2rem] text-gray-400 font-bold">Same Day (6-8 jam)</span>
                                <p class="text-red-600">Jarak pengiriman melebihi batas maks. 40km.</p>
                            </a>
                        </li>
                        <li class="border-b-2 px-6 py-4 cursor-pointer transition-all hover:bg-gray-200">
                            <a href="javascript:;">
                                <span class="text-[1.2rem] font-bold">Next Day (Rp. 15.000)</span>
                                <p class="text-[#767676]">Estimasi tiba 1 - 2 Jul</p>
                            </a>
                        </li>
                        <li class="flex items-center justify-between border-b-2 px-6 py-4 cursor-pointer transition-all hover:bg-gray-200">
                            <a href="javascript:;">
                                <span class="text-[1.2rem] font-bold">Reguler (Rp. 9.000 - Rp. 14.000)</span>
                                <p class="text-[#767676]">Estimasi tiba 2 - 5 Jul</p>
                            </a>
                            <img src="{{ asset('assets/icons/check.png') }}" alt="checklist" class="checklist-green w-[2.5rem] h-[2.5rem]">
                        </li>
                        <li class="border-b-2 px-6 py-4 cursor-pointer transition-all hover:bg-gray-200">
                            <a href="javascript:;">
                                <span class="text-[1.2rem] font-bold">Kargo (Rp. 30.000 - Rp. 35.000)</span>
                                <p class="text-[#767676]">Estimasi tiba 3 - 7 Jul</p>
                                <p class="text-[#767676]">Rekomendasi berat di atas 5kg</p>
                            </a>
                        </li>
                        <li class="border-b-2 px-6 py-4 cursor-pointer transition-all hover:bg-gray-200">
                            <a href="javascript:;">
                                <span class="text-[1.2rem] font-bold">Ekonomi (Rp. 9.000 - Rp. 10.000)</span>
                                <p class="text-[#767676]">Estimasi tiba 3 - 6 Jul</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <script src="/js/pages/administration/product/checkout.js"></script>
    <script src="/js/pages/administration/product/payment.js"></script>
</body>

</html>