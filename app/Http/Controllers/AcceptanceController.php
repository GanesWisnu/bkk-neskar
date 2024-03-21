<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\AcceptanceVacancies;

class AcceptanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        return view('admin.penerimaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'file' => 'required|file',
            'job_vacancies_id' => 'required|integer'
        ]);

        $path = public_path('file/upload/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $fileName = time() . '.' . $request->file->extension();
        $request->file->move($path, $fileName);

        $validate = $request->except(['file', 'csrf_token']);

        $validate['url'] = $fileName;

        $acceptance = AcceptanceVacancies::create($validate);
        $acceptance->save();

        return redirect()->route('acceptance.index');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
