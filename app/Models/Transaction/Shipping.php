<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Administration\Cart\Cart;

class Shipping extends Model
{
    protected $table = 'shippings';

    use HasFactory;

    public function carts()
    {
        return $this->belongsTo(Cart::class, 'order_detail_id');
    }
}