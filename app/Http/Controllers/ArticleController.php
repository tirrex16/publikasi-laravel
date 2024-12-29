<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        // Logika untuk mendapatkan artikel
        return response()->json(['message' => 'List of articles']);
    }

    public function stats()
    {
        // Misalnya mengambil jumlah artikel terpublikasi dan belum terpublikasi
        $published = Article::where('status', 'published')->count();
        $unpublished = Article::where('status', 'unpublished')->count();

        return response()->json([
            'published' => $published,
            'unpublished' => $unpublished,
        ]);
    }
}
