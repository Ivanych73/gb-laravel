@extends('layouts.admin')
@section('title') Добавить новость @parent @stop
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form action="{{ route('admin.news.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Название" value="{{ old('title') }}" required>
        </div>
        <div class="row my-3">
            <div class="col-xs-12 col-sm-7 col-md-9">
                <div class="form-group">
                    <label for="content">Текст</label>
                    <textarea name="content" id="content" class="form-control" rows="20" required>{{ old('content') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Аннотация</label>
                    <textarea name="annotation" id="annotation" class="form-control" required>{{ old('annotation') }}</textarea>
                </div>
            </div>
            <div class="col-xs-5 col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Опубликовать</button>
                </div>
                <div class="form-group">
                    <label for="author">Автор</label>
                    <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <div class="form-check">
                        @foreach ($categoriesList as $value)
                            <div class="checkbox">
                                <label>
                                    <input class="form-check-input" type="radio" name="Category_Id"
                                        value="{{ $value['id'] }}" required>
                                    {{ $value['title'] }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <p class="help-block">Image definitions</p>
                    </div>
                    <a href="#" class="thumbnail">
                        <img src="http://fakeimg.pl/300/">
                    </a>
                </div>
            </div>
    </form>
@endsection