<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::orderByDesc('published_at')->take(3)->get();

        return view('public.home', compact('latestNews'));
    }
}
