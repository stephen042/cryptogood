<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
   Route::get('/admin/dashboard', [Admin::class, 'dashboard'])->name('admin.dashboard');
   Route::get('/admin/admin-wallets', [Admin::class, 'adminWallets'])->name('admin.admin-wallets');
   Route::get('/admin/profile', [Admin::class, 'profile'])->name('admin.profile');

   Route::get('/admin/users-edit/{id}', [Admin::class, 'editUser'])->name('admin.edit-user');

   Route::post('/logout', [Admin::class, 'logout'])->name('admin.logout');
});