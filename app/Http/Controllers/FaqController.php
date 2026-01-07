<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));
        $from = $request->query('from');
        $to = $request->query('to');
        $categoryFilter = $request->query('category');

        $categories = FaqCategory::with(['items' => function ($query) use ($search, $from, $to, $categoryFilter) {
            if ($categoryFilter) {
                $query->where('faq_category_id', $categoryFilter);
            }

            if ($search !== '') {
                $query->where(function ($q) use ($search) {
                    $q->where('question', 'like', "%{$search}%")
                        ->orWhere('answer', 'like', "%{$search}%");
                });
            }

            if ($from) {
                $query->whereDate('created_at', '>=', $from);
            }

            if ($to) {
                $query->whereDate('created_at', '<=', $to);
            }

            $query->orderByDesc('created_at');
        }])
            ->orderBy('name')
            ->get();

        // Voor dropdown: alle categorieën
        $allCategories = FaqCategory::orderBy('name')->get(['id', 'name']);

        return view('public.faq.index', [
            'categories' => $categories,
            'allCategories' => $allCategories,
            'filters' => [
                'q' => $search,
                'from' => $from,
                'to' => $to,
                'category' => $categoryFilter,
            ],
        ]);
    }
}
