<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::post('/articles', [ArticleController::class, 'store']);