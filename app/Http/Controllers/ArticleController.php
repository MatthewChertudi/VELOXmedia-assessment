<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        } catch (ValidationException $e) {
            abort(404);
        }
    
        $article = Article::create($validateData);

        return response()->json($article, 201);
    }

    public function index() {
        $articles = Article::orderBy('id', 'asc')->get();

        return response()->json($articles, 200);
    }

    public function show($id) {
        try {
            $article = Article::findOrFail($id);

            return response()->json($article, 200);     
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
