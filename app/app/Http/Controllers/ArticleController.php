<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    const PAGINATE = 20;
    public function index()
    {
        $articles = Article::orderBy('article_updated_at', 'desc')
            ->paginate(self::PAGINATE);
        return view('home', ['articles' => $articles]);
    }
}
