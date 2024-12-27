<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Simpan komentar
        Comment::create([
            'article_id' => $request->input('article_id'),
            'name' => $request->input('name'),
            'content' => $request->input('content'),
        ]);

        // Redirect kembali ke artikel
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
