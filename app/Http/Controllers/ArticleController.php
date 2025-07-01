<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();

        // Статьи передаются в шаблон
        // compact('articles') => [ 'articles' => $articles ]
        return view('article.index', compact('articles'));
    }

    public function show($articleId)
    {
        $article = Article::findOrFail($articleId);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    // Здесь нам понадобится объект запроса для извлечения данных
    public function store(StoreArticleRequest $request)
    {
        // Проверка введенных данных
        // Если будут ошибки, то возникнет исключение
        // Иначе возвращаются данные формы
        $data = $request->validated();
        $article = new Article();
        // Заполнение статьи данными из формы
        $article->fill($data);
        // При ошибках сохранения возникнет исключение
        $article->save();

        // Редирект на указанный маршрут
        return redirect()
            ->route('articles.index')
            ->with('success', 'Article created successfully');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(StoreArticleRequest $request, $articleId)
    {
        $article = Article::findOrFail($articleId);
        $data = $request->validated();

        $article->fill($data);
        $article->save();
    
        return redirect()
            ->route('articles.index')
            ->with('success', 'Article updated successfully');
    }

    public function destroy($articleId)
    {
        // DELETE — идемпотентный метод, поэтому результат операции всегда один и тот же
        $article = Article::find($articleId);
        
        if ($article) {
            $article->delete();
        }
        return redirect()
            ->route('articles.index')
            ->with('success', 'Article removed successfully');
    }
}
