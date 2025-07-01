@extends('layouts.app')

@section('content')
    <h1>Список статей</h1>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
    @if (Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
    @endif
    <div>
        <table class="table">
            <thead>
                <tr>
                    <td>id</td>
                    <td>Название</td>
                    <td>Действия</td>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td><a class="text-decoration-none" href="{{ route('articles.destroy', $article->id) }}">{{ $article->name }}</a></td>
                        <td>
                            <a class="text-decoration-none" href="{{ route('articles.edit', $article->id) }}">Редактировать</a>
                            <a class="text-decoration-none link-danger" href="{{ route('articles.destroy', $article->id) }}" data-confirm="Are you sure?" data-method="delete">Удалить</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$articles->links()}}
    </div>
    <div>
        <a href={{ route('articles.create') }}>Добавить статью</a>
    </div>
@endsection