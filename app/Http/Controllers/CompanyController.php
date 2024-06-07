<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Log;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //
        Log::info(\Request::getRequestUri());
        $companies = Company::all();
        return view('pages.admin.perusahaan.index', ['data' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info(\Request::getRequestUri());
        Log::info($request);
        $request->validate([
            'image'=> 'required|image|mimes:png,jpg,jpeg',
            'name'=>'required|string',
            'address'=>'string|required',
            'description'=>'string',
            'telephone'=>'string|required',
        ]);

        $path = public_path('images/upload/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move($path, $imageName);

        $validate = $request->except(['image', '_token']);

        $validate['image'] = $imageName;
        $validate['user_id'] = $request->user->user_id;

        $company = Company::create($validate);
        $company->save();
        return redirect()->route('admin.perusahaan');

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $company = Compay::find($id);
        return view('admin.company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $company = Company::find($id);
        return view('admin.company.edit', ['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //

        // dd($request);
        $company = Company::find($id);
        if($request->has('image')){
            $path = public_path('images/upload/');
            !is_dir($path) &&
                mkdir($path, 0777, true);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);

            $validate = $request->except(['_token', 'image']);

            $validate['image'] =$imageName;
        } else {
            $validate = $request->except(['_token', 'image']);
        }
        $company->update($validate);
        return redirect()->route('admin.perusahaan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        if($company->delete()){
            return redirect()->route('admin.perusahaan');
        }
    }

    public function export(){
        $company = Company::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $alphas = range('a', 'z');
        $x = array();
        foreach (array_keys($company[0]->toArray()) as $key=>$value){
            $sheet->setCellValue(implode([$alphas[$key], 1]), $value);
        }

        foreach($company as $key => $value){
            foreach(array_keys($value->toArray()) as $key2=> $value2){
                $sheet->setCellValue(implode([$alphas[$key2], $key+2]), $value[$value2]);
            }
        }
        $writer = new Xlsx($spreadsheet);
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment;filename=\"export_data_perusahaan.xlsx\"");
        header("Cache-Control: max-age=0");
        header("Expires: Fri, 11 Nov 2011 11:11:11 GMT");
        header("Last-Modified: ". gmdate("D, d M Y H:i:s") ." GMT");
        header("Cache-Control: cache, must-revalidate");
        header("Pragma: public");
        $writer->save("php://output");
    }
}
