<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Shop\MainController;
use App\Http\Controllers\TestMailController;

Route::get('/', [MainController::class, 'index'])->name('homepage');
Route::get('/produit/{id}', [MainController::class, 'product'])->name('see_product');
Route::get('/panier', [CartController::class, 'cartList'])->name('cart.list');
Route::get('/commandes', [OrderController::class, 'index'])->name('order.order');
Route::post('/add', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('/payement', [CheckoutController::class, 'payement'])->name('payement');
Route::get('/checkout_success/{token}', [MainController::class, 'success'])->name('success');
Route::get('/checkout_error', [MainController::class, 'error'])->name('error');
Route::get('payement-success', [CheckoutController::class, 'payement'])->name('payement_success');
Route::get('send-email', [TestMailController::class, 'testmail'])->name('test_mail');