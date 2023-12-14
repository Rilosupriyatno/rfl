@php
    $html_tag_data = [];
    $title = 'Order Masuk';
    $description = 'Halaman Order Masuk';
    $breadcrumbs = ['/dashboard/order' => 'Home']
@endphp
@extends('layout-topbar', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')

@section('content')
@php
    use App\Http\Controllers\Administration\Katalog\ProductController;
    $productController = app(ProductController::class);
@endphp
    <div class="container w-lg-50">
        @include('_layout/breadcrumb')
        <div class="d-flex flex-column gap-4">
            <form action="javascript:;" class="row">
                <div class="col-12 col-md-6">
                    <div class="d-flex justify-content-start">
                        <select name="sort-by" class="form-select w-auto">
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="finish">Selesai</option>
                            <option value="process">Sedang di proses</option>
                            <option value="cancel">Batal</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="d-flex justify-content-end">
                        <input type="text" name="search_order" placeholder="Cari Order (berdasarkan produk)" class="form-control w-75">
                    </div>
                </div>
            </form>
            @foreach ($order_in as $order)
                @php
                    $order_code = $order->orders->code;
                    $buyer_name = $order->user_buyers->name;
                    $is_payed = $order->orders->payment_status === "paid";
                    $order_date = $order->orders->created_at;
                    $product_name = $order->products->name;
                    $product_price = $order->products->price;
                    $product_total = $order->qty;
                    $product_id = $order->product_id;
                    $sub_total = $product_price * $product_total;
                    // dd($order)

               
                @endphp
                @php
                    // product image
                    $getImage = $productController->getImage($product_id);
            
                    if ($getImage) {
                        $image = $getImage->name;
                    }

                    // dd($image)
                @endphp
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <b>{{ $order_code }} ({{ $buyer_name }})</b>
                        <span>{{ date_format($order_date, "d F Y") }}</span>
                    </div>
                    <div class="card-body d-flex justify-content-between align-content-center">
                        <div>
                            <b>{{ $product_name }}</b>
                            <p>{{ $product_total }}</p>
                        </div>
                        <img src="{{ '/'.$image }}" alt="Gambar Produk" width="75" height="75">
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <span>Total Harga</span>
                            <b>{{ rupiah($sub_total) }}</b>
                        </div>
                        <button class="btn btn-primary {{ $is_payed ? '' : 'disabled' }}">{{ $is_payed ? 'Konfirmasi pemesasnan' : 'Menunggu pembayaran' }}</button>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $order_in->links() }}
    </div>
@endsection