@php
    $html_tag_data = [];
    $title = 'Formulir Level Akses';
    $description = 'Edit Level Akses';
    $breadcrumbs = ['/' => 'Home', '/setting/role' => 'View Level Akses'];
@endphp
@extends('layout-topbar', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/cs/scrollspy.js"></script>
    <script src="/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
@endsection

@section('content')
    <div class="container">
        <!-- Title Start -->
        <section class="scroll-section" id="title">
            <div class="page-title-container">
                <h1 class="mb-0 pb-0 display-4">{{ $title }}</h1>
                @include('_layout.breadcrumb', ['breadcrumbs' => $breadcrumbs])
            </div>
        </section>
        <!-- Title End -->

        <!-- Form Start -->
        <form method="POST" action="/setting/role/update" class="card mb-5 tooltip-end-top">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row g-3 mb-3">
                    <div class="col-12 col-sm-12 col-xl-12">
                        <div class="w-100">
                            <label class="form-label" for="description">
                                Deskripsi
                                @error('description')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input name="id" type="hidden" value="{{ $userRole->id }}">
                            <input class="form-control" autocomplete="off" name="description"
                                value="{{ $userRole->description }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer p-2 text-center">
                <button type="submit"class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                    <i data-acorn-icon="save" class="icon"></i>
                    <span>Simpan</span>
                </button>
            </div>
        </form>
        <!-- Form End -->
    </div>
@endsection
