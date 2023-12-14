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
                <input type="text" placeholder="Cari {{ $category->description }}" class="w-full border border-gray-400 rounded-[0.2rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-black placeholder:font-roboto focus:outline-none focus:border-gray-500" />
            </div>
        </header>
        <main class="w-full pb-[10rem]">
            <section class="w-full py-[1rem]">
                <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex flex-col gap-[1.5rem] items-start">
                    <button class="border border-[white] bg-[#FFCC33] flex items-center gap-[0.7rem] px-[1rem] py-[0.7rem] rounded-[0.5rem]">
                        <img src="{{ asset('assets/icons/setting-lines.png') }}" alt="setting-lines" class="w-[2rem]">
                        <span class="text-[1.2rem]">Filter</span>
                    </button>
                    <div class="grid grid-cols-2 gap-[1.5rem]">
                        <div class="border border-black rounded-[1rem]">
                            <img src="{{ asset('assets/image/rattan-material.webp') }}" alt="rattan-material" class="rounded-t-[1rem]">
                            <div class="flex flex-col gap-[1rem] px-[1rem] pt-[1.5rem] pb-[1rem]">
                                <div class="flex flex-col gap-[0.7rem]">
                                    <div class="flex flex-col items-start gap-[0.2rem]">
                                        <h5 class="text-[2rem] font-bold leading-[2.5rem]">Core Tohiti</h5>
                                        <span class="text-[1rem] text-[#767676]">Kalimantan Timur</span>
                                    </div>
                                    <div class="flex items-center gap-[0.5rem]">
                                        <span class="text-[#767676]">8mm - 12mm</span>
                                        <span class="bg-[#FFCC33] px-[0.5rem] py-[0.1rem] rounded-[1rem]">AB</span>
                                    </div>
                                    <h6 class="text-[1.5rem]">Rp. 20.000/kg</h6>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-[1rem]">
                                        <div class="flex items-center gap-[0.5rem]">
                                            <img src="{{ asset('assets/icons/star.png') }}" alt="star" class="w-[1.5rem] sunglow-img">
                                            <span class="text-[1.2rem]">4.7</span>
                                        </div>
                                        <div class="pl-[1rem] border-l-2">
                                            <span class="text-[1.2rem]">Terjual: 5.000kg</span>
                                        </div>
                                    </div>
                                    <button class="w-[3rem]">
                                        <img src="{{ asset('assets/icons/dots.png') }}" alt="dots" class="w-full">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="fixed w-full bottom-0 left-0">
            <div class="max-w-rattan-mobile mx-auto bg-white border-t-2 border-[#FFBA00] py-[1.5rem]">
                <div class="px-[1.5rem] grid grid-cols-5 justify-items-center gap-[1rem]">
                    <a href="javascript:;" class="flex flex-col items-center justify-center gap-[0.5rem]">
                        <img src="{{ asset('assets/icons/home.png') }}" alt="home" class="w-[3rem] h-[3rem] selected-menu" />
                        <span>Home</span>
                    </a>
                    <a href="/chat" class="flex flex-col items-center justify-center gap-[0.5rem]">
                        <img src="{{ asset('assets/icons/email.png') }}" alt="email" class="w-[3rem] h-[3rem] unselected-menu" />
                        <span>Pesan</span>
                    </a>
                    <a href="javascript:;" class="flex flex-col items-center justify-center gap-[0.5rem]">
                        <img src="{{ asset('assets/icons/love.png') }}" alt="love" class="w-[3rem] h-[3rem] unselected-menu" />
                        <span>Whislist</span>
                    </a>
                    <a href="{{ route('cart', ['index='.$parameter,'route='.$route]) }}" class="flex flex-col items-center justify-center gap-[0.5rem]">
                        <img src="{{ asset('assets/icons/shopping-cart.png') }}" alt="shopping-cart" class="w-[3rem] h-[3rem] unselected-menu" />
                        <span>Keranjang</span>
                    </a>
                    <a href="javascript:;" class="flex flex-col items-center justify-center gap-[0.5rem]">
                        <img src="{{ asset('assets/icons/document.png') }}" alt="document" class="w-[3rem] h-[3rem] unselected-menu" />
                        <span>Transaksi</span>
                    </a>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>