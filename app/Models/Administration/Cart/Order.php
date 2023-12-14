<?php

namespace App\Models\Administration\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    use HasFactory;

    public function carts()
    {
        return $this->hasMany(Cart::class, 'order_id');
    }
}