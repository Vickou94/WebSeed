<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\MainController;

Route::get('/', [MainController::class, 'index']);

Route::get('/produit', [MainController::class, 'product']);
