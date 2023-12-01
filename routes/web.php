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
    return redirect('/login');
});

Route::get('/login', function () {
    return view('auth/login')->name('login');
});

Route::get('/aaa', function () {
    return view('AAA');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/books', BookController::class);
    Route::resource('/subjects', SubjectController::class);
    // Route::resource('/bookUsers', BookUserController::class)->except('store');
    Route::post('/bookUsers/{user}', [BookUserController::class, 'store'])->name('bookUsers.store');
    Route::delete('/bookUsers/{user}/{book}', [BookUserController::class, 'destroy'])->name('bookUsers.destroy');
});

Route::middleware(['auth', 'role:user|admin'])->group(function () {
    Route::get('/library', [PublicController::class, 'library'])->name('library');
    Route::get('/allBooks', [PublicController::class, 'allBooks'])->name('allBooks');
    Route::get('/home', [PublicController::class, 'home'])->name('home');
    // Route::get('/password/reset', function(){return view('auth/reset')->name('pwReset');});


});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
