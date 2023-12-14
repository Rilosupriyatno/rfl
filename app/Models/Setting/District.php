<?php

namespace App\Models\Setting;

use App\Models\Setting\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
