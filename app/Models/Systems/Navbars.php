<?php

namespace App\Models\Systems;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navbars extends Model
{
    use HasFactory;

    public function subnavbars()
    {
        return $this->hasMany(Subnavbars::class, 'navbar_id');
    }
}
