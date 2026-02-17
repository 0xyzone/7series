<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', function () {
    $products = \App\Models\Product::where('is_active', true)->get();
    return view('shop', compact('products'));
});
