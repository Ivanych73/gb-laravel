@extends('layouts.main')
@section('title') Регистрация @parent @stop
@section('content')
    <div class="container my-3">
        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                @include('inc.messages')
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Регистрация</p>

                                        <form method="post" action="{{ route('register') }}" class="mx-1 mx-md-4">
                                            @csrf
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" id="nameInput" class="form-control" name="name"
                                                        value="{{ old('name') }}" />
                                                    <label class="form-label" for="nameInput">Ваше имя</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="email" id="emailInput" class="form-control" name="email"
                                                        value="{{ old('email') }}" required />
                                                    <label class="form-label" for="emailInput">Ваш адрес электронной
                                                        почты</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" id="passwordInput" class="form-control"
                                                        name="password" required />
                                                    <label class="form-label" for="passwordInput">Пароль</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" id="confirmPasswordInput" class="form-control"
                                                        name="password_confirmation" required />
                                                    <label class="form-label" for="confirmPasswordInput">Подтвердите
                                                        пароль</label>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit"
                                                    class="btn btn-primary btn-lg">Зарегистрироваться</button>
                                            </div>

                                        </form>

                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                            class="img-fluid" alt="Sample image">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
