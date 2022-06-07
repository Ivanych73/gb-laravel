@extends('layouts.admin')
@section('title') Управление отзывами @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список отзывов</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Текст</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Управление</th>
                </tr>
            </thead>
            <tbody>
                @forelse($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->full_name }}</td>
                        <td>
                            @switch($feedback->status)
                                @case('new')
                                    Новый
                                @break

                                @case('closed')
                                    Обработан
                                @break

                                @default
                                    Неизвестен
                            @endswitch
                        </td>
                        <td>{{ $feedback->text }}</td>
                        <td>{{ $feedback->created_at }}</td>
                        <td><a href="{{ route('admin.feedbacks.edit', ['feedback' => $feedback->id]) }}"
                                style="font-size: 12px;">Ред.</a> &nbsp;
                            <a href="javascript:;" style="color:red; font-size: 12px;" data-delete="yes"
                                data-id={{ $feedback->id }} data-type="feedbacks">Уд.</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4">Записей нет</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/deleteitem.js') }}"></script>
    @endsection
