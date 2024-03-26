<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\JobVacancies;
use App\Models\Company;
use App\Models\JobVacanciesCriteria;
use App\Models\Criteria;
use App\Models\ApplicantsVacancies;


class JobVacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        //
        $job_vacancies = JobVacancies::all();
        foreach($job_vacancies as $job){
            $job->company = $job->company;
            $job->sumOfRegistered = ApplicantsVacancies::where('job_vacancies_id', $job->id)->count();
        }
        $job_vacancies_criterias = JobVacanciesCriteria::all();
        $companies = Company::all();
        $criteria = Criteria::all();
        return view('pages.admin.lowongan.index', ['job_vacancies' => $job_vacancies, 'companies'=> $companies, 'criteria' => $criteria, 'job_vacancies_criterias'=>$job_vacancies_criterias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.lowongan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            "position"=>'required|string',
            "company_id" =>"required|numeric",
            "description"=>"required|string",
            "criterias"=> "required|array|exists:criteria,id",
            "additional_information"=>"string",
            "deadline"=>"required|date",
        ]);

        $criterias = $request->only('criterias');
        $validate = $request->except(["csrf_token", "criterias"]);

        $job_vacancies = JobVacancies::create($validate);
        // dd($job_vacancies);
        if ($job_vacancies->save()){
            foreach ($criterias['criterias'] as $criteria) {
                $job_vacancies_criteria = JobVacanciesCriteria::create(["job_vacancies_id"=>$job_vacancies->id, "criteria_id"=>(int)$criteria]);
                $job_vacancies_criteria->save();
            }
            return redirect()->route('admin.lowongan');
        } else {
            // dd($request->all());
        }
        // $job_vacancies->save();

        return redirect()->route('admin.lowongan');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $lowongan)
    {
        //
        $job_vacancies = JobVacancies::find($lowongan);
        return view('pages.admin.lowongan.show', ['job_vacancies' => $job_vacancies, 'job_vacancies_criterias'=>$job_vacancies_criterias]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $lowongan)
    {
        //
        $job_vacancies = JobVacancies::find($lowongan);
        return view('pages.admin.lowongan.edit', ['job_vacancies'=>$job_vacancies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $lowongan)
    {
        //
        $job_vacancies = JobVacancies::find($lowongan);
        if ($request->has('criterias')){
            foreach($request->get('criterias')['criterias'] as $cirteria){
                JobVacanciesCriteria::where([
                    ["job_vacancies_id", "=", $job_vacancies->id],
                    ["criteria_id", "=", $cirteria->id]
                ])->firstOrCreate(['job_vacancies_id'=>$job_vacancies->id, 'criteria_id'=>$criteria->id]);
            }
        }

        return redirect()->route('lowongan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $lowongan)
    {
        //
        $job_vacancies = JobVacancies::find($lowongan);
        JobVacanciesCriteria::where('job_vacancies_id', '=', $job_vacancies->id)->each(function ($items, $key){
            $items->delete();
        } );
        $job_vacancies->delete();
        return redirect()->route('admin.lowongan');
    }
    public function destroy_criteria_job_vacancies(int $lowongan, int $criteria_id){
        $job_vacancies_criteria = JobVacanciesCriteria::where([
            ["job_vacancies_id", "=", $job_vacancies->id],
            ["criteria_id", "=", $cirteria->id]
        ])->first();

        $job_vacancies_criteria->delete();
    }

    public function export(Request $request, string $file)
    {
        if($file == 'database'){
            $job_vacancies = JobVacanciesCriteria::all();
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $alphas = range('a', 'z');
            $x = array();
            foreach (array_keys($job_vacancies[0]->toArray()) as $key=>$value){
                $sheet->setCellValue(implode([$alphas[$key], 1]), $value);
            }

            foreach($job_vacancies as $key => $value){
                foreach(array_keys($value->toArray()) as $key2=> $value2){
                    $sheet->setCellValue(implode([$alphas[$key2], $key+2]), $value[$value2]);
                }
            }
            $writer = new Xlsx($spreadsheet);
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header("Content-Disposition: attachment;filename=\"export_data_lowongan.xlsx\"");
            header("Cache-Control: max-age=0");
            header("Expires: Fri, 11 Nov 2011 11:11:11 GMT");
            header("Last-Modified: ". gmdate("D, d M Y H:i:s") ." GMT");
            header("Cache-Control: cache, must-revalidate");
            header("Pragma: public");
            $writer->save("php://output");

        }else{
            $applicants =ApplicantsVacancies::where('job_vacancies_id', $request->id)->get();
            if (count($applicants) > 0){
                $vacancies = $applicants[0]->vacancies;
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $alphas = range('a', 'z');
                foreach (array_keys($applicants[0]['data']) as $key=>$value){
                    $sheet->setCellValue(implode([$alphas[$key], 1]), $value);
                }

                foreach($applicants as $key=>$value){
                    foreach(array_keys($applicants[$key]['data']) as $key2=>$value2){
                        $sheet->setCellValue(implode([$alphas[$key2], $key+2]), $value['data'][$value2]);
                    }
                }



                $writer = new Xlsx($spreadsheet);
                header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                header("Content-Disposition: attachment;filename=\"{$vacancies->company->name} . {$vacancies->code}.xlsx\"");
                header("Cache-Control: max-age=0");
                header("Expires: Fri, 11 Nov 2011 11:11:11 GMT");
                header("Last-Modified: ". gmdate("D, d M Y H:i:s") ." GMT");
                header("Cache-Control: cache, must-revalidate");
                header("Pragma: public");
                $writer->save("php://output");
            }else{
                return redirect()->route('admin.lowongan')->with('error', 'belum ada pelamar yang mendaftar');
            }
        }
    }
}
