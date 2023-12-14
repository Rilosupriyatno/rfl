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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <title>Rattan For Life</title>
</head>

<body>
    <main>
        <header class="w-full pt-[2rem] pb-[1.5rem] shadow-md">
            <div class="max-w-invoice-screen h-full mx-auto px-[2rem] flex items-center">
                <div class="w-full flex items-center justify-between">
                    <div class="flex items-center gap-8">
                        <div class="w-[2rem] hover:cursor-pointer">
                            <img src="{{ asset('assets/icons/left-arrow.png') }}" alt="Left Arrow" class="w-full">
                        </div>
                        <span class="text-[1.4rem] font-bold">Invoice</span>
                    </div>
                    <button class="bg-[#FFCC33] px-6 py-2 rounded-lg border border-transparent transition-all hover:border-[#FFCC33] hover:bg-white hover:text-[#FFCC33]" id="print-invoice">Cetak Invoice</button>
                </div>
            </div>
        </header>
        <main id="invoice-content">
            <section class="w-full py-[1rem]">
                <div class="max-w-invoice-screen h-full mx-auto px-[2rem]">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center flex-wrap gap-8 place-self-center">
                            <img class="h-[4rem]" src="{{ asset('assets/icons/rattan-logo.svg') }}" alt="Rattan Logo" loading="lazy" />
                            <div class="font-poppins w-[7rem] break-all font-bold text-[2rem] leading-[2.5rem] text-gray-600">
                                rattan<span class="text-[#FFCC33]">for</span>life.
                            </div>
                        </div>
                        <div class="flex flex-col items-end gap-1">
                            <span class="text-[1.6rem] font-bold uppercase">Invoice</span>
                            <p class="text-[1.2rem] text-[#FFCC33]">INV/20220711/INV/239827719282</p>
                        </div>
                    </div>
                    <div class="flex flex-col mt-[2.4rem]">
                        <div class="flex items-start justify-between mb-[2.4rem]">
                            <div class="min-w-[35%] max-w-[45%] flex flex-col gap-2">
                                <span class="text-[1.2rem] font-bold uppercase">Asal</span>
                                <div class="flex items-start">
                                    <span class="w-[7.5rem] min-w-[7.5rem] text-[1.2rem] text-[#767676]">Penjual</span>
                                    <p class="text-[1.2rem] font-bold before:content-[':'] before:pr-2">Budi Dorame</p>
                                </div>
                            </div>
                            <div class="min-w-[35%] max-w-[45%] flex flex-col gap-2">
                                <span class="text-[1.2rem] font-bold uppercase">Untuk</span>
                                <div class="flex items-start">
                                    <span class="w-[12rem] min-w-[12rem] text-[1.2rem] text-[#767676]">Pembeli</span>
                                    <p class="text-[1.2rem] font-bold before:content-[':'] before:pr-2">Budi Dorame</p>
                                </div>
                                <div class="flex items-start">
                                    <span class="w-[12rem] min-w-[12rem] text-[1.2rem] text-[#767676]">Tanggal Pembelian</span>
                                    <p class="text-[1.2rem] font-bold before:content-[':'] before:pr-2">11 Juli 2023</p>
                                </div>
                                <div class="flex items-start">
                                    <span class="w-[12rem] min-w-[12rem] text-[1.2rem] text-[#767676]">Alamat Pengiriman</span>
                                    <div class="flex flex-col">
                                        <p class="text-[1.2rem] before:content-[':'] before:pr-2"><strong class="font-bold">Budi Dorame</strong> (628898766090)</p>
                                        <p class="ml-2">Jl. Nyi Gede Cangkring Perumahan Villa Indah Panembahan No 5 Sebelum Gang Putih</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex items-start border-y-2 border-black p-4">
                                <span class="w-[50%] text-[1.2rem] font-bold uppercase">Detail Produk</span>
                                <span class="w-[10%] text-[1.2rem] font-bold uppercase text-right">Jumlah</span>
                                <span class="w-[20%] text-[1.2rem] font-bold uppercase text-right">Harga Per Satuan</span>
                                <span class="w-[20%] text-[1.2rem] font-bold uppercase text-right">Total Harga</span>
                            </div>
                            <div class="flex flex-col gap-4 border-b p-4">
                                <div class="flex items-start">
                                    <div class="w-[50%]">
                                        <a href="javascript:;" class="text-[1.2rem] text-[#FE5A1D] font-bold">Playstaion 5 - 2TB Storage - Special Edition (Inc. GOW 4, GTA V, Crash Bandicot, Stick PS 5 2 Pcs)</a>
                                        <div class="flex flex-col">
                                            <div class="flex gap-1">
                                                <span class="text-[1.2rem]">
                                                    <strong class="text-[#767676] font-bold">Berat</strong>:
                                                </span>
                                                <span class="text-[1.2rem]">1kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="w-[10%] text-[1.2rem] text-right">1</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 8.999.999</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 8.999.999</span>
                                </div>
                                <div class="flex items-start">
                                    <a href="javascript:;" class="w-[50%] text-[1.2rem] text-[#FE5A1D] font-bold">Playstaion 5 - 2TB Storage - Special Edition (Inc. GOW 4, GTA V, Crash Bandicot, Stick PS 5 2 Pcs)</a>
                                    <span class="w-[10%] text-[1.2rem] text-right">1</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 18.999.999</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 18.999.999</span>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-[50%]">
                                        <a href="javascript:;" class="text-[1.2rem] text-[#FE5A1D] font-bold">Playstaion 5 - 2TB Storage - Special Edition (Inc. GOW 4, GTA V, Crash Bandicot, Stick PS 5 2 Pcs)</a>
                                        <div class="flex flex-col">
                                            <div class="flex gap-1">
                                                <span class="text-[1.2rem]">
                                                    <strong class="text-[#767676] font-bold">Berat</strong>:
                                                </span>
                                                <span class="text-[1.2rem]">1kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="w-[10%] text-[1.2rem] text-right">1</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 8.999.999</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 8.999.999</span>
                                </div>
                                <div class="flex items-start">
                                    <a href="javascript:;" class="w-[50%] text-[1.2rem] text-[#FE5A1D] font-bold">Playstaion 5 - 2TB Storage - Special Edition (Inc. GOW 4, GTA V, Crash Bandicot, Stick PS 5 2 Pcs)</a>
                                    <span class="w-[10%] text-[1.2rem] text-right">1</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 18.999.999</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 18.999.999</span>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-[50%]">
                                        <a href="javascript:;" class="text-[1.2rem] text-[#FE5A1D] font-bold">Playstaion 5 - 2TB Storage - Special Edition (Inc. GOW 4, GTA V, Crash Bandicot, Stick PS 5 2 Pcs)</a>
                                        <div class="flex flex-col">
                                            <div class="flex gap-1">
                                                <span class="text-[1.2rem]">
                                                    <strong class="text-[#767676] font-bold">Berat</strong>:
                                                </span>
                                                <span class="text-[1.2rem]">1kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="w-[10%] text-[1.2rem] text-right">1</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 8.999.999</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 8.999.999</span>
                                </div>
                                <div class="flex items-start">
                                    <a href="javascript:;" class="w-[50%] text-[1.2rem] text-[#FE5A1D] font-bold">Playstaion 5 - 2TB Storage - Special Edition (Inc. GOW 4, GTA V, Crash Bandicot, Stick PS 5 2 Pcs)</a>
                                    <span class="w-[10%] text-[1.2rem] text-right">1</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 18.999.999</span>
                                    <span class="w-[20%] text-[1.2rem] text-right">Rp. 18.999.999</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-[48%] ml-auto">
                            <div class="flex justify-between p-4">
                                <span class="text-[1.2rem] font-bold uppercase">Total Harga (2 Barang)</span>
                                <span class="text-[1.2rem] font-bold">Rp. 27.999.998</span>
                            </div>
                            <div class="flex justify-between px-4 py-1">
                                <span class="text-[1.2rem]">Total Ongkos Kirim (240 gr)</span>
                                <span class="text-[1.2rem]">Rp. 25.000</span>
                            </div>
                            <div class="flex justify-between px-4 py-1">
                                <span class="text-[1.2rem]">Diskon Ongkos Kirim</span>
                                <span class="text-[1.2rem]">Rp. -11.500</span>
                            </div>
                            <div class="flex justify-between px-4 py-1">
                                <span class="text-[1.2rem]">Total Diskon Barang</span>
                                <span class="text-[1.2rem]">Rp. -50.000</span>
                            </div>
                            <div class="flex justify-between border-t mt-2 px-4 pt-3">
                                <span class="text-[1.2rem] font-bold uppercase">Total Belanja</span>
                                <span class="text-[1.2rem] font-bold">Rp. 27.963.498</span>
                            </div>
                            <div class="flex justify-between border-t mt-4 px-4 pt-3">
                                <span class="text-[1.2rem]">Biaya Jasa Aplikasi</span>
                                <span class="text-[1.2rem]">Rp. 1.000</span>
                            </div>
                            <div class="flex justify-between border-t mt-4 px-4 pt-3">
                                <span class="text-[1.2rem] font-bold uppercase">Total Tagihan</span>
                                <span class="text-[1.2rem] font-bold">Rp. 27.964.498</span>
                            </div>
                        </div>
                        <div class="w-full flex items-start justify-between mt-4 py-6 border-t">
                            <div class="min-w-[47%] flex flex-col gap-2">
                                <span class="text-[1.2rem] text-[#767676]">Kurir:</span>
                                <strong class="text-[1.2rem] font-bold">SiCepat - Reguler Package</strong>
                            </div>
                            <div class="min-w-[47%] flex flex-col gap-2">
                                <span class="text-[1.2rem] text-[#767676]">Metode Pembayaran:</span>
                                <strong class="text-[1.2rem] font-bold">SiCepat - Transfer Virtual Account - BCA</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </main>
    <script src="/js/pages/administration/product/shipment-payment.js"></script>
    <script src="/js/pages/administration/product/payment.js"></script>
    {{-- <script src="{{ mix('js/user/') }}"></script> --}}
</body>

</html>