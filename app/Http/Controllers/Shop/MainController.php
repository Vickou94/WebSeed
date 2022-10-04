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

    public function product(Request $request) {

        $product = Products::find($request->id);

        return view('shop.product', compact('product'));
    }

    public function cart() {

        return view('shop.cart');
    }
}
