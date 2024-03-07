<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('pages/home');
})->name('home');

Route::get('lowongan', function () {
    return view('pages/lowongan');
})->name('lowongan');

Route::get('pengumuman', function () {
    return view('pages/pengumuman');
})->name('pengumuman');

// For admin user only
Route::group(['middleware' => 'auth'], function() {
    Route::get('admin', function () {
        return view('pages/admin');
    })->name('admin');
});

Route::get('login', [UserController::class, 'index'])->name('login');
