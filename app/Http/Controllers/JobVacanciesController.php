<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobVacancies;
use App\Models\JobVacanciesCriteria;
use App\Models\Criteria;


class JobVacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $job_vacancies = JobVacancies::all();
        $criteria = Criteria::all();
        return view('pages.admin.lowongan.index', ['job_vacancies' => $job_vacancies, 'criteria' => $criteria]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.job_vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "position"=>'required|string',
            "company_id" =>"required|numeric",
            "criterias"=> "required|array|exists:criteria,id",
            "deadline"=>"required|date",
        ]);

        $criterias = $request->only('criterias');
        $validate = $request->except(["csrf_token", "criterias"]);

        $job_vacancies = JobVacancies::create($validate);
        $job_vacancies->save();
        foreach ($criterias['criterias'] as $criteria) {
            $job_vacancies_criteria = JobVacanciesCriteria::create(["job_vacancies_id"=>1, "criteria_id"=>(int)$criteria]);
            $job_vacancies_criteria->save();
        }

        return redirect()->route('job_vacancies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $job_vacancies = JobVacancies::find($id);
        return view('admin.job_vacancies.show', ['job_vacancies' => $job_vacancies]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $job_vacancies = JobVacancies::find($id);
        return view('admin.job_vacancies.edit', ['job_vacancies'=>$job_vacancies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        $job_vacancies = JobVacancies::find($id);
        if ($request->has('criterias')){
            foreach($request->get('criterias')['criterias'] as $cirteria){
                JobVacanciesCriteria::where([
                    ["job_vacancies_id", "=", $job_vacancies->id],
                    ["criteria_id", "=", $cirteria->id]
                ])->firstOrCreate(['job_vacancies_id'=>$job_vacancies->id, 'criteria_id'=>$criteria->id]);
            }
        }

        return redirect()->route('job_vacancies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $job_vacancies = JobVacancies::find($id);
        JobVacanciesCriteria::where('job_vacancies_id', '=', $job_vacancies->id)->each(function ($items, $key){
            $items->delete();
        } );
        $job_vacancies->delete();
    }
    public function destroy_criteria_job_vacancies(int $id, int $criteria_id){
        $job_vacancies_criteria = JobVacanciesCriteria::where([
            ["job_vacancies_id", "=", $job_vacancies->id],
            ["criteria_id", "=", $cirteria->id]
        ])->first();

        $job_vacancies_criteria->delete();
    }
}
