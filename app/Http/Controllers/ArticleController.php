<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::with('tags')->get();
        return view('pages.articles')->with('articles' , $articles);
    }

    public function show($id)
    {
        $article = Article::with('tags')->where('id' , $id)->first();
        return view('pages.article-details')->with('article' , $article);
    }
}
