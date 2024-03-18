<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobVacanciesController;

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
    Route::group('/admin', function (){
        Route::resource('user', UserController::class)->except(['index_login', 'login']);
        Route::resource('company', CompanyController::class);
        Route::resource('article', ArticleController::class);
        Route::resource('criteria', CriteriaController::class);
        Route::resource('job_vacancies', JobVacanciesController::class)->except(['destroy_criteria_job_vacancies']);
        Route::get('job_vacancies/{id}/delete/{criteria_id}', [JobVacanciesController::class, 'destroy_criteria_job_vacancies'])->name('admin.job_vacancies.delete.criteria');
    });
});



Route::get('login', [UserController::class, 'index_login'])->name('login');
Route::post('login', [UserController::class, 'login'])->name('login.post');
