<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    const PAGINATE = 20;
    public function index(Request $request)
    {
        $query = Article::orderBy('article_updated_at', 'desc');
        if ($request->keyword) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }
        $articles = $query->paginate(self::PAGINATE);
        return view('home', [
            'articles' => $articles,
            'keyword' => $request->keyword
        ]);
    }
}
