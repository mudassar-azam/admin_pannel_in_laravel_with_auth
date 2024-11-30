<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticated;


Auth::routes();
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(Authenticated::class)->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');
});


