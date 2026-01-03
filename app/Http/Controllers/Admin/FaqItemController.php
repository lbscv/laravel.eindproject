<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqItemController extends Controller
{
    public function index()
    {
        $items = FaqItem::with('category')->orderByDesc('id')->get();
        return view('admin.faq.items.index', compact('items'));
    }

    public function create()
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faq.items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);

        FaqItem::create($validated);

        return redirect()->route('faq-items.index')->with('success', 'FAQ item aangemaakt.');
    }

    public function edit(FaqItem $faq_item)
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faq.items.edit', [
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

        return redirect()->route('faq-items.index')->with('success', 'FAQ item aangepast.');
    }

    public function destroy(FaqItem $faq_item)
    {
        $faq_item->delete();
        return redirect()->route('faq-items.index')->with('success', 'FAQ item verwijderd.');
    }

    public function show(FaqItem $faq_item)
    {
        return redirect()->route('faq-items.edit', $faq_item);
    }
}
