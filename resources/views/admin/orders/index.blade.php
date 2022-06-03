@extends('layouts.admin')
@section('title') Управление заказами @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список заказов</h1>
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
                    <th scope="col">Электронная почта</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Текст</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Управление</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->full_name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>
                            @switch($order->status)
                                @case('new')
                                    Новый
                                @break

                                @case('processed')
                                    В работе
                                @break

                                @case('success')
                                    Успешно завершен
                                @break

                                @case('fail')
                                    Завершен неудачно
                                @break

                                @default
                                    Неизвестен
                            @endswitch
                        </td>
                        <td>{{ $order->text }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td><a href="{{ route('admin.orders.edit', ['order' => $order->id]) }}"
                                style="font-size: 12px;">Ред.</a> &nbsp;
                            <a href="javascript:;" style="color:red; font-size: 12px;" data-delete="yes"
                                data-id={{ $order->id }} data-type="orders">Уд.</a>
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
