<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>
        @section('title') GB laravel news agregator @show
    </title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-lg-5">
            <a class="navbar-brand" href="{{ route('news.main') }}">Посмотреть новости</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="{{ route('news.main') }}">Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">О нас</a></li>
                    @if (Auth::check() && Auth::user()->is_admin)
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">Панель
                                управления</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Связаться с нами
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('user.feedback') }}">Обратная связь</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.order') }}">Оформить заказ</a></li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Личный кабинет
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @if (Auth::check())
                                <li class="nav-item">
                                    <form method="post" action="{{ route('logout') }}">
                                        @csrf
                                        <input class="dropdown-item" type="submit" value="Выход">
                                    </form>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}">Личная страница</a>
                                </li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('login') }}">Вход</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">Регистрация</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <x-footer></x-footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
