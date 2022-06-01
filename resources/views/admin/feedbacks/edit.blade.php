@extends('layouts.admin')
@section('title') Редактирование отзыва @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать отзыв</h1>
    </div>

    <div class="table-responsive">
        <h3>Форма редактирования отзывов</h3>
    </div>
    <div class="container">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.feedbacks.update', ['feedback' => $feedback]) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <span class="lead">Имя:&nbsp{{ $feedback->full_name }}</span>
            </div>
            <div class="mb-3">
                <span class="lead">Текст:&nbsp{{ $feedback->text }}</span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="statusSelect">Статус</label>
                </div>
                <select class="custom-select" id="statusSelect" name="status">
                    <option value="new" 
                        @if (old('status') == 'new' || (!old('status') && $feedback->status == 'new')) 
                            selected
                        @endif
                    >Новый</option>
                    <option value="closed"
                        @if (old('status') == 'closed' || (!old('status') && $feedback->status == 'closed')) 
                            selected
                        @endif                    
                    >Обработан</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Сохранить</button>
            <a href="{{ route('admin.feedbacks.index') }}" class="btn btn-primary mb-3">Выйти без сохранения</a>
        </form>
    </div>
@endsection
