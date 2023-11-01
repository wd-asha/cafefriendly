<!DOCTYPE html>
<html lang="ru" style="height: 100%">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Friendly</title>
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
</head>
<body style="height: 100%">
<div class="wrapper" style="min-height: 100%; display: flex; flex-direction: column;">
    <div></div>
    <div class="contents" style="flex: 1 1 auto;">

        <div class="header-fix-shop">
            <div class="header" id="header">
                <div class="header-logo">
                    <a href="{{ URL('/') }}" class="header-logo-link">Friendly</a>
                </div>
                <div class="header-menu">
                    <div class="nav-item">
                        <a href="{{ route('shop') }}" class="nav-item-link" id="itemLink1">Продолжить покупки</a>
                    </div>
                </div>
                <div class="header-link">
                    @guest
                        <a href="{{ route('login') }}" class="burger">
                            <img src="{{asset('images/account.png')}}" alt="">
                        </a>
                    @endguest
                    @auth
                        <a href="{{ route('wishlist') }}" class="burger">
                            <img src="{{asset('images/add-friend.png')}}" alt="">
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <div class="content-box-cart" style="flex: 1 1 auto;">
            <div class="header-img">
                <img src="{{asset('images/header-shop-min.jpg')}}" alt="">
            </div>
            <div class="content-left_wishlist">
                <div class="content-left-menu">

                    <div class="content-left-search">
                        <div class="search-icon">
                            <img src="{{asset('images/loupe.svg')}}" alt="">
                        </div>
                        <input type="text">
                        <div class="search-close">X</div>
                    </div>

                    <div class="content-left-icon_wishlist">
                        <p class="title">Личный кабинет</p>
                    </div>
                </div>

                @yield('content')

            </div>
            <div class="content-right_wishlist">
                <p class="title">Информация</p>
                <div class="cart-cart">
                    <h4>Пользователь</h4>
                    <form action="{{ route('personal.update') }}" method="post">
                        @csrf
                        <div class="inputs-address">
                            <div class="input-wrapper">
                                <input type="text"  class="input-address" name="first_user" id="first_user" placeholder="" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="input-wrapper">
                                <input type="email"  class="input-address" name="email_user" id="email_user" placeholder="" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="cart-cart-info">
                            <button type="submit" name="submit" class="cart-cart-btn_wishlist">Изменить</button>
                        </div>
                    </form>
                </div>

                <div class="cart-cart">
                    <h4>Пароль</h4>
                    <form action="{{ route('reset.password') }}" method="post">
                        @csrf
                        <div class="inputs-address">
                            <div class="input-wrapper">
                                <input type="email" class="input-address" name="email_pass_user" id="email_pass_user" placeholder="" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="input-wrapper">
                                <input type="password" class="input-address" name="new_pass_user" id="new_pass_user" placeholder="новый пароль" value="">
                            </div>
                            <div class="input-wrapper">
                                <input type="password" class="input-address" name="repeat_pass_user" id="repeat_pass_user" placeholder="повтор пароля" value="">
                            </div>
                        </div>
                        <div class="cart-cart-info">
                            <button type="submit" name="submit" class="cart-cart-btn_wishlist">Изменить</button>
                        </div>
                    </form>
                </div>

                <div class="cart-cart">
                    <h4>Адрес доставки</h4>
                    <form action="{{ route('shipping.update') }}" method="POST">
                        @csrf
                        <div class="inputs-address">
                            @auth
                                <div class="input-wrapper">
                                    <input type="text" name="shipping_user" class="input-address" placeholder="Адрес" value="{{ Auth::user()->shipping_user }}">
                                </div>
                                <div class="input-wrapper">
                                    <input type="tel" name="phone_user" class="input-address" placeholder="Телефон" value="{{ Auth::user()->phone_user }}">
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                            @endauth
                            @guest
                                <div class="input-wrapper">
                                    <input type="text" name="shipping_user" class="input-address" placeholder="Адрес" value="">
                                </div>
                                <div class="input-wrapper">
                                    <input type="email" name="email" class="input-address" placeholder="Email" value="">
                                </div>
                                <div class="input-wrapper">
                                    <input type="tel" name="phone_user" class="input-address" placeholder="Телефон" value="">
                                </div>
                                <input type="hidden" name="user_id" value="0">
                                <input type="hidden" name="user_name" value="noname">
                            @endguest
                        </div>
                        <div class="cart-cart-info">
                            <button type="submit" name="submit" class="cart-cart-btn_wishlist">Изменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="info-section-bg">
        <div class="info-section">
            <div class="info-item">
                <a href="#">Правовая информация</a>
            </div>
            <div class="info-item">
                <a href="#">Политика конфиденциальности</a>
            </div>
            <div class="info-item">
                <a href="#">О cookie</a>
            </div>
            <div class="info-item">
                <a href="http://wd-asha.ru">&copy;wd-asha</a>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('js/sweetalert.min.js')}}"></script>
<script src="{{ asset('js/toastr.min.js')}}"></script>
<script src="{{asset('js/cart.js')}}"></script>
<script>
            @if(Session::has('message'))
    let type="{{Session::get('alert-type','info')}}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

</body>
</html>
