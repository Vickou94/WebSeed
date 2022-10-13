<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function payement(){
        \Stripe\Stripe::setApiKey('sk_test_51JNcN3G6EY8YBpG2TGa9toY6J8G24QZ6TwZ17SMdM0LQvYniWqyml2CmCufaO2W4hwhX6DB7fyP6JuTGKdVGlVgD00hqdpfou5');
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
              'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                  'name' => 'Aeonium',
                ],
                'unit_amount' => 2000,
              ],
              'quantity' => 1,
            ],
            [
                'price_data' => [
                  'currency' => 'eur',
                  'product_data' => [
                    'name' => 'Cactus',
                  ],
                  'unit_amount' => 3000,
                ],
                'quantity' => 2,
              ]],
            'mode' => 'payment',
            'success_url' => 'http://127.0.0.1:8000/',
            'cancel_url' => 'http://127.0.0.1:8000/checkout_error'
          ]);
    
    return redirect($session->url, 303);
    }

}
