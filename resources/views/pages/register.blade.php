@php
    $title = 'Registration Page';
    $description = 'Registration Page';
@endphp
@extends('layout-guest', ['title' => $title, 'description' => $description])
@section('css')
    <link rel="stylesheet" href="/css/pages/portal.css">
@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
@endsection

@section('content_left')
    <div class="min-h-100 d-flex align-items-center">
        <div class="w-100 w-lg-75 w-xxl-75 pt-4 rounded-end opacity-75 bg-light">
            <div>
                <div class="mb-5">
                    <h1 class="display-3 px-6 text-dark fw-bold m-0">Aplikasi Rekam Medis </h1>
                    <h1 class="display-6 px-6 text-dark fw-bold m-0">Untuk Layanan Kesehatan Kamu</h1>
                </div>
                <p class="h6 text-dark text-justify lh-1-5 mb-5 px-6 ">
                    Aplikasi kesehatan lengkap dan terpercaya mulai dari fitur registrasi pasien, online booking, data rekam
                    medis, support rekam medis elektronik, rawat jalan, laboratorium, SOAP & diagnosa ICD-10, apotek
                    (farmasi), stock inventory, keuangan dan fitur pembayaran (kasir).
                </p>
                <div class="mb-5 px-6">
                    <div class="d-grid gap-2 mb-3">
                        <a class="btn btn-lg btn-outline-dark fw-bold" href="/">Pelajari Lebih lanjut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content_right')
    <div
        class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
        <div class="sw-lg-50 px-5">
            <div class="sh-11">
                <a href="/">
                    <div><img src="{{ asset('img/logo/logo_rekam_medis_black.png') }}" alt="" class="logo-default"></div>
                </a>
            </div>
            <div class="mb-5">
                <h2 class="cta-1 mb-0 text-primary">Portal Pendaftaran,</h2>
                <h2 class="cta-4 text-primary">Mulai Perjalanan Kesehatan Bersama Kami</h2>
            </div>
            <div class="mb-5">
                <p class="h6">Ayo isi formulir ini untuk bergabung.</p>
                <p class="h6">
                    Jika Anda sudah mendaftar, silakan masuk melalui halaman
                    <a href="/">login</a>.
                </p>
            </div>
            <div>
                @if ($errors->any())
                    {!! implode('', $errors->all('<div class="mb-2 text-danger">:message</div>')) !!}
                @endif
                <form method="POST" action="/register" id="loginForm" class="tooltip-end-bottom" novalidate>
                    @csrf
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="user"></i>
                        <input class="form-control" placeholder="Nama Lengkap" name="name" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="key"></i>
                        <input class="form-control" placeholder="Username" name="username" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="phone"></i>
                        <input type="number" class="form-control" placeholder="No Telp. / Whatsapp" name="no_telp" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="lock-off"></i>
                        <input class="form-control pe-7" name="password" type="password" placeholder="Password" />
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-lg btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
