@extends('layouts.main')
@section('title') Оставить отзыв @parent @stop
@section('content')
    <div class="container">
        @include('user.result')
        <form action="{{ route('user.saveFeedback') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nameInput" class="form-label">Имя пользователя</label>
                <input type="text" class="form-control" id="nameInput" name="userName" placeholder="Имя Фамилия"
                    value="{{ old('userName') }}" required>
            </div>
            <div class="mb-3">
                <label for="feedbackTextarea" class="form-label">Текст отзыва</label>
                <textarea class="form-control" id="feedbackTextarea" name="feedbackText" rows="3"
                    required>{{ old('feedbackText') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Отправить</button>
        </form>
    </div>
@endsection
