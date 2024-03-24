<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\JobVacanciesController;
use App\Http\Controllers\ApplicantsVacanciesController;
use App\Http\Controllers\AcceptanceController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('admin/user', UserController::class)->only(['update', 'destroy'])->name('update','api.admin.user.update')->name('destroy', 'api.admin.user.destroy');

Route::apiResource('admin/company', CompanyController::class)->only(['update', 'destroy'])->name('update','api.admin.perusahaan.update')->name('destroy', 'api.admin.perusahaan.delete');

Route::apiResource('admin/criteria', CriteriaController::class)->only(['update', 'destroy'])->name('update','api.admin.criteria.update')->name('destroy', 'api.admin.criteria.delete');

Route::resource('admin/job_vacancies', JobVacanciesController::class)->only(['update', 'destroy'])->name('update','api.admin.job_vacancies.update')->name('destroy', 'api.admin.job_vacancies.delete');

Route::apiResource('admin/applicants', ApplicantsVacanciesController::class)->only(['update', 'delete'])->name('update','api.admin.applicants.update')->name('delete', 'api.admin.applicants.delete');

// Route::apiResource('acceptance', AcceptanceController::class)->only(['create', 'store']);
Route::get('admin/applicants/job_vacancies/{job_vacancies_id}/export', [ApplicantsVacanciesController::class, 'export_data'])->name('api.admin.applicants.export');
