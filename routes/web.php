<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');



require __DIR__ . '/auth.php';
require __DIR__ . '/app.php';
require __DIR__ . '/admin.php';