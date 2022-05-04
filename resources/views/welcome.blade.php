@extends('layouts.main')

@section('content')
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">Добро пожаловать!</h1>
                <p class="fs-4">Мы аггергируем разные новости по категориям
                </p>
                <a class="btn btn-primary btn-lg" href=" {{ route('categories.list') }} ">Переход к категориям новостей</a>
            </div>
        </div>
    </div>
@endsection
