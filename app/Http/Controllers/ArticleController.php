<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = new Article;
        $articles = $articles->selectArticle();
     
        return view('articles.index',['articles'=>$articles]);
      
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

        $request->validate([

            'title_fr' => 'required|min:5',
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'content_fr' => 'required|min:10',

        ]);

        $nouvelArticle = Article::create([

            'title'      => $request->title,
            'content'    => $request->content,
            'title_fr'   => $request->title_fr,
            'content_fr' => $request->content_fr,
            'user_id'    => Auth::user()->id,
            'date'       => Carbon::today()
            

        ]);


      
        return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        


        
            return view('articles.show',['unArticle'=>$article]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function showArticles(Article $article)
    {
        $lesArticles = Article::select()->where('user_id',Auth::user()->id)->get();


            return view('articles.show-articles',['articles'=>$lesArticles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit',['unArticle'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([

         

            'title_fr' => 'required|min:5',
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'content_fr' => 'required|min:10',

        ]);

        $article->update([

            'title'      => $request->title,
            'content'    => $request->content,
            'title_fr'   => $request->title_fr,
            'content_fr' => $request->content_fr,

        ]);


        return redirect(route('unArticle.show',$article->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
       
        $article->delete();
        return redirect(route('articles.show'));
    }
}
