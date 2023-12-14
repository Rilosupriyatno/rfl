<?php

namespace App\Http\Controllers\Master\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Grade;

class GradeController extends Controller
{
    public function options(Request $request)
    {
        $query = $request->input('q');
        $data = Grade::select('id', 'description as name')
        ->where('description', 'like', '%' . $query . '%')->get();
        return json_encode($data);
    }
}
