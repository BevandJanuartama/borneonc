<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/instance', function () {
    return view('user.instance');
})->middleware(['auth', 'verified'])->name('user.instance');

// Remote Access
Route::get('/remote', function () {
    return view('user.remote');
})->middleware(['auth'])->name('user.remote');

// Billing & Invoice
Route::get('/invoice', function () {
    return view('user.invoice');
})->middleware(['auth'])->name('user.invoice');

// Account Settings
Route::get('/account', function () {
    return view('user.account');
})->middleware(['auth'])->name('user.account');

// Halaman "Tambah Instance"
Route::get('/order', function () {
    return view('user.order');
})->middleware(['auth'])->name('user.order');

// Atur Agar admin masuk db admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        if (Auth::user()->level !== 'admin') {
            abort(403);
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');
});



// Grup route untuk user yang sudah login
Route::middleware('auth')->group(function () {

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Auth bawaan Laravel Breeze/Fortify
require __DIR__.'/auth.php';


