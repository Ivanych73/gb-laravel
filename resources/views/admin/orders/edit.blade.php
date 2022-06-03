@extends('layouts.admin')
@section('title') Редактирование заказа @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать заказ</h1>
    </div>

    <div class="table-responsive">
        <h3>Форма редактирования заказов</h3>
    </div>
    <div class="container">
        @include('inc.messages')
        <form method="post" action="{{ route('admin.orders.update', ['order' => $order]) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <span class="lead">Имя:&nbsp{{ $order->full_name }}</span>
            </div>
            <div class="mb-3">
                <span class="lead">Адрес электронной почты:&nbsp{{ $order->email }}</span>
            </div>
            <div class="mb-3">
                <span class="lead">Номер телефона:&nbsp{{ $order->phone }}</span>
            </div>
            <div class="mb-3">
                <span class="lead">Текст:&nbsp{{ $order->text }}</span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="statusSelect">Статус</label>
                </div>
                <select class="custom-select" id="statusSelect" name="status">
                    <option value="new" @if (old('status') == 'new' || (!old('status') && $order->status == 'new')) selected @endif>Новый</option>
                    <option value="processed" @if (old('status') == 'processed' || (!old('status') && $order->status == 'processed')) selected @endif>В работе</option>
                    <option value="success" @if (old('status') == 'success' || (!old('status') && $order->status == 'success')) selected @endif>Успешно завершен</option>
                    <option value="fail" @if (old('status') == 'fail' || (!old('status') && $order->status == 'fail')) selected @endif>Завершен неудачно</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Сохранить</button>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary mb-3">Выйти без сохранения</a>
        </form>
    </div>
@endsection
