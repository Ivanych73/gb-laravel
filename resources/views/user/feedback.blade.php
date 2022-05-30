@extends('layouts.main')
@section('title') Оставить отзыв @parent @stop
@section('content')
    <div class="container">
        @include('user.result')
        <form action="{{ route('user.saveFeedback') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nameInput" class="form-label">Имя пользователя</label>
                <input type="text" class="form-control" id="nameInput" name="full_name" placeholder="Имя Фамилия"
                    value="{{ old('full_name') }}" required>
            </div>
            <div class="mb-3">
                <label for="feedbackTextarea" class="form-label">Текст отзыва</label>
                <textarea class="form-control" id="feedbackTextarea" name="text" rows="3"
                    required>{{ old('text') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Отправить</button>
        </form>
    </div>
@endsection
