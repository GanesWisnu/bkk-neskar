<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companies = Company::all();
        return view('admin.company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image'=> 'required|image|mimes:png,jpg,jpeg',
            'name'=>'required|string',
            'address'=>'string',
            'description'=>'string',
        ]);

        $path = public_path('images/upload/');
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move($path, $imageName);

        $validate = $request->except(['image', 'csrf_token']);

        $validate['image'] = $imageName;

        $company = Company::create($validate);
        $company->save();
        return redirect()->route('company.index');
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
        $company = Company::find($id);
        if($request->has('image')){
            $path = public_path('images/upload/');
            !is_dir($path) &&
                mkdir($path, 0777, true);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);

            $validate = $request->except(['csrf_token', 'image']);

            $validate['image'] =$imageName;
        } else {
            $validate = $request->except(['csrf_token', 'image']);
        }
        $company->update($validate);
        return redirect()->route('compnay.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
