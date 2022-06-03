@extends('layouts.main')
@section('title') Личная страница @parent @stop
@section('content')
    <div class="container">

        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
    </div>
@endsection
