<?php

namespace App\Http\Controllers\Administration\Katalog;

use Illuminate\Http\Request;
use App\Models\Master\Category;
use App\Models\Administration\Seller\Product;
use App\Models\Administration\Seller\ProductPicture;
use App\Models\User;
use App\Models\Transaction\Rating;
use App\Models\Administration\Cart\Cart;
use Illuminate\Routing\Controller;


class ProductController extends Controller
{
    protected $url = "/administration/katalog/";

    public function index(Category $category,Request $request)
    {
        $data['query'] = $request->input('query');

        $product  = Product::where('name', 'like', '%' . $data['query'] . '%')->where('category_id',$category->id)
        ->where('status','active')
        ->get();
        
        $data['product'] = $product;
        $data['category'] = $category;

        return view('pages.administration.katalog.product.index', $data);
    }

    public function view(Product $product,Request $request)
    {
        session()->put('url_back_katalog', "katalog");
        session()->put('p_katalog', $product->category_id);
        $data['query'] = $request->input('query');
        
        $cart_count = Cart::where('buyer_id', session()->get('id'))
        ->where('status', 'belum selesai')
        ->get()->count();

        if ($cart_count >= 100):
            $data['cart_count'] = "99+";
        else:
            $data['cart_count'] = $cart_count;
        endif;

        $product  = Product::where('name', 'like', '%' . $data['query'] . '%')->where('id',$product->id)
        ->where('status','active')
        ->first();
        $data['product'] = $product;
        // $data['user'] = User:where;
        $data['rating_users'] = Rating::where('seller_id',$product->seller_id)->avg('ratings');
        $data['rating_products'] = Rating::where('product_id',$product->id)->avg('ratings');
        $data['count_ratings'] = Rating::where('product_id',$product->id)->count();
        $data['category'] = Category::where('id',$product->category_id)->first();
        return view('pages.administration.katalog.product.view',$data);
    }

    public function getRatingUser($id)
    {
        $ratingUsers = Rating::where('seller_id',$id)->avg('ratings');

        return $ratingUsers;
    }
    public function getRatingProduct($id)
    {
        $ratingProducts = Rating::where('product_id',$id)->avg('ratings');

        return $ratingProducts;
    }

    public function getImage($id)
    {
        $getImage = ProductPicture::where('product_id',$id)->first();

        return $getImage;
    }

    public function getImageAll($id)
    {
        $getImageAll = ProductPicture::where('product_id',$id)->get();

        return $getImageAll;
    }
}