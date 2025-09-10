<?php

use App\Http\Controllers\App;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App::class, 'dashboard'])->name('app.dashboard');
    Route::get('/buy', [App::class, 'buy'])->name('app.buy');
    Route::get('/send', [App::class, 'send'])->name('app.send');
    Route::get('/swap', [App::class, 'swap'])->name('app.swap');
    Route::get('/trade', [App::class, 'trade'])->name('app.trade');
    Route::get('/wallet', [App::class, 'wallet'])->name('app.wallet');
    Route::get('/track', [App::class, 'track'])->name('app.track');
});
