<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('article_updated_at', 'desc')->get();
        return view('home', ['articles' => $articles]);
    }
}
