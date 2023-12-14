@php
    $html_tag_data = [];
    $title = 'Formulir Desa/Kelurahan';
    $description = 'Create Desa/Kelurahan';
    $breadcrumbs = ['/' => 'Home', '/setting/village' => 'View Desa/Kelurahan'];
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
    <script src="/js/pages/setting/village.js?v1"></script>
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
        <form method="POST" action="/setting/village/store" class="card mb-5 tooltip-end-top">
            @csrf
            <div class="card-body">
                <div class="row g-3 mb-3">
                    <div class="col-12 col-sm-4 col-xl-4">
                        <div class="w-100">
                            <label class="form-label" for="province_id">
                                Provinsi
                                @error('province_id')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <select class="form-control" autocomplete="off" id="province_id" name="province_id"></select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-xl-4">
                        <div class="w-100">
                            <label class="form-label" for="city_id">
                                Kota
                                @error('city_id')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <select class="form-control" autocomplete="off" id="city_id" name="city_id"></select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-xl-4">
                        <div class="w-100">
                            <label class="form-label" for="district_id">
                                Kecamatan
                                @error('district_id')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <select class="form-control" autocomplete="off" id="district_id" name="district_id"></select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-xl-12">
                        <div class="w-100">
                            <label class="form-label" for="description">
                                Deskripsi
                                @error('description')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" name="description">
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
