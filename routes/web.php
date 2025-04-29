<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('web')->group(function () {
    require __DIR__.'/auth.php';

    Route::view('dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    // Voeg expliciet de register route toe voor Livewire
    Volt::route('/register', 'auth.register')
        ->middleware('guest')
        ->name('register');
});


require __DIR__.'/auth.php';
