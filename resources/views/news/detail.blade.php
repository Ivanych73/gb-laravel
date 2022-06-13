@extends('layouts.main')
@section('title') Подробно о новости {{ $article['title'] }} @parent @stop
@section('content')
    <div class="container">
        <article>
            <header class="mb-4">
                <h1 class="fw-bolder mb-1">{{ $article['title'] }}</h1>
                <div class="text-muted fst-italic mb-2">Автор(ы): {{ $article['authors'] }}</div>
                <div class="text-muted mb-2">Категория(и): {{ $article['categories'] }}</div>
            </header>
            <section class="mb-5">
                <p class="fs-5 mb-4">{!! $article['content'] !!}</p>
            </section>
        </article>
    </div>
@endsection
