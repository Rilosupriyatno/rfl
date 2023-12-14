<?php

namespace App\Http\Controllers\Administration\Seller;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('pages.administration.seller.chat');
    }
}
