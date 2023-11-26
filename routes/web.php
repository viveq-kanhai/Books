<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SubjectController;

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
    return redirect('/dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/aaa', function () {
    return view('AAA');
});

Route::get('/home', [PublicController::class, 'home'])->name('home');
Route::get('/library', [PublicController::class, 'library'])->name('library');

//admin pages---------------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');


Route::resource('/users', UserController::class);
Route::resource('/books', BookController::class);
Route::resource('/subjects', SubjectController::class);
// Route::resource('/bookUsers', BookUserController::class)->except('store');
Route::post('/bookUsers/{user}', [BookUserController::class, 'store'])->name('bookUsers.store');
Route::delete('/bookUsers/{user}/{book}', [BookUserController::class, 'destroy'])->name('bookUsers.destroy');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
