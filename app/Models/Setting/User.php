<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;

    public function userRoles()
    {
        return $this->belongsTo(UserRole::class, 'user_role_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'seller_id');
    }
}