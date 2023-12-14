@php
    $html_tag_data = [];
    $title = 'Iklan Produk';
    $description = 'Halaman Produk Detail';
    $url = '/administration/seller/'. $product->id;
    $breadcrumbs = ['/dashboard/seller' => 'Home'];

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
<script src="/js/pages/master/product/product.js"></script>
@endsection

@section('content')


<div class="container w-lg-50">
    @include('_layout/breadcrumb')
    <div class="row justify-content-center">
        <div class="col-12">
            <form method="POST" action="{{ $url }}/store_detail" class="card mb-5 tooltip-end-top">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <div class="w-100">
                                <label class="form-label" for="rattan_from">
                                    Rotan Asal
                                    @error('rattan_from')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <select class="form-select" id="rattan_from" name="rattan_from">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <div class="w-100">
                                <label class="form-label" for="name">
                                    Nama Produk
                                    @error('name')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input class="form-control" autocomplete="off" name="name">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <div class="w-100">
                                <label class="form-label" for="price">
                                    Harga Produk
                                    @error('price')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="number" class="form-control" autocomplete="off" name="price">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <div class="w-100">
                                <label class="form-label" for="stock">
                                    Stok Produk
                                    @error('stock')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="number" class="form-control" autocomplete="off" name="stock">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <div class="w-100">
                                <label class="form-label" for="grade_id">
                                    Grade
                                    @error('grade_id')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <select class="form-select" id="grade_id" name="grade_id">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="w-100">
                                <label class="form-label" for="unit">
                                    Satuan
                                    @error('unit')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <select class="form-select" id="unit" name="unit">
                                    <option value=""></option>
                                    <option value="Pcs">Pcs</option>
                                    <option value="Kg">Kg</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <div class="w-100">
                                <label class="form-label" for="weight">
                                    Berat Produk
                                    @error('weight')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="number" placeholder="Dalam bentuk gram" class="form-control" autocomplete="off" name="weight">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6 col-sm-6 col-xl-6">
                            <div class="w-100">
                                <label class="form-label" for="size_max">
                                    Ukuran maximal
                                    @error('size_max')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <input placeholder="mm" type="number" class="form-control" autocomplete="off" name="size_max">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-xl-6">
                            <div class="w-100">
                                <label class="form-label" for="size_min">
                                    Ukuran minimal
                                    @error('size_min')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="number" placeholder="mm" class="form-control" autocomplete="off" name="size_min">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-">
                            <div class="w-100">
                                <label class="form-label" for="description">
                                    Deskripsi Product
                                    @error('description')
                                        <span class="text-danger"><br />{{ $message }}</span>
                                    @enderror
                                </label>
                                <textarea id="" cols="15" rows="5" class="form-control" autocomplete="off" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit"class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100">
                        <i data-acorn-icon="save" class="icon"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection
