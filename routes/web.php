<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});



require __DIR__ . '/auth.php';
require __DIR__ . '/app.php';
require __DIR__ . '/admin.php';