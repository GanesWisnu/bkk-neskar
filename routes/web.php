<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

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

// User Page

Route::get('/', function () {
    return view('pages/home');
})->name('home');

Route::get('lowongan', function () {
    return view('pages/lowongan');
})->name('lowongan');

// Route::get('lowongan/{id}', function () {
//     return view('pages/lowongan');
// })->name('lowongan');

Route::get('pengumuman', function () {
    return view('pages/pengumuman');
})->name('pengumuman');

// Route::get('pengumuman/{id}', function () {
//     return view('pages/pengumuman');
// })->name('pengumuman');


// Admin Page

Route::get('/', function () {
    return redirect('/admin');
})->name('admin_redirect');

Route::get('admin', [AdminController::class, 'index'])->name('admin');

Route::get('admin/user-config', [AdminController::class, 'userConfig'])->name('user-config');

Route::get('admin/perusahaan', [AdminController::class, 'perusahaan'])->name('perusahaan');