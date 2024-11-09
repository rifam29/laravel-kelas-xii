<?php

use App\Http\Controllers\{
    FilmController,
    RegisterController,
    AuthController,
    UserController,
};

Route::get('/', [FilmController::class, 'movieHome'])->name('home');
Route::get('/movies', [FilmController::class, 'movies'])->name('movies');
Route::get('/movies/{film}', [FilmController::class, 'show'])->name('movies.show');
Route::get('/movies/genre/{genre}', [FilmController::class, 'moviesByGenre'])->name('genre');

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});

Route::resource('users', UserController::class)->middleware('can:manage_users');

Route::controller(AuthController::class)->group(function () {
    Route::post('authenticate', 'authenticate')->name('login.authenticate');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::get('/register_admin', function () {
    return view('admin.register');
});