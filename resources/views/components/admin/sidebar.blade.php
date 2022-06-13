<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.index')) active @endif" aria-current="page"
                    href="{{ route('admin.index') }}">
                    <span data-feather="home"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.categories.*')) active @endif"
                    href="{{ route('admin.categories.index') }}">
                    <span data-feather="file"></span>
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.news.*')) active @endif"
                    href="{{ route('admin.news.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.authors.*')) active @endif"
                    href="{{ route('admin.authors.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Авторы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.users.*')) active @endif"
                    href="{{ route('admin.users.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Пользователи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.feedbacks.*')) active @endif"
                    href="{{ route('admin.feedbacks.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Отзывы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.orders.*')) active @endif"
                    href="{{ route('admin.orders.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Заказы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Загрузки
                </a>
            </li>

        </ul>
    </div>
</nav>
