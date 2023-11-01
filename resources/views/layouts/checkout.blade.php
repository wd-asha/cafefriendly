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
                    <a href="{{ route('home') }}" class="header-logo-link">Friendly</a>
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
            <div class="content-left">
                <div class="content-left-menu">

                    <div class="content-left-search">
                        <div class="search-icon">
                            <img src="{{asset('images/loupe.svg')}}" alt="">
                        </div>
                        <input type="text">
                        <div class="search-close">X</div>
                    </div>

                    <div class="content-left-icon">
                        <p class="title">Заказ</p>
                    </div>
                    <div class="content-left-favorit">
                        <a href="{{ route('wishlist') }}">
                            <img src="{{asset('images/heart.png')}}" alt="">
                        </a>
                    </div>

                </div>

                @yield('content')

            </div>
            <div class="content-right">
                <p class="title">Всего</p>
                <div class="cart-cart">
                    <div class="cart-cart-icon">
                        <img src="{{asset('images/basket.png')}}" alt="">
                    </div>
                    <div class="cart-cart-info">
                        @if(Cart::count() !== 0)
                            <p>₽ {{ Cart::total() }}</p>
                        @else
                            <p>Покупок нет</p>
                        @endif
                    </div>
                </div>
                <div class="cart-cart">
                    <div class="cart-cart-icon">
                        <img src="{{asset('images/delivery.png')}}" alt="">
                    </div>
                    <h4>Адрес доставки</h4>

                    <form action="{{ route('check') }}" method="POST" name="form-checkout">
                        @csrf
                        <div class="inputs-address">
                            @auth
                                <div class="input-wrapper">
                                    <input type="text" name="delivery" placeholder="Адрес" class="input-address"  value="{{ Auth::user()->shipping_user }}">
                                </div>
                                @error('delivery')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-1rem)">
                                    <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                </div>
                                @enderror
                                <div class="input-wrapper">
                                    <input type="email" name="email" class="input-address" placeholder="Email" value="{{ Auth::user()->email }}">
                                </div>
                                @error('email')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-1rem)">
                                    <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                </div>
                                @enderror
                                <div class="input-wrapper">
                                    <input type="tel" name="phone" class="input-address" placeholder="Телефон" value="{{ Auth::user()->phone_user }}">
                                </div>
                                @error('phone')
                                <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-1rem)">
                                    <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                </div>
                                @enderror
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                            @endauth
                            @guest
                                <div class="input-wrapper">
                                    <input type="text" name="delivery" class="input-address" placeholder="Адрес" value="">
                                </div>
                                    @error('delivery')
                                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-1rem)">
                                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                    </div>
                                    @enderror
                                <div class="input-wrapper">
                                    <input type="email" name="email" class="input-address" placeholder="Email" value="">
                                </div>
                                    @error('email')
                                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-1rem)">
                                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                    </div>
                                    @enderror
                                <div class="input-wrapper">
                                    <input type="tel" name="phone" class="input-address" placeholder="Телефон" value="">
                                </div>
                                    @error('phone')
                                    <div style="color: red; font-size: .8rem; width: 100%; transform: translateY(-1rem)">
                                        <p style="text-align: center; width: 100%;">{{ $message }}</p>
                                    </div>
                                    @enderror
                                <input type="hidden" name="user_id" value="0">
                                <input type="hidden" name="user_name" value="noname">
                            @endguest
                        </div>
                        <div class="cart-cart-info">
                            @if(Cart::count() !== 0)
                            <button type="submit" name="submit" class="cart-cart-btn">Заказать</button>
                            @else
                            @endif
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