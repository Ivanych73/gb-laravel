@extends('layouts.admin')
@section('title') Редактирование данных об источнике {{ $source->title }} @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать данные об источнике {{ $source->title }}</h1>
    </div>

    <div class="table-responsive">
        <h3>Форма редактирования данных об источнике</h3>
    </div>
    <div class="container">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.sources.update', ['source' => $source]) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="titleInput" class="form-label">Название</label>
                <input type="text" class="form-control" id="titleInput" name="title" placeholder="Название" required
                    value="@if (old('title')){{ old('title') }}@else{{ $source->title }}@endif">
            </div>
            <div class="mb-3">
                <label for="urlInput" class="form-label">URL</label>
                <input type="text" class="form-control" id="urlInput" name="url" placeholder="https://example.com"
                    value="@if (old('url')){{ old('url') }}@else{{ $source->url }}@endif">
            </div>
            <div class="mb-3">
                <label for="descriptionTextarea" class="form-label">Описание источника</label>
                <textarea 
                    class="form-control" 
                    id="descriptionTextarea" 
                    name="description" rows="3"
                >@if (old('description')){{ old('description') }}@else{{ $source->description }}@endif</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Сохранить</button>
            <a href="{{ route('admin.sources.index') }}" class="btn btn-primary mb-3">Выйти без сохранения</a>
        </form>
    </div>
@endsection
