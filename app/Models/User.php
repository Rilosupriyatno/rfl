<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Setting\UserRole;
use App\Models\Setting\City;
use App\Models\Administration\Cart\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function user_roles()
    {
        return $this->belongsTo(UserRole::class, 'user_role_id');
    }
    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'seller_id');
    }
}