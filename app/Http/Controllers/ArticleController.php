<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('blog.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $latestArticles = Article::query()
            ->whereKeyNot($article->getKey())
            ->orderByDesc('published_at')
            ->take(5)
            ->get();

        return view('blog.show', compact('article', 'latestArticles'));
    }
}
