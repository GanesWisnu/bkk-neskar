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
        return view('pages.admin.article.index', ['articles' => $articles]);
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
        ]);

        $validated = $request->except(['csrf_token']);

        $article = Article::create($validated);
        if ($article->save())
        {
            return  redirect()->route('admin.article.index');
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
    public function update(Request $request, string $slug)
    {
        //
        $article = Article::where('slug', $slug)->get();

        $request = $request->except(['csrf_token']);

        $article->update($request);

        return  redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        //
        $article = Article::where('slug', $slug)->get();
        $article->delete();
        return redirect()->route('admin.article.index');
    }
}
