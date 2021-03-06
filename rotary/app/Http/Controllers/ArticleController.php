<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
     {
         $this->middleware('permission:article-list|article-create|article-edit|article-delete',['only'=>['index','show']]);

         $this->middleware('permission:article-create',['only'=>['create','store']]);

         $this->middleware('permission:article-edit',['only'=>['edit','update']]);

         $this->middleware('permission:article-delete',['only'=>['destroy']]);
     }
    public function index()
    {
        $articles = Article::latest()->paginate(5);

        return view('articles.index',compact('articles'))
                ->with('i', (request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Article::create($request->all());

        return redirect() -> route('articles.index' )
                            ->with('success' , 'Article created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit' , compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')
                            ->with('sucess' ,'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect() ->route('articles.index')
                        ->with('sucess','Article deleted successfully');
    }
}
