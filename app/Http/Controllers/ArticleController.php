<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    public function store(Request $request) {

        try {

            $validateData = $request->validate([
                'title' => 'required|max:30',
                'content' => 'required',
                'author' => 'required',
                'category' => 'required',
                'published_at' => 'required',
            ]);
        } catch (ValiditionException $e) {
            abort(404)
        }
    
        $article = Article::create($validateData);

        return response()->json($article, 201);
    }

    public function index() {
        $articles = Article::all();

        return response()->json($articles, 200)
    }
}
