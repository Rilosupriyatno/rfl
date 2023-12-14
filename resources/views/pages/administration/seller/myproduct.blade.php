@php
$html_tag_data = [];
$title = 'Iklan Produk Saya';
$description = 'Halaman Produk';
$breadcrumbs = ['/dashboard/seller' => 'Home'];
@endphp
@extends('layout-topbar', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
<script src="/js/vendor/singleimageupload.js"></script>
@endsection

@section('js_page')
<script src="/js/pages/administrator/seller/seller.js?v={{ uniqid() }}"></script>
<script src="/js/pages/transaction/cashier/cash_in.js"></script>

@endsection

@section('content')


<div class="container max-w-[480px] ">
    @include('_layout/breadcrumb')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="grid grid-cols-2 gap-2">
        @foreach ($myproduct as $data)
            @php
                $rating_products = app('App\Http\Controllers\Administration\Katalog\ProductController')->getRatingProduct($data->id);
                $getImage = app('App\Http\Controllers\Administration\Katalog\ProductController')->getImage($data->id);
    
                if ($getImage) {
                $image = $getImage->name;
                }
            @endphp
            <a href="{{ url('/administration/katalog/product/'.$data->id.'/view') }}" class="col-span-1 border border-black rounded-[1rem] hover:cursor-pointer">
                <div class="w-full h-[10rem] relative">
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

@endsection