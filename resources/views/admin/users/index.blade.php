@extends('layouts.admin')
@section('title') Управление пользователями @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Администратор</th>
                    <th scope="col">Адрес электронной почты</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Управление</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if ($user->is_admin)
                                Да
                            @else
                                Нет
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                                style="font-size: 12px;">Ред.</a> &nbsp;
                            <a href="javascript:;" style="color:red; font-size: 12px;" data-delete="yes"
                                data-id={{ $user->id }} data-type="users">Уд.</a>
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
