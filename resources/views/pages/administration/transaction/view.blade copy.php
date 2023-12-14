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
<!-- start php section -->
@php
$parameter = request()->segment(4);
$route = request()->segment(3);
@endphp
<!-- end php section -->

<body>
    <main>
        <header class="w-full pt-[3rem] pb-[1.5rem]">
            <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex items-center justify-center gap-[1rem]">
                <input type="text" placeholder="Cari transaksi" class="w-full border border-gray-400 rounded-[0.2rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-black placeholder:font-roboto focus:outline-none focus:border-gray-500">
                <div class="w-[3rem] h-[3rem] hover:cursor-pointer">
                    <img src="{{ asset('assets/icons/menu.png') }}" alt="Menu" class="w-full h-full object-cover">
                </div>
            </div>
        </header>
        <main class="w-full pb-[10rem]">
            <section class="w-full py-[1rem]">
                <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex flex-col gap-[1rem] items-start">
                    
                </div>
            </section>
        </main>
        <footer class="fixed w-full bottom-0 left-0">
            <div class="max-w-rattan-mobile mx-auto bg-white  border-t-2 border-[#FFBA00] py-[1.5rem]">
                <div class="px-[1.5rem] grid grid-cols-5 justify-items-center gap-[1rem]">
                    <a href="/" class="flex flex-col items-center justify-center gap-[0.5rem]">
                        <img src="{{ asset('assets/icons/home.png') }}" alt="home" class="w-[3rem] h-[3rem] unselected-menu" />
                        <span>Home</span>
                    </a>
                    <a href="/chat" class="flex flex-col  items-center justify-center gap-[0.5rem]">
                        <img src="{{ asset('assets/icons/email.png') }}" alt="email" class="w-[3rem] h-[3rem]  unselected-menu" />
                        <span>Pesan</span>
                    </a>
                    <a href="javascript:;" class="flex flex-col  items-center justify-center gap-[0.5rem]">
                        <img src="{{ asset('assets/icons/love.png') }}" alt="love" class="w-[3rem] h-[3rem] unselected-menu" />
                        <span>Whislist</span>
                    </a>
                    <a href="{{ route('cart', ['index='.$parameter,'route='.$route]) }}" class="flex flex-col  items-center justify-center gap-[0.5rem]">
                        <img src="{{ asset('assets/icons/shopping-cart.png') }}" alt="shopping-cart" class="w-[3rem] h-[3rem] unselected-menu" />
                        <span>Keranjang</span>
                    </a>
                    <a href="{{ url('/transaction/transaction-list') }}" class="flex flex-col items-center justify-center gap-[0.5rem]">
                        <img src="{{ asset('assets/icons/document.png') }}" alt="document" class="w-[3rem] h-[3rem] selected-menu" />
                        <span>Transaksi</span>
                    </a>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>