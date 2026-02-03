<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
{
    $news = News::latest()->paginate(10);

    return view('admin.news.index', compact('news'));
}
    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'nullable|string|max:500',
            'content'      => 'required|string',
            'status'       => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'thumbnail'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload thumbnail (jika ada)
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')
                ->store('news-thumbnails', 'public');
        }

        News::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title) . '-' . uniqid(),
            'excerpt'      => $request->excerpt,
            'content'      => $request->content,
            'status'       => $request->status,
            'published_at' => $request->status === 'published'
                                ? ($request->published_at ?? now())
                                : null,
            'thumbnail'    => $thumbnailPath,
            'user_id'      => auth()->id(),
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Berita berhasil disimpan');
    }


public function edit(News $news)
{
    return view('admin.news.edit', compact('news'));
}

public function update(Request $request, News $news)
{
    $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required|string',
        'status'  => 'required|in:draft,published',
    ]);

    $news->update([
        'title'        => $request->title,
        'slug'         => Str::slug($request->title),
        'content'      => $request->content,
        'status'       => $request->status,
        'published_at' => $request->status === 'published'
                            ? ($news->published_at ?? now())
                            : null,
    ]);

    return redirect()
        ->route('admin.news.index')
        ->with('success', 'Berita berhasil diperbarui');
}

public function destroy(News $news)
{
    $news->delete();

    return redirect()
        ->route('admin.news.index')
        ->with('success', 'Berita berhasil dihapus');
}

}
