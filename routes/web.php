<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;

use App\Http\Controllers\FaqController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqItemController;

use App\Http\Controllers\ContactController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('news', NewsController::class)->except(['show']);
});

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('faq-categories', FaqCategoryController::class);
    Route::resource('faq-items', FaqItemController::class);
});
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::middleware(['auth', 'admin'])->get('/admin', function () {
    return 'Admin OK';
})->name('admin.dashboard');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


require __DIR__.'/auth.php';
