<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/b2b', [\App\Http\Controllers\WholesaleController::class, 'b2b'])->name('b2b');
Route::get('/wholesale', [\App\Http\Controllers\WholesaleController::class, 'b2b'])->name('wholesale');
Route::get('/catalog', [\App\Http\Controllers\WholesaleController::class, 'b2b'])->name('catalog');
Route::get('/shop', function () {
    return redirect()->route('b2b');
});

Route::post('/wholesale/inquire', [\App\Http\Controllers\WholesaleController::class, 'submitInquiry'])->name('wholesale.inquire');

Route::post('/newsletter/subscribe', [\App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{email}', [\App\Http\Controllers\NewsletterController::class, 'unsubscribe'])
    ->name('newsletter.unsubscribe')
    ->middleware('signed');
