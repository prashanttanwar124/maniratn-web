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

// --- SEO SITEMAP & ROBOTS ---
Route::get('/sitemap.xml', function () {
    $path = public_path('sitemap.xml');
    return file_exists($path)
        ? response(file_get_contents($path), 200, ['Content-Type' => 'application/xml'])
        : abort(404);
})->name('sitemap');

Route::get('/robots.txt', function () {
    $path = public_path('robots.txt');
    return file_exists($path)
        ? response(file_get_contents($path), 200, ['Content-Type' => 'text/plain'])
        : abort(404);
})->name('robots');

// --- CUSTOMER DIGITAL VAULT & VIP ONBOARDING ---
Route::get('/vault/{token}', [CustomerVaultController::class, 'show'])->name('vault.show');
Route::get('/vault/{token}/invoices/{invoice}/print', [CustomerVaultController::class, 'printInvoice'])->name('vault.invoice.print');
Route::get('/join', [\App\Http\Controllers\CustomerOnboardingController::class, 'show'])->name('join');
Route::post('/join', [\App\Http\Controllers\CustomerOnboardingController::class, 'submit'])->name('join.submit');
Route::get('/register-vip', [\App\Http\Controllers\CustomerOnboardingController::class, 'show']);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
