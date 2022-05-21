@extends('layouts.admin')
@section('title') Новость добавлена @parent @stop
@section('content')
    <div class="container mt-3">
        <x-alert type="{{ $result }}" :message="$message"></x-alert>
        <div class="d-flex justify-content-center my-3">
            <a href="{{ route('admin.news.index') }}" class="link-primary">К списку новостей</a>
        </div>
    </div>
@endsection