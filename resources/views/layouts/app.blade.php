<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Friendly</title>
    <link href="{{asset('css/main.css')}}" rel="stylesheet">

</head>
<body>

<div class="header-fix">
    <div class="header" id="header">
        <div class="header-logo">
            <a href="/" class="header-logo-link">Friendly</a>
        </div>
        <div class="header-menu">
            <div class="nav-item">
                <a href="#start" class="nav-item-link" id="itemLink1">Начало</a>
            </div>
            <div class="nav-item">
                <a href="#byway" class="nav-item-link" id="itemLink2">Кстати</a>
            </div>
            <div class="nav-item">
                <a href="#menu" class="nav-item-link" id="itemLink3">Меню</a>
            </div>
            <div class="nav-item">
                <a href="#cafe" class="nav-item-link" id="itemLink4">Кафе</a>
            </div>
        </div>
        <div class="header-link">
            <a href="{{ route('shop') }}" class="header-btn">Заказать</a>
        </div>
    </div>
</div>

@yield('content')

<div class="footer-bg">
    <div class="footer">
        <div class="footer-item">
            <a href="#">Подписка</a>
        </div>
        <div class="footer-item">
            <img src="{{asset('images/facebook.png')}}" alt="">
            <img src="{{asset('images/instagram.png')}}" alt="">
            <img src="{{asset('images/twitter.png')}}" alt="">
            <img src="{{asset('images/whatsapp.png')}}" alt="">
        </div>
        <div class="footer-item">
            <a href="http://wd-asha.ru">&copy;wd-asha</a>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>