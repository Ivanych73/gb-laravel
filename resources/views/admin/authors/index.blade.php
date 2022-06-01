@extends('layouts.admin')
@section('title') Управление авторами @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список авторов</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.authors.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                    автора</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Управление</th>
                </tr>
            </thead>
            <tbody>
                @forelse($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->first_name }}</td>
                        <td>{{ $author->last_name }}</td>
                        <td>{{ $author->created_at }}</td>
                        <td><a href="{{ route('admin.authors.edit', ['author' => $author->id]) }}"
                                style="font-size: 12px;">Ред.</a> &nbsp;
                            <a href="javascript:;" style="color:red; font-size: 12px;" data-delete="yes"
                                data-id={{ $author->id }} data-type="authors">Уд.</a>
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
