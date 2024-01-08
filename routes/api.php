<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Route::get('/api/download-pdf', function () {
//     $filePath = storage_path('app/public/books/book.pdf');

//     return response()->file($filePath, [
//         'Content-Type' => 'application/pdf',
//         'Content-Disposition' => 'inline; filename="book.pdf"',
//     ]);
// });

// Route::get('success', function () {
//     return response()->json(['success' => true, 'message' => 'API request successful']);
// });

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');

