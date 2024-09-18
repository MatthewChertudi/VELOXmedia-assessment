<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::post('/articles', [ArticleController::class, 'store']);

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/{id}', [ArticleController::class, 'show']);

Route::put('/articles/{id}', [ArticleController::class, 'update']);

Route::delete('/articles/{id}', [ArticleController::class, 'remove']);