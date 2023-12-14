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
{{-- <style>
    .img {
        width: auto;
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 767px) {
        .img {
            height: 170px;
        }
    }

    @media (min-width: 768px) {
        .img {
            height: 210px;
        }
    }
</style> --}}
@php
$parameter = request()->segment(4);
$route = request()->segment(3);
@endphp

<body>
    <main>
        <header class="w-full pt-[3rem] pb-[1.5rem]">
            <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex items-center justify-center gap-[1rem]">
                <div class="w-[2rem] hover:cursor-pointer">
                    <a href="/dashboard">
                        <img src="{{ asset('assets/icons/left-arrow.png') }}" alt="Left Arrow" class="w-full">
                    </a>
                </div>
                <form action="/administration/katalog/product/{{$category->id}}" style="width:100%" method="GET">
                    <input type="text" name="query" value="{{ $query }}" placeholder="Cari {{ $category->description }}" class="w-full border border-gray-400 rounded-[0.2rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-black placeholder:font-roboto focus:outline-none focus:border-gray-500" />
                </form>
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
                        @foreach ($product as $data)
                        @php
                        $rating_products = app('App\Http\Controllers\Administration\Katalog\ProductController')->getRatingProduct($data->id);
                        $getImage = app('App\Http\Controllers\Administration\Katalog\ProductController')->getImage($data->id);

                        if ($getImage) {
                        $image = $getImage->name;
                        }
                        @endphp
                        <a href="{{ url('/administration/katalog/product/'.$data->id.'/view') }}" class="border border-black rounded-[1rem] hover:cursor-pointer">
                            <div class="w-[21rem] h-[14rem] relative">
                                <img src="{{ asset($image) }}" alt="rattan-material" class="rounded-t-[1rem] absolute inset-0 w-full h-full object-cover ">
                                <!-- <img src="{{ asset('assets/image/rotan1.jpg') }}" alt="rattan-material" class="rounded-t-[1rem] absolute inset-0 w-full h-full object-cover "> -->

                            </div>
                            <div class="flex flex-col gap-[1rem] px-[1rem] pt-[1.5rem] pb-[1rem]">
                                <div class="flex flex-col gap-[0.7rem]">
                                    <div class="flex flex-col items-start gap-[0.2rem]">
                                        <h5 class="text-[2rem] font-bold leading-[2.5rem]">{{ $data->name }}</h5>
                                        <span class="text-[1rem] text-[#767676]">{{ $data->rattan_from }}</span>
                                    </div>
                                    <div class="flex items-center gap-[0.5rem]">
                                        <span class="text-[#767676]">{{ $data->size_min }}mm - {{ $data->size_max }}mm</span>
                                        <span class="bg-[#FFCC33] px-[0.5rem] py-[0.1rem] rounded-[1rem]">{{ $data->grades->description }}</span>
                                    </div>
                                    <h6 class="text-[1.5rem]">{{ rupiah($data->price) }} /{{ $data->unit }}</h6>
                                    <div class="flex items-center gap-[0.5rem]">
                                        <span class="text-[#767676]">Stock Ready {{ $data->stock }} {{ $data->unit }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-[1rem]">
                                        @if($rating_products != NULL)
                                        <div class="flex items-center gap-[0.5rem]">
                                            <img src="{{ asset('assets/icons/star.png') }}" alt="star" class="w-[1.5rem] sunglow-img">
                                            <span class="text-[1.2rem]">{{ number_format($rating_products,1) }} </span>
                                        </div>
                                        <div class="pl-[1rem] border-l-2">
                                            <span class="text-[1.2rem]">Terjual: 5.000{{ $data->unit }}</span>
                                        </div>
                                        @else
                                        <span class="text-[1.2rem]">Terjual: 5.000{{ $data->unit }}</span>
                                        @endif
                                    </div>
                                    <button class="w-[3rem]">
                                        <img src="{{ asset('assets/icons/dots.png') }}" alt="dots" class="w-full">
                                    </button>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </section>
        </main>
        {{-- <footer class="fixed w-full bottom-0 left-0">
            <div class="max-w-rattan-mobile mx-auto bg-white border-t-2 border-[#FFBA00] py-[1.5rem]">
                <div class="px-[1.5rem] grid grid-cols-5 justify-items-center gap-[1rem]">
                    <a href="/" class="flex flex-col items-center justify-center gap-[0.5rem]">
                        <img src="{{ asset('assets/icons/home.png') }}" alt="home" class="w-[3rem] h-[3rem] selected-menu" />
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
                        <img src="{{ asset('assets/icons/document.png') }}" alt="document" class="w-[3rem] h-[3rem] unselected-menu" />
                        <span>Transaksi</span>
                    </a>
                </div>
            </div>
        </footer> --}}
    </main>
</body>

</html>