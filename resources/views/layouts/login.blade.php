<!DOCTYPE html>
<html lang="ru" style="height: 100%">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Friendly - Авторизация</title>
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

        @yield('content')

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