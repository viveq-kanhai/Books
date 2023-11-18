<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Redirect::route('home');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dash', function () {
    return view('dash');
})->name('dash');

Route::resource('/users', UserController::class);

Route::get('/books', function () {
    return view('/models/books/index');
})->name('books.index');

Route::get('/subjects', function () {
    return view('/models/subjects/index');
})->name('subjects.index');

Route::get('/home', [PublicController::class, 'home'])->name('home');
Route::get('/library', [PublicController::class, 'library'])->name('library');
