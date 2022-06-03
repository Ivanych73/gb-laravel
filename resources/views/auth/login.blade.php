@extends('layouts.main')
@section('title') Вход @parent @stop
@section('content')
    <div class="container my-3">
        @include('inc.messages')
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Адрес электронной почты</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email"
                    value="{{ old('email') }}">
                <div id="emailHelp" class="form-text">Мы ни в коем случае не передадим Ваш адрес электронной почты
                    третьим лицам</div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
            <div class="mb-3 form-check">
                <input name="remember" type="hidden" value=0 />
                <input type="checkbox" class="form-check-input" id="rememberMeCheck" checked name="remember" value=1>
                <label class="form-check-label" for="rememberMeCheck">Запомнить меня</label>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Войти</button>
                <a href={{ route('password.request') }} class="link-primary">Забыли пароль?</a>
                <a href={{ route('register') }} class="link-primary">Зарегистрироваться</a>
            </div>
        </form>
    </div>
@endsection
