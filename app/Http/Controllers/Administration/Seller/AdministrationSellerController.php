<?php

namespace App\Http\Controllers\Administration\Seller;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Administration\Seller\Product;
use App\Models\Administration\Seller\ProductPicture;
use App\Models\User;


class AdministrationSellerController extends Controller
{
    protected $url = "/administration/seller/";

    public function product()
    {
        return view('pages.administration.seller.product');
    }

    public function product_detail(Product $product)
    {
        // dd($product);
        $data['product'] = $product;
        return view('pages.administration.seller.product-detail',$data);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        $images = $request->file('image');
        // $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        // $filename = time() . '.' . $image->getClientOriginalExtension();

        // $image->storeAs('public/product/', $filename);
        // // Set the path to the image file
        // $imageName= 'storage/product/' . $filename;

        // $user = User::where('id', session()->get('id'))->first();
        // // dd($user);

        // $formFields['seller_id'] = $user->id;
        // $formFields['category_id'] = $user->category_id;
        // $formFields['status'] = "inactive";

        // $product = Product::create($formFields);

        // $productPicture['product_id'] = $product->id;
        // $productPicture['name'] = $imageName;

        // ProductPicture::create($productPicture);
        // dd($images);

        $user = User::where('id', session()->get('id'))->first();
        
        $formFields['seller_id'] = $user->id;
        $formFields['category_id'] = $user->category_id;
        $formFields['status'] = "inactive";
    
        $product = Product::create($formFields);
        $no = 1;
        foreach ($images as $image) {
            $filename = time() .$no.'.' . $image->getClientOriginalExtension();
            $image->storeAs('public/product/', $filename);
        
            // Set the path to the image file
            $imageName = 'storage/product/' . $filename;
        
            $productPicture = new ProductPicture();
            $productPicture->product_id = $product->id;
            $productPicture->name = $imageName;
            $productPicture->save();
            $no++;
        }
        return redirect($this->url.$product->id."/product_detail")->with('status', 'Produk anda berhasil di iklankan');
    }

    public function store_detail(Request $request)
    {
        $formFields = $request->validate([
            'grade_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'size_max' => 'required',
            'size_min' => 'required',
            'rattan_from' => 'required',
            'unit' => 'required',
            'weight' => 'required',
            'description' => 'required',
        ]);
        $formFields['status'] = "active";
        $id = $request->get('id');
        Product::find($id)->update($formFields);

        return redirect($this->url)->with('alert', ['message' => 'Data has been saved!', 'status' => 'success']);
    }

    public function myproduct()
    {
        $myproduct = Product::where('seller_id', session()->get('id'))->get();
        return view('pages.administration.seller.myproduct', compact('myproduct'));
    }

}
