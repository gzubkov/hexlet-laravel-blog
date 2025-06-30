<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('/articles', function () {
    return view('articles', ['articles' => App\Models\Article::all()]);
});
