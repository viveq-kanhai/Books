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
    return redirect('/login');
});

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/home', [PublicController::class, 'home'])->name('home');
Route::get('/library', [PublicController::class, 'library'])->name('library');

//admin pages---------------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');


Route::resource('/users', UserController::class);
Route::resource('/books', UserController::class);
Route::resource('/subjects', UserController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
