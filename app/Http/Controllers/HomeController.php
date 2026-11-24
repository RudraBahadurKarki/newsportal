<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Advertise;

class HomeController extends Controller
{
    public function index()
    {
        $latestArticles = Article::with(['author', 'categories'])
            ->latest()
            ->take(12)
            ->get();

        $featuredArticles = Article::with(['author', 'categories'])
            ->latest()
            ->take(3)
            ->get();

        $categories = Category::with('articles')
            ->get();

        $advertises = Advertise::all();

        return view('home', compact(
            'latestArticles',
            'featuredArticles',
            'categories',
            'advertises'
        ));
    }
}
