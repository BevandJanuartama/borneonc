<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketController;
use App\Http\Middleware\CheckLevel;
use App\Models\Paket;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileVoucherController;
use App\Http\Controllers\ResellerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function () {
    $pakets = Paket::all();
    return view('welcome', compact('pakets'));
});

// ===================== ROUTE UNTUK USER ===================== //
Route::middleware(['auth', '\App\Http\Middleware\CheckLevel:user'])->group(function () {
    // Dashboard
    Route::get('/instance', function () {
        return view('user.instance');
    })->middleware(['verified'])->name('user.instance');

    // Remote Access
    Route::get('/remote', function () {
        return view('user.remote');
    })->name('user.remote');

    // Billing & Invoice
    Route::get('/invoice', function () {
        return view('user.invoice');
    })->name('user.invoice');

    // Account Settings
    Route::get('/account', function () {
        return view('user.account');
    })->name('user.account');

    // Tambah Instance (Order Page dengan data dinamis dari database)
    Route::get('/order', [PaketController::class, 'showForUser'])->name('user.order');

    Route::get('/subs', [SubscriptionController::class, 'create'])->name('subscription.create');
    Route::post('/subs', [SubscriptionController::class, 'store'])->name('subscription.store');


    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ===================== ROUTE UNTUK ADMIN ===================== //
Route::middleware(['auth', CheckLevel::class . ':admin'])->group(function () {
    // Dashboard Admin
    Route::get('/admin/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');

    // ===== CRUD PAKET =====
    Route::get('/admin/paket/index', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/admin/paket/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('/admin/paket/store', [PaketController::class, 'store'])->name('paket.store');
    Route::get('/admin/paket/{id}/edit', [PaketController::class, 'edit'])->name('paket.edit');
    Route::put('/admin/paket/{id}', [PaketController::class, 'update'])->name('paket.update');
    Route::delete('/admin/paket/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');
});

    Route::get('/reseller', [ResellerController::class, 'index'])->name('resellers.index');
    Route::get('/reseller/create', [ResellerController::class, 'create'])->name('resellers.create');
    Route::post('/reseller/store', [ResellerController::class, 'store'])->name('resellers.store');
    Route::get('/reseller/{id}/edit', [ResellerController::class, 'edit'])->name('resellers.edit');
    Route::put('/reseller/{id}', [ResellerController::class, 'update'])->name('resellers.update');
    Route::delete('/reseller/{id}', [ResellerController::class, 'destroy'])->name('resellers.delete');


    Route::get('/voucher', [ProfileVoucherController::class, 'index'])->name('voucher.index');
    Route::get('/voucher/create', [ProfileVoucherController::class, 'create'])->name('voucher.create');
    Route::post('/voucher/store', [ProfileVoucherController::class, 'store'])->name('voucher.store');
    Route::get('/voucher/{id}/edit', [ProfileVoucherController::class, 'edit'])->name('voucher.edit');
    Route::put('/voucher/{id}', [ProfileVoucherController::class, 'update'])->name('voucher.update');
    Route::delete('/voucher/{id}', [ProfileVoucherController::class, 'destroy'])->name('voucher.delete');



Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');




// Route Auth (Laravel Breeze)
require __DIR__.'/auth.php';
