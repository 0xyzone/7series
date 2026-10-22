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

if (app()->environment('local')) {
    Route::get('/_dev/reload-check', function () {
        $dirs = [
            app_path('Filament'),
            app_path('Models'),
            app_path('Http'),
            app_path('Providers'),
            app_path('Services'),
            resource_path('views'),
            resource_path('css'),
            resource_path('js'),
            public_path('css'),
            public_path('js'),
            base_path('routes'),
        ];
        $latest = 0;
        foreach ($dirs as $dir) {
            if (!is_dir($dir)) continue;
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS)
            );
            foreach ($iterator as $file) {
                if ($file->isFile()) {
                    $mtime = $file->getMTime();
                    if ($mtime > $latest) {
                        $latest = $mtime;
                    }
                }
            }
        }
        return response()->json(['timestamp' => $latest])
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
    });
}

