<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqItemController extends Controller
{
    public function index()
    {
        $items = FaqItem::with('category')->orderByDesc('id')->get();
        return view('admin.faq_items.index', compact('items'));
    }

    public function create()
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faq_items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);

        FaqItem::create($validated);

        return redirect()->route('faq-items.index')->with('success', 'Vraag toegevoegd.');
    }

    public function edit(FaqItem $faq_item)
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faq_items.edit', [
            'item' => $faq_item,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, FaqItem $faq_item)
    {
        $validated = $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);

        $faq_item->update($validated);

        return redirect()->route('faq-items.index')->with('success', 'Vraag aangepast.');
    }

    public function destroy(FaqItem $faq_item)
    {
        $faq_item->delete();
        return redirect()->route('faq-items.index')->with('success', 'Vraag verwijderd.');
    }
}
