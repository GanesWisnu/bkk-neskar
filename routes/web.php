<?php

use Illuminate\Support\Facades\Route;

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