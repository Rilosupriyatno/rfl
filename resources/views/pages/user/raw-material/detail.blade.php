<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('assets/icons/rattan-logo.svg') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <title>Rattan For Life</title>
</head>

<body>
    <main>
        <header class="w-full pt-[3rem] pb-[1.5rem]">
            <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex items-center justify-center gap-[1rem]">
                <input type="text" placeholder="Cari bahan baku" class="w-full border border-gray-400 rounded-[0.2rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-black placeholder:font-roboto focus:outline-none focus:border-gray-500" />
            </div>
        </header>
        <main class="w-full pb-[10rem]">
            <section class="w-full py-[1rem]">
                <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex flex-col gap-[1.5rem] items-start">
                    <div class="flex flex-col gap-[1rem]">
                        <div class="relative">
                            <img src="{{ asset('assets/image/rattan-material.webp') }}" alt="rattan-material" class="rounded-t-[1rem]">
                            <button class="bg-white rounded-full absolute top-1/2 left-[2.5rem] translate-y-[-50%] w-[4rem]">
                                <img src="{{ asset('assets/icons/more-than.png') }}" alt="more-than" class="w-full h-full arrow-dark">
                            </button>
                            <button class="bg-white rounded-full absolute top-1/2 right-[2.5rem] translate-y-[-50%] w-[4rem]">
                                <img src="{{ asset('assets/icons/less-than.png') }}" alt="less-than" class="w-full h-full arrow-dark">
                            </button>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-[1.5rem]">
                        <div class="flex items-center justify-between">
                            <h5 class="text-[2rem] font-bold">Rp. 20.000/kg</h5>
                            <button class="w-[2rem] h-[2rem]">
                                <img src="{{ asset('assets/icons/love.png') }}" alt="love-border" class="full-heart">
                            </button>
                        </div>
                        <div class="flex flex-col gap-[1rem]">
                            <h6 class="text-[1.5rem] font-bold">Detail Produk</h6>
                            <div class="flex flex-col gap-[0.5rem]">
                                <h6 class="text-[1.5rem]">Core Tohiti</h6>
                                <div class="flex flex-col gap-[1rem]">
                                    <div class="flex items-center gap-[0.5rem]">
                                        <span class="text-[#767676]">8mm - 12mm</span>
                                        <span class="bg-[#FFCC33] px-[0.5rem] py-[0.1rem] rounded-[1rem]">AB</span>
                                    </div>
                                    <div class="flex flex-col gap-[0.5rem]">
                                        <div class="grid grid-cols-2 border-b-2 pb-[0.7rem]">
                                            <span class="text-[1.3rem]">Asal dari</span>
                                            <span class="text-[1.3rem] text-[#767676]">Kalimantan Timur</span>
                                        </div>
                                        <div class="grid grid-cols-2 border-b-2 pb-[0.7rem]">
                                            <span class="text-[1.3rem]">Dikirim dari</span>
                                            <span class="text-[1.3rem] text-[#767676]">Kalimantan Tengah</span>
                                        </div>
                                        <div class="grid grid-cols-2 border-b-2 pb-[0.7rem]">
                                            <span class="text-[1.3rem]">Stok ready</span>
                                            <span class="text-[1.3rem] text-[#767676]">1.000 kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-[1rem]">
                            <h6 class="text-[1.5rem] font-bold">Deskripsi Produk</h6>
                            <div class="flex flex-col gap-[0.5rem]">
                                <span class="text-[1.2rem] wrap-three-lines">Hasil olahan mesin terjamin, ukuran toleransi 0.5mm - 1mm, kualitas sangat terjaga dan terjamin</span>
                                <a href="javascript:;" class="text-[1.2rem] text-[#FFBA00] font-bold">Baca Selengkapnya</a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-[1rem]">
                            <h6 class="text-[1.5rem] font-bold">Penjual</h6>
                            <div class="flex flex-col gap-[0.7rem]">
                                <div class="flex items-center gap-[1rem]">
                                    <img src="{{ asset('assets/icons/user.png') }}" alt="user" class="w-[4rem] h-[4rem]">
                                    <div class="flex flex-col">
                                        <span class="text-[1.2rem] font-bold">Budi Dorame</span>
                                        <p class="text-[#767676]">Petani, Kalimantan Tengah</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-[1rem]">
                                    <div class="flex items-center gap-[0.5rem]">
                                        <img src="{{ asset('assets/icons/star.png') }}" alt="star" class="w-[1.5rem] sunglow-img">
                                        <span class="text-[1.2rem]">4.7</span>
                                    </div>
                                    <a href="javascript:;" class="text-[1.2rem] border-b border-black">Ulasan Penjual</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="fixed w-full bottom-0 left-0">
            <div class="max-w-rattan-mobile mx-auto bg-white border-t-2 border-[#FFBA00] py-[1.5rem]">
                <div class="flex items-center justify-center gap-[1rem]">
                    <a href="/chat" class="border border-[#FFBA00] p-[0.5rem] rounded-[0.5rem]">
                        <img src="{{ asset('assets/icons/comment.png') }}" alt="comment" class="w-[2.5rem] h-[2.5rem]">
                    </a>
                    <a href="javascript:;" class="border border-[#FFBA00] text-[1.5rem] text-[#FFBA00] px-[1rem] py-[0.6rem] rounded-[0.5rem]">
                        Beli Langsung
                    </a>
                    <a href="javascript:;" class="bg-[#FFBA00] text-[1.5rem] text-white px-[1rem] py-[0.6rem] rounded-[0.5rem]">
                        + Keranjang
                    </a>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>