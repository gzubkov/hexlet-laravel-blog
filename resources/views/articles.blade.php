@extends('layouts.app')

@section('header', 'Статьи')

@section('content')
    @foreach ($articles as $article)
    <h1>{{ $article->name }}</h1>
    <p>{{ $article->body }}</p>
    @endforeach
@endsection