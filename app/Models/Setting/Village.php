<?php

namespace App\Models\Setting;

use App\Models\Setting\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Village extends Model
{
    use HasFactory;

    public function districts()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
