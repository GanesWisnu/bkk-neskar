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
        // $applicant = ApplicantsVacancies::create([
        //     'job_vacancies_id' => $request->get('job_vacancies_id'),
        //     'data' => json_encode($request->except(['_token', '_method', 'job_vacancies_id']))
        // ]);
    
        // session()->flash('success', 'Pendaftaran Berhasil !');
        
        // return redirect()->route('user.lowongan.show', ['id' => $request->get('job_vacancies_id')]);
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
    public function export_data()
    {
        $applicants = ApplicantsVacancies::all();
        $collection = $applicants->unique('job_vacancies_id');
        $spreadsheet = new Spreadsheet();
    
        // Function to generate Excel column names
        function getColumnLetter($index) {
            $letters = '';
            while ($index >= 0) {
                $letters = chr($index % 26 + 65) . $letters;
                $index = floor($index / 26) - 1;
            }
            return $letters;
        }
    
        foreach ($collection as $key => $column) {
            $job_applicants = ApplicantsVacancies::where('job_vacancies_id', $column->job_vacancies_id)->get();
            $sheet = $spreadsheet->createSheet($key);
            // Set sheet title
            $sheet->setTitle('Sheet ' . $column->vacancies->code);
    
            // Add headers
            $index = 0;
            foreach (array_keys($job_applicants[0]->toArray()) as $key => $value) {
                if ($value == 'data') {
                    foreach (array_keys($job_applicants[0]->data) as $key2 => $value2) {
                        $sheet->setCellValue(getColumnLetter($index) . '1', $value2);
                        $index++;
                    }
                } else {
                    $sheet->setCellValue(getColumnLetter($index) . '1', $value);
                    $index++;
                }
            }
    
            // Add data rows
            foreach ($job_applicants as $rowIndex => $applicant) {
                $index = 0;
                foreach (array_keys($applicant->toArray()) as $key2 => $value2) {
                    if ($value2 !== 'data') {
                        if ($value2 == 'vacancies') {
                            $sheet->setCellValue(getColumnLetter($index) . ($rowIndex + 2), $applicant[$value2]->code);
                        } else {
                            $sheet->setCellValue(getColumnLetter($index) . ($rowIndex + 2), $applicant[$value2]);
                        }
                        $index++;
                    } else {
                        foreach (array_keys($applicant->data) as $key3 => $value3) {
                            $sheet->setCellValue(getColumnLetter($index) . ($rowIndex + 2), $applicant->data[$value3]);
                            $index++;
                        }
                    }
                }
            }
        }
    
        $writer = new Xlsx($spreadsheet);
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment;filename=\"export_data_pelamar.xlsx\"");
        header("Cache-Control: max-age=0");
        header("Expires: Fri, 11 Nov 2011 11:11:11 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: cache, must-revalidate");
        header("Pragma: public");
        $writer->save("php://output");
}
}