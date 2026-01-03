<?php

use Illuminate\Support\Facades\Route;

// Public controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\HomeController;

// Admin controllers
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqItemController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ContactMessageController;

//public routes
Route::get('/', [HomeController::class, 'index'])->name('home');


// Public news
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// Public FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Public contact
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Public user profile
Route::get('/users/{user}', [UserProfileController::class, 'show'])->name('users.show');

/*
|--------------------------------------------------------------------------
| Authenticated user routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Own profile (edit page)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin routes

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        // Admin dashboard
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Admin news (IMPORTANT: use AdminNewsController)
        Route::resource('news', AdminNewsController::class)->except(['show']);

        // FAQ management
        Route::resource('faq-categories', FaqCategoryController::class);
        Route::resource('faq-items', FaqItemController::class);

        // User management
        Route::resource('users', UserController::class)->only(['index', 'create', 'store']);
        Route::patch('users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])
            ->name('users.toggleAdmin');
        Route::delete('users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');

        // Teams management
        Route::resource('teams', TeamController::class);

        


        // Contact messages management
        Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::post('contact-messages/{contactMessage}/reply', [ContactMessageController::class, 'reply'])->name('contact-messages.reply');
    });

require __DIR__ . '/auth.php';
