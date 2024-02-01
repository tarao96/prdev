<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.articles', ['articles' => $articles]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('admin.articles');
    }
}
