<?php

use App\Http\Controllers\CustomerVaultController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::inertia('/contact', 'Contact')->name('contact');
Route::inertia('/collections', 'Collections')->name('collections');
Route::inertia('/about', 'About')->name('about');

// --- CUSTOMER DIGITAL VAULT ---
Route::get('/vault/{token}', [CustomerVaultController::class, 'show'])->name('vault.show');
Route::get('/vault/{token}/invoices/{invoice}/print', [CustomerVaultController::class, 'printInvoice'])->name('vault.invoice.print');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
