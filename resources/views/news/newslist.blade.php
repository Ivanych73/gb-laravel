@extends('layouts.main')
@section('title') Все новости в категории {{ $categoryTitle }} @parent @stop
@section('content')
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
            <div class="m-4 m-lg-5">
                <p class="fs-4">Все новости в категории {{ $categoryTitle }}</p>
            </div>
        </div>
    </div>
    <section class="pt-4">
        <div class="container px-lg-5">
            <div class="row gx-lg-5">
                @foreach ($newsList as $value)
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <a href="{{ route('news.detail', ['id' => $value['id']]) }}">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                            class="bi bi-collection"></i></div>
                                    <h2 class="fs-4 fw-bold">{{ $value['title'] }}</h2>
                                    <p class="mb-0">{{ $value['annotation'] }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
