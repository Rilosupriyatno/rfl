<?php

namespace App\Models\Administration\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Administration\Seller\Product;


class Cart extends Model
{
    protected $table = 'order_details';

    use HasFactory;

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user_sellers()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
    public function cities()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
    public function user_buyers()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function shippings()
    {
        return $this->hasMany(Shipping::class, 'order_detail_id');
    }

    // public function getTotalWeightPerProductAttribute()
    // {
    //     $weight = $this->qty * $this->products->weight;
    //     return $weight;
    // }
}