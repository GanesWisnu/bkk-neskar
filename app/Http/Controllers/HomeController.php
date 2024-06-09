<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobVacancies;
use App\Models\Article;
use App\Models\AcceptanceVacancies;
use App\Models\Company;
use Illuminate\Support\Facades\Response;
use App\Models\ApplicantsVacancies;

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
        $job_vacancy = JobVacancies::where("job_vacancies_id", $id)->first();
        $other_job_vacancies = JobVacancies::where('deadline', '>', date('Y-m-d'))->where('job_vacancies_id', '!=', $id)->get();
        return view('pages.user.detail_lowongan', ['job_vacancy' => $job_vacancy, 'other_job_vacancies' => $other_job_vacancies]);
    }

    function storeJobApplication(Request $request)
    {
        $applicant = ApplicantsVacancies::create([
            'job_vacancies_id' => $request->get('job_vacancies_id'),
            'data' => json_encode($request->except(['_token', '_method', 'job_vacancies_id']))
        ]);

        session()->flash('success', 'Pendaftaran Berhasil !');

        return redirect()->route('user.lowongan.show', ['id' => $request->get('job_vacancies_id')]);
    }

    function showArticle($id)
    {
        $article = Article::find($id);
        $other_articles = Article::where('article_id', '!=', $id)->get();
        return view('pages.user.informasi', ['article' => $article, 'other_articles' => $other_articles]);
    }

    function showAllAcceptances() {
        $acceptances = AcceptanceVacancies::all();
        return view('pages.user.pengumuman', ['acceptances' => $acceptances]);
    }

    public function downloadAcceptance(int $id)
    {
        $acceptance = AcceptanceVacancies::find($id);
        $path = public_path('file/upload/' . $acceptance->url);

        if (file_exists($path)){
            return Response::download($path, $acceptance->url);
        }

        return redirect()->back()->with('error', 'File not found');
    }
}
