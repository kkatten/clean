<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/uslugi', [ServiceController::class, 'index'])->name('services.index');
Route::get('/uslugi/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Route::get('/o-kompanii', [PageController::class, 'about'])->name('about');
Route::get('/dlya-biznesa', [PageController::class, 'forBusiness'])->name('for_business');
Route::get('/kontakty', [PageController::class, 'contacts'])->name('contacts');

Route::post('/zayavka', [LeadController::class, 'store'])->name('leads.store');
