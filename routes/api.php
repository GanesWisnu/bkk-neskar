<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\JobVacanciesController;

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

// Route::apiResource('admin/company', CompanyController::class);
// Route::apiResource('admin/criteria', CriteriaController::class);
// Route::resource('admin/job_vacancies', JobVacanciesController::class)->except(['destroy_criteria_job_vacancies']);
