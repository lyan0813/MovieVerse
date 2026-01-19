<?php

use Illuminate\Support\Facades\Route;

// =====================
// USER CONTROLLERS
// =====================
use App\Http\Controllers\user\HomeController as UserHome;
use App\Http\Controllers\user\FilmController as UserFilm;
use App\Http\Controllers\user\ActorController as UserActorController;
use App\Http\Controllers\user\CommentController;
use App\Http\Controllers\ProfileController;

// =====================
// ADMIN CONTROLLERS
// =====================
use App\Http\Controllers\admin\DashboardController as AdminDashboard;
use App\Http\Controllers\admin\FilmController as AdminFilm;
use App\Http\Controllers\admin\ActorController;
use App\Http\Controllers\admin\GenreController;
use App\Http\Controllers\admin\CountryController;


/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/
Route::name('user.')->group(function () {

    Route::get('/', [UserHome::class, 'index'])->name('home');

    Route::prefix('films')->name('films.')->group(function () {
        Route::get('/', [UserFilm::class, 'index'])->name('index');
        Route::get('/{film}', [UserFilm::class, 'show'])->name('show');
    });

    Route::prefix('actors')->name('actors.')->group(function () {
        Route::get('/', [UserActorController::class, 'index'])->name('index');
        Route::get('/{actor}', [UserActorController::class, 'show'])->name('show');
    });

});


/*
|--------------------------------------------------------------------------
| COMMENTS (USER LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/comments/{comment}/like', [CommentController::class, 'toggleLike'])->name('comments.like');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA (ADMIN ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');

        Route::resource('films', AdminFilm::class);
        Route::resource('actors', ActorController::class);
        Route::resource('genres', GenreController::class);
        Route::resource('countries', CountryController::class);
        Route::delete('/comments/{comment}', [App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('comments.destroy');
});


/*
|--------------------------------------------------------------------------
| AUTH ROUTES (BREEZE)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';