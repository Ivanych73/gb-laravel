@extends('layouts.admin')
@section('title') Добавить новость @parent @stop
@section('content')
    <script src="http://cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" placeholder="Название">
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-9">
                <div class="form-group">
                    <textarea name="content" id="content"></textarea>
                    <script>
                        CKEDITOR.replace('content');
                    </script>
                </div>
            </div>
            <div class="col-xs-5 col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Сохранить как черновик</button>
                    <button type="submit" class="btn btn-default">Просмотреть</button>
                    <button type="submit" class="btn btn-primary">Опубликовать</button>
                </div>
                <div class="form-group">
                    <label for="created">Дата создания</label>
                    <input type="text" class="form-control" id="created" placeholder="Дата создания">
                </div>
                <div class="form-group">
                    <label for="status_id">Автор</label>
                    <select name="status_id" class="form-control">
                        <option value="">Автор</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <div class="form-check">
                        @foreach ($categoriesList as $value)
                            <div class="checkbox">
                                <label>
                                    <input class="form-check-input" type="radio" name="Category_Id"
                                        value="{{ $value['id'] }}">
                                    {{ $value['title'] }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" />
                        <p class="help-block">Image definitions</p>
                    </div>
                    <a href="#" class="thumbnail">
                        <img src="http://fakeimg.pl/300/">
                    </a>
                </div>
            </div>
    </form>
@endsection
