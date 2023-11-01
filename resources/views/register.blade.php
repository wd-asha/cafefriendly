@extends('layouts.login')
@section('title', 'Friendly - Авторизация')
@section('content')

<div class="wrapper">

    <div class="login">

        <div class="login-form">
            <h3>РЕГИСТРАЦИЯ</h3>
            <form method="post" action="{{ route('register') }}">
                @csrf
                <div class="form-control">
                    <label for="name"></label>
                    <input type="text" placeholder="Имя" id="name" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                <div class="form-control">
                    <label for="emailInput"></label>
                    <input type="email" id="emailInput" name="email" value="{{ old('email') }}" placeholder="Ваш email" required autocomplete="email" autofocus>
                </div>
                <div class="form-control">
                    <label for="passInput"></label>
                    <input type="password" placeholder="Пароль" id="passInput" name="password" required autocomplete="current-password">
                </div>
                <div class="form-control">
                    <label for="password-confirm"></label>
                    <input type="password" placeholder="Повторить пароль" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="btn-box">
                    <button type="submit" class="login-link">Создать аккаунт
                    </button>
                </div>
            </form>
            <p class="toReg">Уже есть аккаунт? <a href="{{ route('login') }}">Вход</a></p>
        </div>
    </div>

</div>
@endsection
