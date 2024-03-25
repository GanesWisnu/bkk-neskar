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

Route::apiResource('admin/perushaan', CompanyController::class)->only(['update', 'destroy'])->name('update','api.admin.perusahaan.update')->name('destroy', 'api.admin.perusahaan.delete');
Route::get('admin/perusahaan/export', [CompanyController::class, 'export'])->name("api.admin.perusahaan.export");

Route::apiResource('admin/criteria', CriteriaController::class)->only(['update', 'destroy'])->name('update','api.admin.criteria.update')->name('destroy', 'api.admin.criteria.delete');

Route::apiResource('lowongan', JobVacanciesController::class)->only(['update', 'destroy'])->name('update','api.admin.lowongan.update')->name('destroy', 'api.admin.lowongan.delete');
Route::get("admin/lowongan/{file}", [JobVacanciesController::class, 'export'])->name('api.admin.lowongan.export');

Route::apiResource('admin/applicants', ApplicantsVacanciesController::class)->only(['update', 'destory'])->name('update','api.admin.applicants.update')->name('delete', 'api.admin.applicants.delete');

Route::apiResource('admin/pengumuman', AcceptanceController::class)->only(['update', 'destroy', 'store'])->name('update', 'api.admin.pengumuman.update')->name('destroy', 'api.admin.pengumuman.delete');
Route::get('admin/pengumunan/export/{file}', [AcceptanceController::class,'export'])->name('api.admin.pengumuman.export');
Route::get('admin/applicants/job_vacancies/{job_vacancies_id}/export', [ApplicantsVacanciesController::class, 'export_data'])->name('api.admin.applicants.export');
