<?php

namespace App\Models\Administration\Seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Master\Grade;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    use HasFactory;

    public function grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
