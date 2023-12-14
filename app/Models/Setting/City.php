<?php

namespace App\Models\Setting;

use App\Models\Setting\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
