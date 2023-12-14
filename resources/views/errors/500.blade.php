@php
    $title = 'Error Page';
    $description = 'Error Page';
@endphp
@extends('layout-guest', ['title' => $title, 'description' => $description])
@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
@endsection

@section('content_left')
@endsection

@section('content_right')
    <div
        class="sw-lg-80 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
        <div class="sw-lg-60 px-5">
            <div class="sh-11">
                <a href="/">
                    <div class="logo-default"></div>
                </a>
            </div>
            <div class="mb-5">
                <h2 class="cta-1 mb-0 text-primary">Ooops, it looks ls ssike an error!</h2>
                <h2 class="display-2 text-primary">Error {{ $code }}</h2>
            </div>
            <div class="mb-5">
                <p class="h6">{{ $message }}.</p>
                <p class="text-muted">
                    Jika anda rasa ini adalah sebuah kesalahan, silahkan
                    anda bisa <a href="/">menghubungi</a> kami.
                </p>
            </div>
            <div>
                <a href="/" class="btn btn-icon btn-icon-start btn-primary">
                    <i data-acorn-icon="arrow-left"></i>
                    <span>Back to Home</span>
                </a>
            </div>
        </div>
    </div>
@endsection
