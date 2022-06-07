@extends('layouts.admin')
@section('title') Загрузка из внешних источников @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
    </div>
    <div class="container d-flex flex-column text-center">
        <h3>{{ $parsed['title'] }}</h3>
        <p>{{ $parsed['description'] }}</p>
    </div>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Заголовок</th>
                    <th scope="col">Ссылка</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Управление</th>
                </tr>
            </thead>
            <tbody>
                @forelse($parsed['news'] as $news)
                    <tr>
                        <td>{{ $news['title'] }}</td>
                        <td>{{ $news['link'] }}</td>
                        <td>{{ $news['description'] }}</td>
                        <td>{{ $news['pubDate'] }}</td>
                        <td><a href="#"
                                style="font-size: 12px;">Ред.</a> &nbsp;
                            <a href="javascript:;" style="color:red; font-size: 12px;" data-delete="yes"
                                data-id=0 data-type="authors">Уд.</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Записей нет</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/deleteitem.js') }}"></script>
@endsection