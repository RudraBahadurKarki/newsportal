<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function show($slug)
    {
        $article = Article::with(['author', 'categories'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedArticles = Article::with(['author', 'categories'])
            ->whereHas('categories', function ($query) use ($article) {
                $query->whereIn(
                    'categories.id',
                    $article->categories->pluck('id')
                );
            })
            ->where('id', '!=', $article->id)
            ->latest()
            ->take(3)
            ->get();

        return view('articles.show', compact(
            'article',
            'relatedArticles'
        ));
    }
}
