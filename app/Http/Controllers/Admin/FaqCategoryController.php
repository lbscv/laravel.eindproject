<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::withCount('items')->orderBy('name')->get();
        return view('admin.faq.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.faq.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        FaqCategory::create($validated);

        return redirect()->route('faq-categories.index')->with('success', 'Categorie aangemaakt.');
    }

    public function edit(FaqCategory $faq_category)
    {
        return view('admin.faq.categories.edit', ['category' => $faq_category]);
    }

    public function update(Request $request, FaqCategory $faq_category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $faq_category->update($validated);

        return redirect()->route('faq-categories.index')->with('success', 'Categorie aangepast.');
    }

    public function destroy(FaqCategory $faq_category)
    {
        $faq_category->delete();
        return redirect()->route('faq-categories.index')->with('success', 'Categorie verwijderd.');
    }

    public function show(FaqCategory $faq_category)
    {
        return redirect()->route('faq-categories.edit', $faq_category);
    }
}
