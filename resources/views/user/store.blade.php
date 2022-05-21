@extends('layouts.main')
@section('title') {{ $title }} @parent @stop
@section('content')
    <div class="container mt-3">
        <x-alert type="{{ $result }}" :message="$message"></x-alert>
        <div class="d-flex justify-content-center my-3">
            <a href="{{ route('news.main') }}" class="link-primary">Вернуться на главную</a>
        </div>
    </div>
@endsection
