<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT 20%',
            'type' => 'tax',
            'target' => 'total',
            'value' => '20%'
        ));

        \Cart::condition($condition);

        $cartHtTotal = \Cart::getSubTotal();
        $cartTotal = \Cart::getTotal();
        $tva = $cartTotal - $cartHtTotal;

        return view('shop.cart', compact('cartItems', 'cartTotal', 'cartHtTotal', 'tva'));
    }


    public function addToCart(Request $request)
    {
        $product = Products::find($request->id);
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'price_ttc' => $product->priceTtc(),
            )
        ]);

        session()->flash('success', 'Votre article a bien été ajouté au panier !');
        return redirect()->route('homepage');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        return redirect()->route('cart.list');
    }

}
