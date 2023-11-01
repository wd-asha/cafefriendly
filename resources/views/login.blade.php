@extends('layouts.login')
@section('title', 'Friendly - Авторизация')
@section('content')

<div class="wrapper">

    <div class="login">

        <div class="login-form">
            <h3>ВХОД</h3>
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-control">
                    <label for="emailInput"></label>
                    <input type="email" placeholder="E-mail" id="emailInput" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                @error('email')
                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-1rem)">
                    <p style="text-align: center; width: 100%;">{{ $message }}</p>
                </div>
                @enderror
                <div class="form-control">
                    <label for="passInput"></label>
                    <input type="password" placeholder="Пароль" id="passInput" name="password" required autocomplete="current-password">
                    <div class="forgot">
                        <a href="{{ route('password.reque') }}">Забыли пароль?</a>
                    </div>
                </div>
                <div class="btn-box">
                    <button type="submit" class="login-link">Войти
                    </button>
                </div>
            </form>
            <p class="toReg">Еще нет аккаунта? <a href="{{ route('register') }}">Регистрация</a></p>
        </div>
    </div>

</div>
@endsection
