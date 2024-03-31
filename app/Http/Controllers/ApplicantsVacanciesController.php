<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\ApplicantsVacancies;
use App\Models\Criteria;

class ApplicantsVacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //
        $applicants =ApplicantsVacancies::all();
        $kriteria =Criteria::all();
        return view('pages.admin.pelamar.index', ['applicants'=>$applicants, 'criteria'=>$kriteria]) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.pelamar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $applicant = ApplicantsVacancies::create([
            'job_vacancies_id' => $request->get('job_vacancies_id'),
            'data' => json_encode($request->except(['_token', '_method', 'job_vacancies_id']))
        ]);

        // return redirect()->route('admin.pelamar');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $applicant = ApplicantsVacancies::find($id);
        return view('pages.admin.pelamar.show', ['applicant' => $applicant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $applicant = ApplicantsVacancies::find($id);
        return view('pages.admin.pelamar.edit', ['applicant' => $applicant]);
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
        return  redirect()->route('admin.pelamar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $applicant = ApplicantsVacancies::find($id);
        $applicant->delete();

    }

    public function export_data()
    {
        $applicants = ApplicantsVacancies::all();
        $collection = $applicants->unique('job_vacancies_id');
        $test = array();
        $spreadsheet = new Spreadsheet();
        // $sheet = $spreadsheet->getActiveSheet();
        $alphas = range('a', 'z');
        foreach($collection as $key => $column){
            $job_applicants = ApplicantsVacancies::where('job_vacancies_id', $column->job_vacancies_id)->get();
            $sheet = $spreadsheet->createSheet($key);
            // Set sheet title
            $sheet->setTitle('Sheet ' . $column->vacancies->code);
            $index = 0;
            foreach (array_keys($job_applicants[0]->toArray()) as $key=>$value){
                if ($value == 'data'){
                    foreach(array_keys($job_applicants[0]->data) as $key2 => $value2){
                        $sheet->setCellValue(implode([$alphas[$index], 1]), $value2);
                        $index++;
                    }
                } else{
                    $sheet->setCellValue(implode([$alphas[$index], 1]), $value);
                    $index++;
                }
            }

            $index = 0;
            foreach($job_applicants as $key => $value){
                foreach(array_keys($value->toArray()) as $key2=> $value2){
                    if($value2 !== 'data'){
                        if ($value2 == 'vacancies'){
                            $sheet->setCellValue(implode([$alphas[$index], $key+2]), $value[$value2]->code);
                        }else{
                            $sheet->setCellValue(implode([$alphas[$index], $key+2]), $value[$value2]);
                        }
                        $index++;
                    } else{
                        foreach(array_keys($value->data) as $key3 => $value3){
                            $sheet->setCellValue(implode([$alphas[$index], $key+2]), $value->data[$value3]);
                            $index++;
                        }
                    }
                }
            }
        }




        $writer = new Xlsx($spreadsheet);
        // $writer->save('example.xlsx');
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment;filename=\"export_data_pelamar.xlsx\"");
        header("Cache-Control: max-age=0");
        header("Expires: Fri, 11 Nov 2011 11:11:11 GMT");
        header("Last-Modified: ". gmdate("D, d M Y H:i:s") ." GMT");
        header("Cache-Control: cache, must-revalidate");
        header("Pragma: public");
        $writer->save("php://output");
    }
}
