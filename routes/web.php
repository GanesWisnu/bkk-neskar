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

use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('user.home');

Route::get('/lowongan/{id}', [HomeController::class, 'showJobApplication'])->name('user.lowongan.show');

Route::get('lowongan', [HomeController::class, 'showAllJobApplications'])->name('user.lowongan');

Route::get('pengumuman', [HomeController::class, 'showAllAcceptances'])->name('user.pengumuman');

Route::get('acceptance/{id}/download', [HomeController::class, 'downloadAcceptance'])->name('user.acceptance.download');

// Route::get('lowongan/{id}', function () {
//     return view('pages/lowongan');
// })->name('lowongan');


// For admin user only
// Route::group(['middleware' => 'auth'], function() {
    Route::get('admin', function () {
        return view('pages/admin');
    })->name('admin');
    Route::group(['prefix'=> 'admin'], function (){
        Route::get('/login', [UserController::class, 'index_login'])->name('admin.login');
        Route::post('/login', [UserController::class, 'login'])->name('admin.login.post');
        Route::post('/logout', [UserController::class, 'logout'])->name('admin.logout');

        Route::resource('user', UserController::class)->except(['index_login', 'login','update', 'destroy'])->name('index', 'admin.user-config')->middleware('auth');

        Route::resource('perusahaan', CompanyController::class)->except(['destroy', 'update'])->name('index', 'admin.perusahaan')->name('store', 'admin.perushaan.store');
        Route::resource('article', ArticleController::class)->except(['destroy', 'update'])->parameters(['article' => 'slug'])->name('index', 'admin.article')->name('store', 'admin.article.store');
        Route::resource('kriteria', CriteriaController::class)->except(['destroy', 'update'])->name('index', 'admin.kriteria')->name('store', 'admin.kriteria.store');
        Route::resource('lowongan', JobVacanciesController::class)->except(['destroy_criteria_job_vacancies', 'destroy', 'update'])->name('index', 'admin.lowongan')->name('store', 'admin.lowongan.store');
        Route::resource('pelamar', ApplicantsVacanciesController::class)->except(['destroy', 'update'])->name('index', 'admin.pelamar')->name('store', 'admin.pelamar.store');
        Route::resource('pengumuman', AcceptanceController::class)->only(['index','create', 'store'])->name('index', 'admin.pengumuman')->name('store', 'admin.pengumuman.store');

        Route::get('applicants/download', [ApplicantsVacanciesController::class, 'export_data'])->name('admin.pelamar.export');
        Route::get('acceptance/{id}/download', [AcceptanceController::class, 'download'])->name('admin.acceptance.download');
        Route::get('lowongan/{id}/delete/{criteria_id}', [JobVacanciesController::class, 'destroy_criteria_job_vacancies'])->name('admin.job_vacancies.delete.criteria');
    });
// });



Route::get('login', [UserController::class, 'index_login'])->name('login');
Route::post('login', [UserController::class, 'login'])->name('login.post');
// Route::get('pengumuman/{id}', function () {
//     return view('pages/pengumuman');
// })->name('pengumuman');


// Admin Page

// Route::get('/', function () {
//     return redirect('/admin');
// })->name('admin_redirect');

Route::get('admin', [AdminController::class, 'index'])->name('admin');

// Route::get('admin/user-config', [UserController::class, 'index'])->name('admin.user-config');

// Route::get('admin/perusahaan', [AdminController::class, 'perusahaan'])->name('admin.perusahaan');

// Route::get('admin/lowongan', [AdminController::class, 'lowongan'])->name('admin.lowongan');

// Route::get('admin/kriteria', [AdminController::class, 'kriteria'])->name('admin.kriteria');

// Route::get('admin/pelamar', [AdminController::class, 'pelamar'])->name('admin.pelamar');

// Route::get('admin/pengumuman', [PengumumanController::class, 'pengumuman'])->name('admin.pengumuman');
Route::get('admin/pengumuman/export', [PengumumanController::class, 'pengumumanExport'])->name('admin.pengumuman-export');
// Route::post('admin/pengumuman', [PengumumanController::class, 'createPengumuman'])->name('admin.pengumuman-add');

// Route::get('admin/informasi', [InformasiController::class, 'getInformasi'])->name('admin.informasi');
