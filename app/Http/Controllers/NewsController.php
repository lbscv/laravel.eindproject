<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // PUBLIC: /news
    public function index()
    {
        $news = News::orderByDesc('published_at')->get();
        return view('news.index', compact('news'));
    }

    // ADMIN: /admin/news/create
    public function create()
    {
        return view('admin.news.create');
    }

    // ADMIN: POST /admin/news
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'published_at' => ['required', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news = News::create($validated);

        return redirect()->route('news.show', $news)->with('success', 'Nieuwsitem toegevoegd.');
    }

    // PUBLIC: /news/{news}
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    // ADMIN: /admin/news/{news}/edit
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    // ADMIN: PUT/PATCH /admin/news/{news}
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'published_at' => ['required', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($validated);

        return redirect()->route('news.show', $news)->with('success', 'Nieuwsitem aangepast.');
    }

    // ADMIN: DELETE /admin/news/{news}
    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Nieuwsitem verwijderd.');
    }
}
