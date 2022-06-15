@extends('layouts.main')
@section('title') Личная страница @parent @stop
@section('content')
    <div class="container">

        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        <img src="{{ Auth::user()->avatar }}" alt="avatar">
    </div>
@endsection
