<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\OrderLine;

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

    public function success() {
        $cartItems = \Cart::getContent();
        $latestNumb = Order::orderby('created_at', 'desc')->get('id')->first();
        if (!$latestNumb) {
          $latestNumb =  0;
        } else {
          $latestNumb = $latestNumb->id;
        }
        $totalp = 0;
        $totalq = 0;
        $orderN = '#' . str_pad($latestNumb + 1, 4, "0", STR_PAD_LEFT);
        foreach ($cartItems as $cart) {
          $tota = $cart->attributes->price_ttc * $cart->quantity;
          $totalp += $tota;
          $totalq += $cart->quantity;
          Orderline::create([
            'email' => auth()->user()->email,
            'document_number' => $orderN, 'item_id' => $cart->name,
            'quantity' => $cart->quantity, 'price' => $cart->attributes->price_ttc, 'total_price' => $cart->quantity * $cart->attributes->price_ttc,
            'created_at' => now(), 'updated_at' => now()
          ]);
        }
        Order::create([
          'email' => auth()->user()->email, 'document_number' => $orderN,
          'total' => $totalp, 'total_quantity' => $totalq, 'address' => auth()->user()->address,
          'zipcode' => auth()->user()->zipcode, 'created_at' => now(), 'updated_at' => now()
        ]);
        $mailData = [
            "order" => $orderN,
            "address" => auth()->user()->address,
            "city" => auth()->user()->city,
            "zipcode" => auth()->user()->zipcode,
            "name" => auth()->user()->name .' '. auth()->user()->firstname,
            "amount" => number_format($totalp,2) . '€',
        ];
    
        Mail::to("hello@example.com")->send(new TestEmail($mailData));

        \Cart::clear();

        return view('checkout.success');
    }

    public function error() {
        return view('checkout.error');
    }
}
