@extends('layouts.admin')
@section('title') Редактирование данных пользователя {{ $user->name }} @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать данные пользователя {{ $user->name }}</h1>
    </div>

    <div class="table-responsive">
        <h3>Форма редактирования данных пользователя</h3>
    </div>
    <div class="container">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <span class="lead">Имя:&nbsp{{ $user->name }}</span>
            </div>
            <div class="mb-3">
                <span class="lead">Адрес электронной почты:&nbsp{{ $user->email }}</span>
            </div>
            <div class="form-check">
                <input name="is_admin" type="hidden" value=0 />
                <input class="form-check-input" type="checkbox" value=1 id="isAdminCheck" name="is_admin"
                    @if (old('is_admin') || (old('is_admin') === null && $user->is_admin)) checked @endif>
                <label class="form-check-label" for="isAdminCheck">
                    Является администратором
                </label>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Сохранить</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary mb-3">Выйти без сохранения</a>
        </form>
    </div>
@endsection
