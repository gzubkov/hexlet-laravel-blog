<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
})->name('about');

// Название сущности в URL во множественном числе, контроллер в единственном
Route::get('articles', [ArticleController::class, 'index'])
  ->name('articles.index');

Route::get('articles/create', [ArticleController::class, 'create'])
  ->name('articles.create');

// POST-запрос
Route::post('articles', [ArticleController::class, 'store'])
  ->name('articles.store');

Route::delete('articles/{id}', [ArticleController::class, 'destroy'])
  ->name('articles.destroy');

Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])
  ->name('articles.edit');

// Метод PATCH
Route::patch('articles/{id}', [ArticleController::class, 'update'])
  ->name('articles.update');


Route::get('articles/{id}', [ArticleController::class, 'show'])
  ->name('articles.show');