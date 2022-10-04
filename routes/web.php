<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\MainController;

Route::get('/', [MainController::class, 'index'])->name('homepage');
Route::get('/produit/{id}', [MainController::class, 'product'])->name('see_product');
Route::get('/panier', [MainController::class, 'cart'])->name('cart');
