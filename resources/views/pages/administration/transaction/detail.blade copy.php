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
                            <img src="{{ asset('assets/icons/left-arrow.png') }}" alt="Left Arrow" class="w-full">
                        </div>
                        <span class="text-[1.4rem] font-bold">Detail Pesanan</span>
                    </div>
                    <a href="{{ url('seller/detail-user-seller/chat') }}" class="w-[2.5rem] h-[2.5rem]">
                        <img src="{{ asset('assets/icons/comment.png') }}" alt="Comment" class="w-full h-full">
                    </a>
                </div>
            </div>
        </header>
        <main class="w-full pb-[5.5rem]">
            <section class="w-full border-t-2 py-[1.5rem]">
                <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex flex-col gap-[2rem]">
                    <div class="flex flex-col gap-5">
                        <span class="text-[1.4rem] font-bold">Selesai</span>
                        <div class="flex flex-col gap-3">
                            <div class="flex justify-between">
                                <span class="flex items-center gap-2 text-[#767676] cursor-pointer">
                                    INV/20220711/INV/239827719282
                                    <img src="{{ asset('assets/icons/copy.png') }}" alt="Copy" class="w-[1rem] h-[1rem] moonglow-img">
                                </span>
                                <a href="{{ url('transaction/invoice') }}" class="text-[1.2rem] text-[#FFBA00] font-bold cursor-pointer">Lihat Invoice</a>
                            </div>
                            <div class="flex justify-between">
                                <span class="flex items-center gap-2 text-[#767676] cursor-pointer">
                                    Tanggal Pembelian
                                </span>
                                <span class="text-[#767676]">11 Juli 2023, 07:30 WIB</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 border-t-2 pt-[1.5rem]">
                        <div class="flex items-center justify-between">
                            <span class="text-[1.4rem] font-bold leading-none">Detail Produk</span>
                            <a href="javascript:;" class="flex items-center gap-3">
                                <span class="text-[1.4rem] font-bold">Budi Dorame</span>
                                <img src="{{ asset('assets/icons/more-than.png') }}" alt="More Than" class="w-[1.4rem] h-[2rem] arrow-dark">
                            </a>
                        </div>
                        <div class="flex flex-col border border-gray-300 p-5 shadow-sm rounded-lg gap-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('assets/image/rattan-material.webp') }}" alt="Rattan Material" class="w-[5rem] h-[5rem]">
                                <div class="flex flex-col gap-1">
                                    <span class="text-[1.4rem] font-bold leading-none">Core Tohiti</span>
                                    <p class="text-[1.2rem] text-[#767676]">1 x Rp. 104.500</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="text-[#767676]">Total Harga</span>
                                    <p class="text-[1.2rem] font-bold">Rp. 104.500</p>
                                </div>
                                <a href="javascript:;" class="px-4 py-2 font-bold rounded-lg transition-all border border-[#FFBA00] bg-white text-[#FFBA00] hover:bg-[#FFBA00] hover:text-black">Beli Lagi</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 border-t-2 pt-[1.5rem]">
                        <span class="text-[1.4rem] font-bold leading-none">Info Pengiriman</span>
                        <div class="grid grid-cols-[1.2fr_2fr] items-start">
                            <span class="text-[1.2rem] text-[#767676]">Kurir</span>
                            <span class="text-[1.2rem] text-[#767676]">SiCepat - Reguler Package</span>
                        </div>
                        <div class="grid grid-cols-[1.2fr_2fr] items-start">
                            <span class="flex items-center gap-2 text-[#767676] cursor-pointer">
                                No Resi
                                <img src="{{ asset('assets/icons/copy.png') }}" alt="Copy" class="w-[1rem] h-[1rem] moonglow-img">
                            </span>
                            <span class="text-[1.2rem] text-[#767676]">0087878766657</span>
                        </div>
                        <div class="grid grid-cols-[1.2fr_2fr] items-start">
                            <span class="flex items-center gap-2 text-[#767676] cursor-pointer">
                                Alamat
                                <img src="{{ asset('assets/icons/copy.png') }}" alt="Copy" class="w-[1rem] h-[1rem] moonglow-img">
                            </span>
                            <div>
                                <p class="text-[1.2rem] font-bold">Rudi Tabuti</p>
                                <p class="text-[1.2rem] text-[#767676]">08766556542</p>
                                <p class="text-[1.2rem] text-[#767676]">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam blanditiis amet animi impedit optio vero reiciendis nihil repellendus numquam placeat!</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 border-t-2 pt-[1.5rem]">
                        <span class="text-[1.4rem] font-bold leading-none">Rincian Pembayaran</span>
                        <div class="flex items-center justify-between">
                            <span class="text-[1.2rem] text[#767676]">Metode Pembayaran</span>
                            <span class="text-[1.2rem] text[#767676]">GoPay</span>
                        </div>
                        <div class="flex flex-col gap-4 border-y-2 py-4">
                            <div class="flex items-center justify-between">
                                <span class="text-[1.2rem] text[#767676]">Total Harga (1 barang)</span>
                                <span class="text-[1.2rem] text[#767676]">Rp. 104.500</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-[1.2rem] text[#767676]">Total Ongkos Kirim (240 gr)</span>
                                <span class="text-[1.2rem] text[#767676]">Rp. 11.500</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-[1.2rem] text[#767676]">Diskon Ongkos Kirim</span>
                                <span class="text-[1.2rem] text[#767676]">-Rp. 11.500</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-[1.2rem] text[#767676]">Total Diskon Barang</span>
                                <span class="text-[1.2rem] text[#767676]">-Rp. 20.000</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-[1.4rem] font-bold">Total Belanja</span>
                            <span class="text-[1.4rem] font-bold">Rp. 84.500</span>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="fixed w-full bottom-0 left-0">
            <div class="max-w-rattan-mobile mx-auto bg-white border-t-2 py-4 px-6 flex">
                <a href="javascript:;" class="w-full text-[1.2rem] border text-center py-2 text-[#767676] font-bold rounded-lg transition-all hover:bg-[#767676] hover:text-white">Bantuan</a>
            </div>
        </footer>
    </main>
</body>

</html>