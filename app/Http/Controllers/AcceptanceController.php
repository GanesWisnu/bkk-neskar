<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Storage;
use App\Models\AcceptanceVacancies;
use App\Models\JobVacancies;

class AcceptanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //
        $acceptances = AcceptanceVacancies::all();
        $job_vacancies = JobVacancies::all();
        return view('pages.admin.pengumuman.index', ['acceptances' => $acceptances, 'job_vacancies' => $job_vacancies]);
    }

    public function download(int $id)
    {
        $acceptance = AcceptanceVacancies::find($id);
        $path = public_path('file/upload/' . $acceptance->url);

        if (file_exists($path)){
            return Response::download($path, $acceptance->url);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string',
            'job_vancancies_id' => 'required'
        ]);

        $acceptance = AcceptanceVacancies::create(['name'=> $request->name, 'job_vacancies_id'=>(int)$request->job_vancancies_id]);
        $acceptance->save();

        return redirect()->route('admin.pengumuman');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        $imageName = '';
        $acceptance = AcceptanceVacancies::find($id);
        $validate = $request->only('name');
        if ($request->has('file')){
            $path = public_path('file/upload/');
            !is_dir($path) &&
            mkdir($path, 0777, true);

        $imageName = time() . '.' . $request->file->extension();
        $request->file->move($path, $imageName);
        $validate['url'] = $imageName;
        }


        $acceptance->update($validate);

        return redirect()->route('admin.pengumuman');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $acceptance = AcceptanceVacancies::find($id);
        $public = public_path('file/upload/');
        if(!is_null($acceptance->url) || !empty($acceptance->url)) {
            unlink($public . $acceptance->url);
        }
        $acceptance->delete();
        return redirect()->route('admin.pengumuman');
    }

    public function export(Request $request ,string $file)
    {
        if ($file == 'database'){
            $acceptance = AcceptanceVacancies::all();
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $alphas = range('a', 'z');
            $x = array();
            foreach (array_keys($acceptance[0]->toArray()) as $key=>$value){
                $sheet->setCellValue(implode([$alphas[$key], 1]), $value);
            }

            foreach($acceptance as $key => $value){
                foreach(array_keys($value->toArray()) as $key2=> $value2){
                    $sheet->setCellValue(implode([$alphas[$key2], $key+2]), $value[$value2]);
                }
            }
            $writer = new Xlsx($spreadsheet);
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header("Content-Disposition: attachment;filename=\"export_data_pengumuman.xlsx\"");
            header("Cache-Control: max-age=0");
            header("Expires: Fri, 11 Nov 2011 11:11:11 GMT");
            header("Last-Modified: ". gmdate("D, d M Y H:i:s") ." GMT");
            header("Cache-Control: cache, must-revalidate");
            header("Pragma: public");
            $writer->save("php://output");
        } else{
            $acceptance = AcceptanceVacancies::find($request->id);
            $path = public_path('file/upload/');
            $file = Storage::files($path . $acceptance->url);
            return Response::download($path . $acceptance->url, $acceptance->name . '.' . explode('.' ,$acceptance->url)[1]);
        }
    }
}
