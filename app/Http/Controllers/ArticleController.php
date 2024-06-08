<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //
        $articles = Article::all();
        return view('pages.admin.informasi.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image_cover'=>'required|image|mimes:png,jpg,jpeg'
        ]);
        // dd($request->all());

        $validated = $request->except(['csrf_token']);
        // dd($validated);


        if($request->has('image_cover')){
            $path = public_path('images/upload/');

            !is_dir($path) &&
                mkdir($path, 0777, true);

        $imageName = time() . '.' . $request->image_cover->extension();
        $request->image_cover->move($path, $imageName);

        $validate = $request->except(['image_cover', '_token']);

        $validate['image_cover'] = $imageName;
        $validate['user_id'] = $request->user()->user_id;

        $article = Article::create($validate);
        $article->save();
        return redirect()->route('admin.article');
        }

        $article = Article::create($validated);
        if ($article->save())
        {
            $articles = Article::all();
            return  redirect()->route('pages.admin.informasi.index', ['articles' => $articles]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        //
        $article =  Article::where('slug', $slug)->first();

        return view('admin.article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        //
        $article =  Article::where('slug', $slug)->get();

        return view('admin.article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $article = Article::where('article_id', $id)->first();

        if($request->has('image_cover')){
            $path = public_path('images/upload/');

            !is_dir($path) &&
                mkdir($path, 0777, true);

            $imageName = time() . '.' . $request->image_cover->extension();
            $request->image_cover->move($path, $imageName);
            $request = $request->except(['csrf_token', 'image_cover']);

            $request['image_cover'] = $imageName;
        }

        try {
            if($article->update($request)) {
                return redirect()->route('admin.article');
            } else {
                return redirect()->route('admin.article')->with('error', 'Data gagal diupdate');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.article')->withErrors('Data gagal diupdate'. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $article = Article::where('id', $id)->first();
        $article->delete();
        return redirect()->route('admin.article');
    }
}
