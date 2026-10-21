<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $retailStores = \App\Models\RetailStore::active()->get();
    return view('welcome', compact('retailStores'));
})->name('home');

Route::get('/b2b', [\App\Http\Controllers\WholesaleController::class, 'b2b'])->name('b2b');
Route::get('/wholesale', [\App\Http\Controllers\WholesaleController::class, 'b2b'])->name('wholesale');
Route::get('/catalog', [\App\Http\Controllers\WholesaleController::class, 'b2b'])->name('catalog');
Route::get('/shop', function () {
    return redirect()->route('b2b');
});

Route::get('/stores', function () {
    $retailStores = \App\Models\RetailStore::active()->get();
    $company = \App\Models\CompanySetting::getSettings();
    return view('stores', compact('retailStores', 'company'));
})->name('stores');

Route::get('/store-locator', function () {
    return redirect()->route('stores');
});

Route::get('/contact', function () {
    $company = \App\Models\CompanySetting::getSettings();
    return view('contact', compact('company'));
})->name('contact');

Route::post('/contact', [\App\Http\Controllers\WholesaleController::class, 'submitContact'])->name('contact.submit');

Route::get('/brandkit', [\App\Http\Controllers\BrandKitController::class, 'index'])->name('brandkit');
Route::get('/brand-kit', function () {
    return redirect()->route('brandkit');
});
Route::get('/brandkit/download', [\App\Http\Controllers\BrandKitController::class, 'downloadZip'])->name('brandkit.download');
Route::get('/brand-guidelines', function () {
    return redirect()->route('brandkit');
});


Route::post('/wholesale/inquire', [\App\Http\Controllers\WholesaleController::class, 'submitInquiry'])->name('wholesale.inquire');

Route::post('/newsletter/subscribe', [\App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{email}', [\App\Http\Controllers\NewsletterController::class, 'unsubscribe'])
    ->name('newsletter.unsubscribe')
    ->middleware('signed');

