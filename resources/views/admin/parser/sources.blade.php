@extends('layouts.admin')
@section('title') Загрузка из внешних источников @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Выбор источников</h1>
    </div>
    <div class="table-responsive">
        @include('inc.messages')
        <form action="{{ route('admin.parser.news') }}" method="post">
            @csrf
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="selectAll"><label for="selectAll"
                                class="mx-1">Выбрать все</label></th>
                        <th scope="col">ID</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sources as $source)
                        <tr>
                            <td><input type="checkbox" name="ids[]" id="source-{{ $source->id }}"
                                    value="{{ $source->id }}"></td>
                            <td>{{ $source->id }}</td>
                            <td>{{ $source->title }}</td>
                            <td>{{ $source->description }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Записей нет</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Просмотреть новости</button>
        </form>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/select.all.js') }}"></script>
@endsection
