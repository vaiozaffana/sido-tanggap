<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Publik: List artikel
    public function create(Request $request)
    {
        $report = Report::with('user')->findOrFail($request->report);

        return view('admin.articles.create', compact('report'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_id' => 'required|exists:reports,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $report = Report::findOrFail($request->report_id);

        Article::create([
            'report_id' => $report->id,
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $report->image_path, // langsung ambil dari report
            'published_at' => now(),
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }


    public function index()
    {
        $articles = Article::with('report')->latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function public()
    {
        $articles = Article::latest()->take(3)->get(); // Ambil 3 artikel terbaru

        return view('home.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
