<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidtransSnap extends Model
{
    use HasFactory;

    protected $midtransSnap = [
        'buyer_id',
        'code',
        'payment_method',
        'discount',
        'shipping_cost',
        'tax',
        'grandtotal',
        'payment_status',
        'order_status',
        'shipping_name',
        'snap_token',
    ];
}
