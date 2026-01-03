<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;

class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('items')
            ->orderBy('name')
            ->get();

        return view('public.faq.index', compact('categories'));
    }
}
