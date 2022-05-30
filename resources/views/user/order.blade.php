@extends('layouts.main')
@section('title') Оформить заказ @parent @stop
@section('content')
    <div class="container">
        @include('user.result')
        <form action="{{ route('user.saveOrder') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nameInput" class="form-label">Имя заказчика</label>
                <input type="text" class="form-control" id="nameInput" name="full_name" placeholder="Имя Фамилия"
                    value="{{ old('full_name') }}" required>
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Электронная почта</label>
                <input type="email" class="form-control" id="emailInput" name="email" placeholder="mailbox@domain.com"
                    value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="nameInput" class="form-label">Телефон</label>
                <input type="text" class="form-control" id="phoneInput" name="phone" placeholder="+7 (000) 000-00-00"
                    value="{{ old('phone') }}" required>
            </div>
            <div class="mb-3">
                <label for="orderTextarea" class="form-label">Опишите, что бы Вы хотели</label>
                <textarea class="form-control" id="orderTextarea" name="text" rows="3"
                    required>{{ old('text') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Отправить</button>
        </form>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('js/format.phone.js') }}"></script>
@endsection
