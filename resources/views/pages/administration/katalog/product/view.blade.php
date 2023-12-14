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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Rattan For Life</title>
</head>
<style>
    .buy:hover {
        color: #ffc107;
    }

    .carousel-item img {
        width: auto;
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 767px) {
        .carousel-item img {
            height: 340px;
        }
    }

    @media (min-width: 768px) {
        .carousel-item img {
            height: 440px;
        }
    }
</style>
@php
$parameter = request()->segment(4);
@endphp

<body>
    <main>
        <header class="w-full pt-[3rem] pb-[1.5rem]">
            <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex items-center justify-center gap-[1rem]">
                <div class="w-[2rem] hover:cursor-pointer">
                    <a href="{{ route(session('url_back_katalog'), ['category' => session('p_katalog')]) }}">
                        <img src="{{ asset('assets/icons/left-arrow.png') }}" alt="Left Arrow" class="w-full">
                    </a>
                </div>
                <form action="/administration/katalog/product/{{$category->id}}" style="width:100%" method="GET">
                    <input type="text" name="query" value="{{ $query }}" placeholder="Cari {{ $category->description  }}" class="w-full border border-gray-400 rounded-[0.2rem] px-[1.2rem] py-[0.5rem] text-[1.2rem] placeholder:text-[1.2rem] placeholder:italic placeholder:text-black placeholder:font-roboto focus:outline-none focus:border-gray-500" />
                </form>
                <a href="{{ route('cart', ['xy='.$parameter]) }}" class="relative cursor-pointer">
                    <img src="{{ asset('assets/icons/shopping-cart.png') }}" alt="shopping-cart" class="w-[2.5rem]">
                    <span class="absolute top-0 right-0 translate-x-2/4 -translate-y-1/3 bg-red-600 text-white font-bold p-1 rounded-lg text-[0.7rem]">{{ $cart_count }} </span>
                </a>
            </div>
        </header>
        <main class="w-full pb-[10rem]">
            <section class="w-full py-[1rem]">
                <div class="max-w-rattan-mobile h-full mx-auto px-[2rem] flex flex-col gap-[1.5rem] items-start">
                    <div class="flex flex-col gap-[1rem]">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {!! html_entity_decode(session('status')) !!}
                        </div>
                        @endif
                        <div class="relative">
                            @php
                            $relatedData = app('App\Http\Controllers\Administration\Katalog\ProductController')->getImageAll($product->id);
                            $count = count($relatedData);
                            @endphp
                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    @if ($relatedData)
                                    @foreach ($relatedData as $index => $relatedItem)
                                    <div class="carousel-item<?= !$index ? ' active' : '' ?>">
                                        <!-- <img src="{{ asset('assets/image/rotan1.jpg') }}" style="object-fit: cover" class="d-block rounded-t-[1rem] rounded-top" alt="Gambar 1"> -->
                                        <img src="/{{ $relatedItem->name }}" style="object-fit: cover" class="d-block rounded-t-[1rem] rounded-top" alt="Gambar 1">
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                @if($count!=1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-[1.5rem]">
                        <div class="flex items-center justify-between">
                            <h5 class="text-[2rem] font-bold">{{ rupiah($product->price) }} /{{ $product->unit }}</h5>
                            <button class="w-[2rem] h-[2rem]">
                                <img src="{{ asset('assets/icons/love.png') }}" alt="love-border" class="full-heart">
                            </button>
                        </div>
                        <div class="flex flex-col gap-[1rem]">
                            <h6 class="text-[1.5rem] font-bold">Detail Produk</h6>
                            <div class="flex flex-col gap-[0.5rem]">
                                <h6 class="text-[1.5rem]">{{ $product->name }}</h6>
                                @if($rating_products != null)
                                <div class="flex items-center gap-[0.5rem] mb-2">
                                    Terjual 100+
                                    <img src="{{ asset('assets/icons/star.png') }}" alt="star" class="w-[1.5rem] sunglow-img">
                                    <span class="text-[1.2rem]">{{ number_format($rating_products, 1)}} ({{ $count_ratings }}) </span>
                                </div>
                                @endif
                                <div class="flex flex-col gap-[1rem]">
                                    <div class="flex items-center gap-[0.5rem]">
                                        <span class="text-[#767676]">{{ $product->size_min }}mm - {{ $product->size_max }}mm</span>
                                        <span class="bg-[#FFCC33] px-[0.5rem] py-[0.1rem] rounded-[1rem]">{{ $product->grades->description }}</span>
                                    </div>
                                    <div class="flex flex-col gap-[0.5rem]">
                                        <div class="grid grid-cols-2 border-b-2 pb-[0.7rem]">
                                            <span class="text-[1.3rem]">Asal dari</span>
                                            <span class="text-[1.3rem] text-[#767676]">{{ $product->rattan_from }}</span>
                                        </div>
                                        <div class="grid grid-cols-2 border-b-2 pb-[0.7rem]">
                                            <span class="text-[1.3rem]">Dikirim dari</span>
                                            <span class="text-[1.3rem] text-[#767676]">{{ $product->users->cities->description }}</span>
                                        </div>
                                        <div class="grid grid-cols-2 border-b-2 pb-[0.7rem]">
                                            <span class="text-[1.3rem]">Stok ready</span>
                                            <span class="text-[1.3rem] text-[#767676]">{{ $product->stock }} {{ $product->unit }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-[1rem]">
                            <h6 class="text-[1.5rem] font-bold">Deskripsi Produk</h6>
                            <div class="flex flex-col gap-[0.5rem]">
                                <span class="text-[1.2rem] wrap-three-lines">{{ $product->description }}</span>
                                <a href="javascript:;" class="text-[1.2rem] text-[#FFBA00] font-bold">Baca Selengkapnya</a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-[1rem]">
                            <h6 class="text-[1.5rem] font-bold">Penjual</h6>
                            <div class="flex flex-col gap-[0.7rem]">
                                <div class="flex items-center gap-[1rem]">
                                    <img src="{{ asset('assets/icons/user.png') }}" alt="user" class="w-[4rem] h-[4rem]">
                                    <div class="flex flex-col">
                                        <span class="text-[1.2rem] font-bold">{{ $product->users->name }}</span>
                                        <p class="text-[#767676]">Petani, {{ $product->users->cities->description }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-[1rem]">
                                    @if($rating_users != null)
                                    <div class="flex items-center gap-[0.5rem]">
                                        <img src="{{ asset('assets/icons/star.png') }}" alt="star" class="w-[1.5rem] sunglow-img">
                                        <span class="text-[1.2rem]">{{ number_format($rating_users, 1) }} </span>
                                    </div>
                                    @endif
                                    <a href="#" style="color:black">Ulasan Penjual</a>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-[1.5rem]">
                            <div class="flex flex-col gap-[1rem]">
                                <div class="flex items-center justify-between">
                                    <h6 class="text-[1.5rem] font-bold">Ulasan Pembeli</h6>
                                    <a href="javascript:;" class="text-[#FFBA00] font-bold">Lihat Semua</a>
                                </div>
                                <div class="flex flex-col gap-[1rem]">
                                    <div class="flex items-center gap-2">
                                        <div class="flex items-center gap-2">
                                            <img src="{{ asset('assets/icons/star.png') }}" alt="rating" class="w-10 h-10 sunglow-img">
                                            <b class="text-[1.2rem]">5.0</b>
                                        </div>
                                        <div class="mt-1 text-[#767676]">
                                            <span>316 rating</span>
                                            <span>-</span>
                                            <span>99 ulasan</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <a href="javascript:;" class="overflow-hidden rounded-md h-[8rem] w-[8rem] max-[450px]:w-[7rem] max-[450px]:h-[7rem] max-[400px]:w-[6rem] max-[400px]:h-[6rem] max-[350px]:w-[5rem] max-[350px]:h-[5rem]">
                                            <img src="{{ asset('assets/image/product-1.jpg') }}" alt="product-1" class="w-full h-full object-cover">
                                        </a>
                                        <a href="javascript:;" class="overflow-hidden rounded-md h-[8rem] w-[8rem] max-[450px]:w-[7rem] max-[450px]:h-[7rem] max-[400px]:w-[6rem] max-[400px]:h-[6rem] max-[350px]:w-[5rem] max-[350px]:h-[5rem]">
                                            <img src="{{ asset('assets/image/product-1.jpg') }}" alt="product-1" class="w-full h-full object-cover">
                                        </a>
                                        <a href="javascript:;" class="overflow-hidden rounded-md h-[8rem] w-[8rem] max-[450px]:w-[7rem] max-[450px]:h-[7rem] max-[400px]:w-[6rem] max-[400px]:h-[6rem] max-[350px]:w-[5rem] max-[350px]:h-[5rem]">
                                            <img src="{{ asset('assets/image/product-1.jpg') }}" alt="product-1" class="w-full h-full object-cover">
                                        </a>
                                        <a href="javascript:;" class="overflow-hidden rounded-md h-[8rem] w-[8rem] max-[450px]:w-[7rem] max-[450px]:h-[7rem] max-[400px]:w-[6rem] max-[400px]:h-[6rem] max-[350px]:w-[5rem] max-[350px]:h-[5rem]">
                                            <img src="{{ asset('assets/image/product-1.jpg') }}" alt="product-1" class="w-full h-full object-cover">
                                        </a>
                                        <a href="javascript:;" class="relative overflow-hidden rounded-md h-[8rem] w-[8rem] max-[450px]:w-[7rem] max-[450px]:h-[7rem] max-[400px]:w-[6rem] max-[400px]:h-[6rem] max-[350px]:w-[5rem] max-[350px]:h-[5rem]">
                                            <span class="bg-black/30 absolute w-full h-full flex items-center justify-center text-white max-[350px]:text-[0.8rem]">Lainnya 99+</span>
                                            <img src="{{ asset('assets/image/product-1.jpg') }}" alt="product-1" class="w-full h-full object-cover">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t-2 pt-[1.5rem] flex flex-col gap-4">
                                <div class="flex items-center gap-[1rem]">
                                    <img src="{{ asset('assets/icons/user.png') }}" alt="user" class="w-[3.5rem] h-[3.5rem]">
                                    <div class="flex flex-col">
                                        <span class="text-[1.2rem] font-bold">Budi Dorame</span>
                                        <div class="mt-1 text-[#767676]">
                                            <span>5 ulasan lengkap</span>
                                            <span>-</span>
                                            <span>7 terbantu</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <div class="flex items-center gap-[0.5rem]">
                                        <div class="flex gap-1">
                                            <img src="{{ asset('assets/icons/star.png') }}" alt="rating" class="sunglow-img w-[1.5rem] h-[1.5rem]">
                                            <img src="{{ asset('assets/icons/star.png') }}" alt="rating" class="sunglow-img w-[1.5rem] h-[1.5rem]">
                                            <img src="{{ asset('assets/icons/star.png') }}" alt="rating" class="sunglow-img w-[1.5rem] h-[1.5rem]">
                                            <img src="{{ asset('assets/icons/star.png') }}" alt="rating" class="sunglow-img w-[1.5rem] h-[1.5rem]">
                                            <img src="{{ asset('assets/icons/star.png') }}" alt="rating" class="moonglow-img w-[1.5rem] h-[1.5rem]">
                                        </div>
                                        <span class="text-[#767676]">5 bulan lalu</span>
                                    </div>
                                    <div class="flex flex-col gap-[0.5rem]">
                                        <span class="text-[1.2rem] wrap-three-lines">Bacon ipsum dolor amet short ribs brisket venison rump drumstick pig sausage prosciutto chicken spare ribs salami picanha doner. Kevin capicola sausage, buffalo bresaola venison turkey shoulder picanha ham pork tri-tip meatball meatloaf ribeye. Doner spare ribs andouille bacon sausage. Ground round jerky brisket pastrami shank.</span>
                                        <a href="javascript:;" class="text-[1.2rem] text-[#FFBA00] font-bold">Selengkapnya</a>
                                    </div>
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
                    <a href="/chat/{{ $product->users->id }}" class="border border-[#FFBA00] p-[0.5rem] rounded-[0.5rem]">
                        <img src="{{ asset('assets/icons/comment.png') }}" alt="comment" class="w-[2.5rem] h-[2.5rem]">
                    </a>
                    <a href="{{url('/administration/buy-directly/'.$product->id)}}" style="text-decoration: none;" class="border buy border-[#FFBA00] text-[1.5rem] text-[#FFBA00] px-[1rem] py-[0.6rem] rounded-[0.5rem]">
                        Beli Langsung
                    </a>
                    <form method="POST" action="{{ url('/administration/cart/add/'.$product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <a href="{{ url('/administration/cart/add/'.$product->id) }}" class="bg-[#FFBA00] text-[1.5rem] text-white px-[1rem] py-[0.6rem] rounded-[0.5rem]">
                        + Keranjang
                        </a> --}}
                        <button type="submit" class="bg-[#FFBA00] text-[1.5rem] text-white px-[1rem] py-[0.6rem] rounded-[0.5rem]">
                            + Keranjang
                        </button>
                    </form>

                </div>
            </div>
        </footer>
    </main>
</body>

</html>