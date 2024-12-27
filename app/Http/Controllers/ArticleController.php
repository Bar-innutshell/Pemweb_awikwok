<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(2); // Adjust the number as needed
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('articles.index')->with('error', 'Unauthorized access.');
        }

        $article = new Article(); // Instance kosong untuk form
        return view('articles.create', compact('article'));
    }


    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('articles.index')->with('error', 'Unauthorized access.');
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Article::create($validatedData);

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }


    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('articles.index')->with('error', 'Unauthorized access.');
        }

        return view('articles.create', compact('article'));
    }


    public function update(Request $request, Article $article)
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('articles.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article->update($request->all());
        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('articles.index')->with('error', 'Unauthorized access.');
        }

        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');
    }
}

