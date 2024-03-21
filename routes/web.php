<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobVacanciesController;
use App\Http\Controllers\ApplicantsVacanciesController;
use App\Http\Controllers\AcceptanceController;

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

// For admin user only
// Route::group(['middleware' => 'auth'], function() {
    Route::get('admin', function () {
        return view('pages/admin');
    })->name('admin');
    Route::group(['prefix'=> 'admin'], function (){
        Route::resource('user', UserController::class)->except(['index_login', 'login']);
        Route::resource('perusahaan', CompanyController::class)->name('index', 'admin.perusahaan');
        Route::resource('article', ArticleController::class)->parameters(['article' => 'slug']);
        Route::resource('criteria', CriteriaController::class);
        Route::resource('job_vacancies', JobVacanciesController::class)->except(['destroy_criteria_job_vacancies']);
        Route::resource('applicants', ApplicantsVacanciesController::class);
        Route::resource('acceptance', AcceptanceController::class)->only(['create', 'store']);

        Route::get('acceptance/{id}/download', [AcceptanceController::class, 'download'])->name('admin.acceptance.download');
        Route::get('job_vacancies/{id}/delete/{criteria_id}', [JobVacanciesController::class, 'destroy_criteria_job_vacancies'])->name('admin.job_vacancies.delete.criteria');
    });
// });



Route::get('login', [UserController::class, 'index_login'])->name('login');
Route::post('login', [UserController::class, 'login'])->name('login.post');
// Route::get('pengumuman/{id}', function () {
//     return view('pages/pengumuman');
// })->name('pengumuman');


// Admin Page

Route::get('/', function () {
    return redirect('/admin');
})->name('admin_redirect');

Route::get('admin', [AdminController::class, 'index'])->name('admin');

Route::get('admin/user-config', [AdminController::class, 'userConfig'])->name('admin.user-config');

// Route::get('admin/perusahaan', [AdminController::class, 'perusahaan'])->name('admin.perusahaan');

Route::get('admin/lowongan', [AdminController::class, 'lowongan'])->name('admin.lowongan');

Route::get('admin/kriteria', [AdminController::class, 'kriteria'])->name('admin.kriteria');

Route::get('admin/pelamar', [AdminController::class, 'pelamar'])->name('admin.pelamar');

Route::get('admin/pengumuman', [PengumumanController::class, 'pengumuman'])->name('admin.pengumuman');
Route::get('admin/pengumuman/export', [PengumumanController::class, 'pengumumanExport'])->name('admin.pengumuman-export');
Route::post('admin/pengumuman', [PengumumanController::class, 'createPengumuman'])->name('admin.pengumuman-add');

Route::get('admin/informasi', [InformasiController::class, 'getInformasi'])->name('admin.informasi');
