<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {

       $products = Products::all(); 

        return view('shop.index', compact('products'));
    }

    public function product() {
        dd($_GET);
        return view('shop.product');
    }
}
