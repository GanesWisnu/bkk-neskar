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
        return view('admin.kriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.kriteria.create');
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

        $request = $request->except(['csrf_token']);

        $criteria = Criteria::create($request);

        if($criteria->save()){
            return redirect()->route('admin.criteria.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $criteria = Criteria::find($id);

        return view('admin.kriteria.show', ['criteria' => $criteria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $criteria = Criteria::find($id);

        return view('admin.kriteria.edit', ['criteria' => $criteria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $criteria = Criteria::find($id);

        $request = $request->except(['token_csrf']);

        if ($criteria->update($request)){
            return  redirect()->route('admin.user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $criteria = Criteria::find($id);
        $criteria->delete();
        return redirect()->route('admin.article.index');
    }
}
