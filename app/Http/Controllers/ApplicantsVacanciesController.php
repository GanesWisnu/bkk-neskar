<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\ApplicantsVacancies;

class ApplicantsVacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $applicants =ApplicantsVacancies::all();
        return view('admin.pelamar.index', ['applicants'=>$applicants]) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pelamar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $applicant = ApplicantsVacancies::create([
            'job_vacancies_id' => 1,
            'data' => json_encode($request->except(['csrf_token', 'job_vacancies_id']))
        ]);

        return $applicant;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $applicant = ApplicantsVacancies::find($id);
        return view('admin.pelamar.show', ['applicant' => $applicant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $applicant = ApplicantsVacancies::find($id);
        return view('admin.pelamar.edit', ['applicant' => $applicant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        $applicant = ApplicantsVacancies::find($id);
        $applicant->update([
            'data' =>json_encode($request->except('csrf_token'))
        ]);
        return  redirect()->route('applicants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $applicant = ApplicantsVacancies::find($id);
        $applicant->delete();
        return redirect()->route('applicants.index');
    }

    public function export_data(int $job_vacancies_id)
    {
        $applicants = ApplicantsVacancies::where('job_vacancies_id' ,$job_vacancies_id)->get();
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
        header("Content-Disposition: attachment;filename=\"{$vacancies->code}.xlsx\"");
        header("Cache-Control: max-age=0");
        header("Expires: Fri, 11 Nov 2011 11:11:11 GMT");
        header("Last-Modified: ". gmdate("D, d M Y H:i:s") ." GMT");
        header("Cache-Control: cache, must-revalidate");
        header("Pragma: public");
        $writer->save("php://output");

    }
}
