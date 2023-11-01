@extends('layouts.login')
@section('title', 'Friendly - Сброс пароля')
@section('content')

<div class="wrapper">

    <div class="login">
        <div class="login-img">
            <img src="{{ asset('images/login.jpg') }}" alt="">
        </div>
        <div class="login-form">
            <h2>Сброс пароля</h2>
            <form method="post" action="{{ route('password.email') }}">
                @csrf
                <div class="form-control">
                    <label for="emailInput"></label>
                    <input type="email" placeholder="E-mail" id="emailInput" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="btn-box">
                    <button type="submit" class="login-link">Send reset link
                        <div class="product_btn_back"></div>
                    </button>
                </div>
                @if(session('status'))
                    <p>A link to reset your password has been sent to your email</p>
                @endif
            </form>
        </div>
    </div>

</div>
@endsection
