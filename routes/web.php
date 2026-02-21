<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::redirect('/uslugi', '/services', 301);
Route::get('/uslugi/{slug}', fn (string $slug) => redirect('/services/'.$slug, 301));
Route::redirect('/o-kompanii', '/about', 301);
Route::redirect('/dlya-biznesa', '/for-business', 301);
Route::redirect('/kontakty', '/contacts', 301);
Route::redirect('/politika-konfidencialnosti', '/privacy', 301);
Route::redirect('/usloviya-ispolzovaniya', '/terms', 301);
Route::redirect('/obrabotka-personalnyh-dannyh', '/personal-data', 301);

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/for-business', [PageController::class, 'forBusiness'])->name('for_business');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/personal-data', [PageController::class, 'personalData'])->name('personal_data');
Route::get('/documents/content/{type}', [PageController::class, 'documentContent'])->name('documents.content')->where('type', 'privacy|terms|personal_data');

Route::post('/order', [LeadController::class, 'store'])->name('leads.store');

// Раздача загрузок: сначала public, если нет — local (куда мог сохранить Filament)
Route::get('/storage/{path}', function (string $path) {
    $path = str_replace('\\', '/', trim($path, '/'));
    foreach (['public', 'local'] as $diskName) {
        $disk = Storage::disk($diskName);
        if ($disk->exists($path)) {
            return response()->file($disk->path($path));
        }
    }
    abort(404);
})->where('path', '.*')->name('storage.serve');
