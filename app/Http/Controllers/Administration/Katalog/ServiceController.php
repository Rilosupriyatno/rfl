<?php

namespace App\Http\Controllers\Administration\Katalog;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Import the base controller
use App\Models\Administration\Seller\Product;
use App\Models\Administration\Seller\ProductPicture;

class ServiceController extends Controller
{
    function index() {
        return 'hi';
    }
}