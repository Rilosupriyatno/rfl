@php
    $html_tag_data = [];
    $title = 'Formulir User';
    $description = 'Create User';
    $breadcrumbs = ['/' => 'Home', '/setting/role' => 'View User'];
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
    <script src="/js/pages/setting/user.js"></script>
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
        <form method="POST" action="/setting/user/store" class="card mb-5 tooltip-end-top">
            @csrf
            <div class="card-body">
                <div class="row g-3 mb-3">
                    <div class="col-6 col-sm-6 col-xl-6">
                        <div class="w-100">
                            <label class="form-label" for="name">
                                Nama
                                @error('name')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" name="name">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-6">
                        <div class="w-100">
                            <label class="form-label" for="user_role_id">
                                Level
                                @error('user_role_id')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <select class="form-control" autocomplete="off" id="user_role_id" name="user_role_id"></select>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-6 col-sm-6 col-xl-6">
                        <div class="w-100">
                            <label class="form-label" for="username">
                                Username
                                @error('username')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" name="username">
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-xl-6">
                        <div class="w-100">
                            <label class="form-label" for="password">
                                Password
                                @error('password')
                                    <span class="text-danger"><br />{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control" autocomplete="off" name="password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit"class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                    <i data-acorn-icon="save" class="icon"></i>
                    <span>Simpan</span>
                </button>
            </div>
        </form>
        <!-- Form End -->
    </div>
@endsection
