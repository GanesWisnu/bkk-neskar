<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //
        $criterias = Criteria::all();
        return view('pages.admin.kriteria.index', ['criterias' => $criterias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=> 'required',
            'input_type'=> 'required',
        ]);

        $validate = $request->except(['csrf_token']);
        $validate['user_id'] = $request->user()->user_id;

        $criteria = Criteria::create($validate);

        if($criteria->save()){
            return redirect()->route('admin.kriteria');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $criterias = Criteria::where("criteria_id",$id);

        return view('pages.admin.kriteria.show', ['criteria' => $criteria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $criterias = Criteria::where("criteria_id",$id);

        return view('pages.admin.kriteria.edit', ['criteria' => $criteria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request = $request->except(['_token', '_method']);

        if (Criteria::where("criteria_id",$id)->update($request)){
            return  redirect()->route('admin.kriteria');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $criteria = Criteria::where("criteria_id",$id)->delete();
        if($criteria){
            return redirect()->route('admin.kriteria');
        }
    }
}
