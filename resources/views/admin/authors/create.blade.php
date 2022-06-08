@extends('layouts.admin')
@section('title') Добавление автора @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить автора</h1>
    </div>

    <div class="table-responsive">
        <h3>Форма добавления автора</h3>
    </div>
    <div class="container">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.authors.store') }}">
            @csrf
            <div class="mb-3">
                <label for="firstNameInput" class="form-label">Имя</label>
                <input type="text" class="form-control" id="firstNameInput" name="first_name" placeholder="Имя" required
                    value="{{ old('first_name') }}">
            </div>
            <div class="mb-3">
                <label for="lastNameInput" class="form-label">Фамилия</label>
                <input type="text" class="form-control" id="lastNameInput" name="last_name" placeholder="Фамилия" required
                    value="{{ old('last_name') }}">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Сохранить</button>
            <a href="{{ route('admin.authors.index') }}" class="btn btn-primary mb-3">Выйти без сохранения</a>
        </form>
    </div>
@endsection
