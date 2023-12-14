@php
$html_tag_data = [];
$title = 'Iklan Produk';
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


<div class="container w-lg-50">
    @include('_layout/breadcrumb')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-12">
            <form method="POST" action="{{ url("administration/seller/store") }}" enctype="multipart/form-data" class="card mb-5 tooltip-end-top">
                @csrf
                <div class="card-header">
                    <h2 class="mb-0 pb-0 text-center">
                        <span class="fw-bold">Hi!</span><br />
                        <small class="text-muted">Silahkan Upload</small>
                    </h2>
                </div>
                <div class="card-body">
                    <div class="row g-3 mb-3">
                        <div class="col-12 text-center">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="position-relative d-inline-block" id="singleImageUploadExample">
                                <img src="/img/illustration/camera.png" alt="alternate text" class="rounded-sm border-separator-light border-2 sw-10 sh-10">
                                <button class="btn btn-sm btn-icon btn-icon-only btn-separator-light rounded-xl position-absolute e-0 b-0" type="button">
                                    <i data-acorn-icon="upload"></i>
                                </button>
                                <input name="image[]" class="file-upload d-none" type="file" accept="image/*" capture="camera" multiple>
                                <input type="hidden" name="latitude" />
                                <input type="hidden" name="longitude" />
                            </div>
                        </div>
                    </div>
                    {{-- <div id="geolocation" class="text-center"></div> --}}
                </div>
                <div id="footer" class="card-footer text-end">
                    <div class="d-grid gap-2 col mx-auto mb-3">
                        <button type="submit" class="btn btn-outline-primary btn-icon btn-icon-start ms-0 w-100">
                            <i data-acorn-icon="save" class="icon"></i>
                            <span>Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection