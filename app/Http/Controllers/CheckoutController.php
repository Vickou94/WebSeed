<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\Exception\CardException;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
  function payement()
  {

    $cartItems = \Cart::getContent();

    $token = bin2hex(random_bytes(10));

    $stripe = \Stripe\Stripe::setApiKey('sk_test_51JNcN3G6EY8YBpG2TGa9toY6J8G24QZ6TwZ17SMdM0LQvYniWqyml2CmCufaO2W4hwhX6DB7fyP6JuTGKdVGlVgD00hqdpfou5');

    $allItems = [];
    foreach ($cartItems as $item) {

      $allItems[] = [
        'price_data' => [
          'currency' => 'eur',
          'product_data' => [
            'name' => $item->name,
          ],
          'unit_amount' => ($item->attributes->price_ttc) * 100,
        ],
        'quantity' => $item->quantity,
      ];
    }

    try {
      $session = \Stripe\Checkout\Session::create([
        'line_items' => [
          $allItems
        ],

        'mode' => 'payment',
        'success_url' => 'http://127.0.0.1:8000/checkout_success/' . $token,
        'cancel_url' => 'http://127.0.0.1:8000/checkout_error'
      ]);
      

      

    } catch (Exception $e) {
      $session['error'] = $e->getMessage();
    }


  
      return redirect($session->url, 303);

  }
}