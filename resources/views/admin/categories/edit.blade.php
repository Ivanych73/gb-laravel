@extends('layouts.admin')
@section('title') Редактирование категории {{ $category->title }} @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать категорию {{ $category->title }}</h1>
    </div>

    <div class="table-responsive">
        <h3>Форма редактирования категории</h3>
    </div>
    <div class="container">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="titleInput" class="form-label">Название Категории</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="titleInput" 
                    name="title" 
                    placeholder="Введите название"
                    required
                    value="{{ $category->title }}"
                >
            </div>
            <div class="mb-3">
                <label for="descriptionTextarea" class="form-label">Описание категории</label>
                <textarea 
                    class="form-control" 
                    id="descriptionTextarea" 
                    name="description" rows="3"
                    required
                >{{ $category->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Сохранить</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary mb-3">Выйти без сохранения</a>
        </form>
    </div>
@endsection