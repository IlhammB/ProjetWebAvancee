<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    function process()
    {
        return view('frontend.order.checkout');
    }
}
