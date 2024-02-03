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
        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('admin.articles.index');
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'url' => $request->url,
            'source' => $request->source,
            'author_name' => $request->author_name,
            'author_profile_image_url' => $request->author_profile_image_url,
            'article_created_at' => $request->article_created_at,
            'article_updated_at' => $request->article_updated_at,
        ];
        $article = new Article();
        $article->fill($data)->save();
        return redirect()->route('admin.articles.index');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $data = [
            'id' => $article->id,
            'title' => $article->title,
            'url' => $article->url,
            'source' => $article->source,
            'author_name' => $article->author_name,
            'author_profile_image_url' => $article->author_profile_image_url,
            'article_created_at' => $article->article_created_at,
            'article_updated_at' => $article->article_updated_at
        ];
        return view('admin.articles.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $data = [
            'title' => $request->title,
            'url' => $request->url,
            'source' => $request->source,
            'author_name' => $request->author_name,
            'author_profile_image_url' => $request->author_profile_image_url,
            'article_created_at' => $request->article_created_at,
            'article_updated_at' => $request->article_updated_at
        ];
        $article->fill($data)->save();
        return redirect()->route('admin.articles.edit', ['id' => $id]);
    }
}
