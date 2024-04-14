<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\AuthGuardMiddleware;
use App\Http\Middleware\LoginGuardMiddleware;
use App\Providers\Services\AuthService;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['user' => AuthService::getCurrentUser()]);
})->name('home')->middleware(AuthGuardMiddleware::class);

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware(LoginGuardMiddleware::class);


Route::get('/authors', [AuthorController::class, 'index'])->name('authors')->middleware(AuthGuardMiddleware::class);
Route::get('/authors/{id}', [AuthorController::class, 'show'])->name('authors.show')->middleware(AuthGuardMiddleware::class);
Route::delete('/authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy')->middleware(AuthGuardMiddleware::class);

Route::get('/books/create', [BookController::class, 'create'])->name('books.create')->middleware(AuthGuardMiddleware::class);
Route::post('/books', [BookController::class, 'store'])->name('books.store')->middleware(AuthGuardMiddleware::class);
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy')->middleware(AuthGuardMiddleware::class);

Route::post('/login', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
