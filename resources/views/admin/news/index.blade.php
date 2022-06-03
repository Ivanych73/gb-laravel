@extends('layouts.admin')
@section('title') Управление новостями @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Заголовок</th>
                    <th scope="col">Автор(ы)</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Категория(и)</th>
                    <th scope="col">Дата добавления</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($news as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            @php
                                $authorsList = [];
                                foreach ($item->authors as $author) {
                                    $authorsList[] = $author['first_name'] . ' ' . $author['last_name'];
                                }
                                echo implode(', ', $authorsList);
                            @endphp
                        </td>
                        <td>
                            @switch($item->status)
                                @case('draft')
                                    Черновик
                                @break

                                @case('active')
                                    Опубликовано
                                @break

                                @case('off')
                                    Снято с публикации
                                @break

                                @default
                                    Неизвестен
                            @endswitch
                        </td>
                        <td>
                            @php
                                $categoriesList = [];
                                foreach ($item->categories as $category) {
                                    $categoriesList[] = $category['title'];
                                }
                                echo implode(', ', $categoriesList);
                            @endphp
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td><a href="{{ route('admin.news.edit', ['news' => $item->id]) }}"
                                style="font-size: 12px;">Ред.</a> &nbsp;
                            <a href="javascript:;" style="color:red; font-size: 12px;" data-delete="yes"
                                data-id={{ $item->id }} data-type="news">Уд.</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4">Записей нет</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $news->links() }}
        </div>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/deleteitem.js') }}"></script>
    @endsection
