<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobVacancies;
use App\Models\Article;
use App\Models\AcceptanceVacancies;

class HomeController extends Controller
{
    function index()
    {
        $job_vacancies = JobVacancies::where('deadline', '>', date('Y-m-d'))->get();
        $articles = Article::All();
        // dd($job_vacancies);
        return view('pages.user.home', ['job_vacancies' => $job_vacancies, 'articles' => $articles]);
        // return $job_vacancies;
    }

    function showAllJobApplications() {
        $job_vacancies = JobVacancies::where('deadline', '>', date('Y-m-d'))->get();
        return view('pages.user.lowongan', ['job_vacancies' => $job_vacancies]);
    }

    function showJobApplication($id)
    {
        $job_vacancy = JobVacancies::find($id);
        return view('pages.user.detail_lowongan', ['job_vacancy' => $job_vacancy]);
    }

    function showAllAcceptances() {
        $acceptances = AcceptanceVacancies::all();
        return view('pages.user.pengumuman', ['acceptances' => $acceptances]);
    }
}
