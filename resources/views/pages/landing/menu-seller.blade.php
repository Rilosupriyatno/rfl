@php
$html_tag_data = [];
$title = 'Dashboard Seller';
$description = 'Halaman dashboard Seller';
$breadcrumbs = ['/dashboard/seller' => 'Home'];
@endphp
@extends('layout-topbar', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content')
<div class="relative h-[316px] bg-gradient-to-b from-[#62C3D0] mb-20">
    <div class="fixed left-0 z-20 h-[60px] w-full bg-gradient-to-b from-[#62C3D0]">
        <div class="relative m-auto flex justify-between h-full max-w-[480px] items-center p-0 px-4" @isset($custom_nav_data) @foreach ($custom_nav_data as $key=> $value)
            data-{{ $key }}="{{ $value }}"
            @endforeach
            @endisset>
            <div class="logo position-relative">
                <a href="/">
                    <img src="{{ asset('img/logo/logo-mrfl-white.png') }}" class="full-white h-[30px] w-auto" alt="logo"/>
                </a>
            </div>
            <div class="mobile-buttons-container">
                <a href="/chat" id="mobileMenuButton" class="menu-button text-white mx-4 h-full">
                    <i class="fa-solid fa-message fa-lg" style="color: #ffffff;">
                        <div class="position-absolute top-4 end-[54px] ranslate-middle w-2 h-2 rounded-full bg-red-600">
                        </div>
                    </i>
                </a>
                <a href="#" id="mobileMenuButton" class="menu-button text-white">
                    <i class="fa-solid fa-ellipsis-vertical fa-xl"></i>
                </a>
            </div>
        </div>
    </div>
    <div class=" absolute top-14 mx-auto w-full translate-y-full row justify-content-center text-center">
        <div class="col">
            <h1 class="font-poppins font-normal capitalize text-base text-white">{{ $data_greeting }}</h1>
            <h1 class="font-poppins font-semibold capitalize text-2xl text-white">{{ session('name') }}</h1>
        </div>
    </div>
    <div class="absolute bottom-0 left-4 translate-y-1/2 w-[calc(100%_-_32px)]">
        @include('_layout/breadcrumb')
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="grid grid-cols-12 gap-2">
                <a class="bg-white rounded-2xl col-span-6 h-44 flex justify-center p-4" href="{{ url("administration/seller") }}">
                    <div class=" w-full h-full my-auto flex flex-col items-center">
                        <div class=" h-full w-full flex flex-column align-items-center">
                            <i class="fa fa-bullhorn fa-2xl text-black m-auto"></i>
                        </div>
                        <div class=" h-fit flex flex-column align-items-center">
                            <h2 class="fw-bold d-block my-auto text-[#62C3D0]">Pasang Iklan</h2>
                        </div>
                    </div>
                </a>
                <a class="bg-white rounded-2xl col-span-6 h-44 flex justify-center p-4" href="{{ route('myproduct')}}">
                    <div class="w-full h-full my-auto flex flex-col items-center">
                        <div class=" h-full w-full flex flex-column align-items-center">
                            <i class="fa-solid fa-2xl fa-box-archive m-auto" style="color: #000000;"></i>
                        </div>
                        <div class=" h-fit flex flex-column align-items-center">
                            <h2 class="fw-bold d-block my-auto text-[#62C3D0]">Iklan Saya</h2>
                        </div>
                    </div>
                </a>
                <a class="bg-white rounded-2xl col-span-6 h-44 flex justify-center p-4" href="{{ url("administration/cariorderan") }}">
                    <div class="w-full h-full my-auto flex flex-col items-center">
                        <div class=" h-full w-full flex flex-column align-items-center">
                            <i class="fa fa-2xl fas fa-shopping-cart text-black m-auto"></i>
                        </div>
                        <div class=" h-fit flex flex-column align-items-center">
                            <h2 class="fw-bold d-block my-auto text-[#62C3D0]">Cari Orderan</h2>
                        </div>
                    </div>
                </a>
                <a class="bg-white rounded-2xl col-span-6 h-44 flex justify-center p-4" href="{{ url("administration/order-in") }}">
                    <div class="position-relative d-inline-block w-full h-full my-auto flex flex-col items-center">
                        <div class="position-absolute top-0 start-100 translate-middle badge rounded-full bg-danger">
                            <p class="text-lg px-1">{{ $data_order_in }}</p>
                        </div>
                        <div class="h-full w-full flex flex-column align-items-center">
                            <i class="fa fa-2xl fa-boxes text-black m-auto"></i>
                        </div>
                        <div class="h-fit flex flex-column align-items-center m-">
                            <h2 class="fw-bold d-block my-auto text-[#62C3D0]">Orderan Masuk</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @include('_layout/footer-seller') --}}