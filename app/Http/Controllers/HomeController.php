<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobVacancies;
use App\Models\Article;
use App\Models\AcceptanceVacancies;
use App\Models\Company;

class HomeController extends Controller
{
    function index()
    {
        $job_vacancies = JobVacancies::where('deadline', '>', date('Y-m-d'))->get();
        $articles = Article::All();
        $companies = Company::All();
        return view('pages.user.home', ['job_vacancies' => $job_vacancies, 'articles' => $articles, 'companies' => $companies]);
    }

    function showAllJobApplications() {
        $job_vacancies = JobVacancies::where('deadline', '>', date('Y-m-d'))->get();
        return view('pages.user.lowongan', ['job_vacancies' => $job_vacancies]);
    }

    function showJobApplication($id)
    {
        $job_vacancy = JobVacancies::find($id);
        $other_job_vacancies = JobVacancies::where('deadline', '>', date('Y-m-d'))->where('id', '!=', $id)->get();
        return view('pages.user.detail_lowongan', ['job_vacancy' => $job_vacancy, 'other_job_vacancies' => $other_job_vacancies]);
    }

    function showAllAcceptances() {
        $acceptances = AcceptanceVacancies::all();
        return view('pages.user.pengumuman', ['acceptances' => $acceptances]);
    }
}
