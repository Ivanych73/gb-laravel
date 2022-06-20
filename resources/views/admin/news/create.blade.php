@extends('layouts.admin')
@section('title') Добавить новость @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
    </div>

    <div class="table-responsive">
        <h3>Форма добавления новости</h3>
        @include('inc.messages')
    </div>
    <div class="container">
        <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Название"
                    value="{{ old('title') }}" required>
            </div>
            <div class="row my-3">
                <div class="col-xs-12 col-sm-7 col-md-9">
                    <div class="form-group">
                        <label for="content">Текст</label>
                        <textarea name="content" id="content" class="form-control" rows="20" required>{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="annotation">Аннотация</label>
                        <textarea name="annotation" id="annotation" class="form-control" required>{{ old('annotation') }}</textarea>
                    </div>
                </div>
                <div class="col-xs-5 col-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-3">Сохранить</button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-primary mb-3">Выйти без сохранения</a>
                    </div>
                    <div class="form-group my-3">
                        <label for="statusSelect">Статус</label>
                        <select class="form-select" id="statusSelect" name="status">
                            <option value="active" @if (old('status') == 'active') selected @endif>Опубликовано</option>
                            <option value="draft" @if (old('status') == 'draft' || !old('status')) selected @endif>Черновик
                            </option>
                            <option value="off" @if (old('status') == 'off') selected @endif>Снято с публикации
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="authors">Автор(ы)</label>
                        <select name="authors[]" id="authors" class="form-select" required multiple>
                            @foreach ($authorsList as $author)
                                <option value="{{ $author->id }}"
                                    @if (old('authors')) @if (in_array($author->id, old('authors'))) selected @endif
                                    @endif>
                                    {{ $author->first_name . ' ' . $author->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categories">Категория(и)</label>
                        <select name="categories[]" id="categories" class="form-select" required multiple>
                            @foreach ($categoriesList as $category)
                                <option value="{{ $category->id }}"
                                    @if (old('categories')) @if (in_array($category->id, old('categories'))) selected @endif
                                    @endif>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <p class="help-block">Image definitions</p>
                        </div>
                        <button type="button" data-delete="yes" class="btn btn-danger my-3">Удалить изображение</button>
                        <img class="w-100" data-image="yes" src="http://fakeimg.pl/300/">
                    </div>
                </div>
        </form>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/handle.image.js') }}"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/use.ckeditor.js') }}"></script>
@endsection
