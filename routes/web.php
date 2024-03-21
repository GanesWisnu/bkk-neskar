<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\InformasiController;

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

Route::get('admin/user-config', [AdminController::class, 'userConfig'])->name('admin.user-config');

Route::get('admin/perusahaan', [AdminController::class, 'perusahaan'])->name('admin.perusahaan');

Route::get('admin/lowongan', [AdminController::class, 'lowongan'])->name('admin.lowongan');

Route::get('admin/kriteria', [AdminController::class, 'kriteria'])->name('admin.kriteria');

Route::get('admin/pelamar', [AdminController::class, 'pelamar'])->name('admin.pelamar');

Route::get('admin/pengumuman', [PengumumanController::class, 'pengumuman'])->name('admin.pengumuman');
Route::get('admin/pengumuman/export', [PengumumanController::class, 'pengumumanExport'])->name('admin.pengumuman-export');
Route::post('admin/pengumuman', [PengumumanController::class, 'createPengumuman'])->name('admin.pengumuman-add');

Route::get('admin/informasi', [InformasiController::class, 'getInformasi'])->name('admin.informasi');