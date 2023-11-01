<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Friendly</title>
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">

</head>
<body>

<div class="contents">

    <div class="header-fix-shop">
        <div class="header" id="header">
            <div class="header-logo">
                <a href="{{ URL('/') }}" class="header-logo-link">Friendly</a>
            </div>
            <div class="header-menu">
                <div class="nav-item">
                    <a href="" class="nav-item-link" id="itemLink1">ежедневно с 08:00 до 22:00</a>
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

    <div class="content-box">
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
                    <img src="{{asset('images/loupe.png')}}" alt="">
                </div>
                <div class="content-left-items">
                    <div class="content-left-item">
                        <a href="#autor" class="active">Авторские блюда</a>
                    </div>
                    <div class="content-left-item">
                        <a href="#salad">Икра</a>
                    </div>
                    <div class="content-left-item">
                        <a href="#souse">Соусы</a>
                    </div>
                    <div class="content-left-item">
                        <a href="#cola">Напитки</a>
                    </div>
                </div>
                <div class="content-left-favorit">
                    <a href="{{ route('wishlist') }}">
                        <img src="{{asset('images/heart.png')}}" alt="">
                    </a>
                </div>

            </div>

            <h3 id="autor">Авторские блюда</h3>
            <div class="menu">
                @foreach($products as $product)
                    @if(($product->category->title === 'Dish') AND ($product->product_status === 1))
                    <div class="menu-item">
                        <div class="menu-item-desc">
                            <div>
                                <p class="item-title">{{ $product->product_title }}</p>
                                <p class="item-text">{!! $product->product_about !!}</p>
                            </div>
                            <p class="item-price">{{ $product->product_price }} ₽</p>
                        </div>
                        <div class="menu-item-img">
                            <img src="../../../../{{ $product->product_image }}" alt="">
                        </div>
                        <div class="cart-add">
                            <form action="{{route('product.addCart', $product->id)}}" method="POST">
                                @csrf
                                <div class="btn-box">
                                    <button type="submit" class="add-to-cart">
                                            <img src="{{asset('images/basket-plus.png')}}" alt="">
                                    </button>
                                </div>
                            </form>
                        </div>
                        @auth
                            @php $d = false; @endphp
                            @foreach($wishlist as $item)
                                @if ( (int)$item->product_id == $product->id AND (int)$item->user_id == Auth::user()->id)
                                    @php $d = true @endphp
                                @endif
                            @endforeach
                            @if($d == false)
                                <a href="{{ route('favorite', $product->id) }}" class="favorit-add">
                                    <div class="btn-box">
                                        <button type="submit" class="add-to-cart">
                                            <img src="{{asset('images/heart-plus.png')}}" alt="">
                                        </button>
                                    </div>
                                </a>
                            @endif
                        @endauth
                    </div>
                    @endif
                @endforeach
            </div>

            <h3 id="salad">Икра</h3>
            <div class="menu">
                @foreach($products as $product)
                    @if(($product->category->title === 'Caviar') AND ($product->product_status === 1))
                    <div class="menu-item">
                        <div class="menu-item-desc">
                            <div>
                                <p class="item-title">{{ $product->product_title }}</p>
                                <p class="item-text">{!! $product->product_about !!}</p>
                            </div>
                            <p class="item-price">{{ $product->product_price }} ₽</p>
                        </div>
                        <div class="menu-item-img">
                            <img src="../../../../{{ $product->product_image }}" alt="">
                        </div>
                        <div class="cart-add">
                            <form action="{{route('product.addCart', $product->id)}}" method="POST">
                                @csrf
                                <div class="btn-box">
                                    <button type="submit" class="add-to-cart">
                                        <img src="{{asset('images/basket-plus.png')}}" alt="">
                                    </button>
                                </div>
                            </form>
                        </div>
                        @auth
                            @php $d = false; @endphp
                            @foreach($wishlist as $item)
                                @if ( (int)$item->product_id == $product->id AND (int)$item->user_id == Auth::user()->id)
                                    @php $d = true @endphp
                                @endif
                            @endforeach
                            @if($d == false)
                                <a href="{{ route('favorite', $product->id) }}" class="favorit-add">
                                    <div class="btn-box">
                                        <button type="submit" class="add-to-cart">
                                            <img src="{{asset('images/heart-plus.png')}}" alt="">
                                        </button>
                                    </div>
                                </a>
                            @endif
                        @endauth
                    </div>
                    @endif
                @endforeach
            </div>


            <h3  id="souse">Соусы</h3>
            <div class="menu">
                @foreach($products as $product)
                    @if(($product->category->title === 'Sauce') AND ($product->product_status === 1))
                        <div class="menu-item">
                            <div class="menu-item-desc">
                                <div>
                                    <p class="item-title">{{ $product->product_title }}</p>
                                    <p class="item-text">{!! $product->product_about !!}</p>
                                </div>
                                <p class="item-price">{{ $product->product_price }} ₽</p>
                            </div>
                            <div class="menu-item-img">
                                <img src="../../../../{{ $product->product_image }}" alt="">
                            </div>
                            <div class="cart-add">
                                <form action="{{route('product.addCart', $product->id)}}" method="POST">
                                    @csrf
                                    <div class="btn-box">
                                        <button type="submit" class="add-to-cart">
                                            <img src="{{asset('images/basket-plus.png')}}" alt="">
                                        </button>
                                    </div>
                                </form>
                            </div>
                            @auth
                                @php $d = false; @endphp
                                @foreach($wishlist as $item)
                                    @if ( (int)$item->product_id == $product->id AND (int)$item->user_id == Auth::user()->id)
                                        @php $d = true @endphp
                                    @endif
                                @endforeach
                                @if($d == false)
                                    <a href="{{ route('favorite', $product->id) }}" class="favorit-add">
                                        <div class="btn-box">
                                            <button type="submit" class="add-to-cart">
                                                <img src="{{asset('images/heart-plus.png')}}" alt="">
                                            </button>
                                        </div>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                @endforeach
            </div>

            <h3  id="cola">Напитки</h3>
            <div class="menu">

                @foreach($products as $product)
                    @if(($product->category->title === 'Drink') AND ($product->product_status === 1))
                        <div class="menu-item">
                            <div class="menu-item-desc">
                                <div>
                                    <p class="item-title">{{ $product->product_title }}</p>
                                    <p class="item-text">{!! $product->product_about !!}</p>
                                </div>
                                <p class="item-price">{{ $product->product_price }} ₽</p>
                            </div>
                            <div class="menu-item-img">
                                <img src="../../../../{{ $product->product_image }}" alt="">
                            </div>
                            <div class="cart-add">
                                <form action="{{route('product.addCart', $product->id)}}" method="POST">
                                    @csrf
                                    <div class="btn-box">
                                        <button type="submit" class="add-to-cart">
                                            <img src="{{asset('images/basket-plus.png')}}" alt="">
                                        </button>
                                    </div>
                                </form>
                            </div>
                            @auth
                                @php $d = false; @endphp
                                @foreach($wishlist as $item)
                                    @if ( (int)$item->product_id == $product->id AND (int)$item->user_id == Auth::user()->id)
                                        @php $d = true @endphp
                                    @endif
                                @endforeach
                                @if($d == false)
                                    <a href="{{ route('favorite', $product->id) }}" class="favorit-add">
                                        <div class="btn-box">
                                            <button type="submit" class="add-to-cart">
                                                <img src="{{asset('images/heart-plus.png')}}" alt="">
                                            </button>
                                        </div>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
        <div class="content-right">
            <p class="title">
                Корзина
            </p>
            <div class="cart">
                <div class="cart-icon">
                    <img src="{{asset('images/basket.png')}}" alt="">
                </div>
                <div class="cart-info">
                    @if(Cart::count() !== 0)
                        @php $cartItems = Cart::content(); @endphp
                        @foreach($cartItems as $cartItem)
                            <p style="color: #8a1f11;">{{ $cartItem->name }} ({{ $cartItem->qty }})&emsp;{{ $cartItem->price(0, ',', ' ' ) }} ₽</p>
                        @endforeach
                        <a href="{{ route('cart') }}" class="cart-cart-link">Подробнее</a>
                        @else
                        <p>Добавте вкусную еду</p>
                    @endif
                </div>
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

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('js/sweetalert.min.js')}}"></script>
<script src="{{ asset('js/toastr.min.js')}}"></script>

<script>
    $(function(){

        let headerShop = $('.header-fix-shop');
        let headerImage = $('.header-img');
        let contentLeftItems = $('.content-left-menu');
        let contentRight = $('.content-right');

        headerShopHeight = headerShop.height();
        headerImageHeight = headerImage.height();
        startFix = headerShopHeight + headerImageHeight;

        window.onscroll = function showHeader() {
            if(window.pageYOffset > startFix){
                contentLeftItems.css('position', 'sticky');
                contentLeftItems.css('top', 0);
                contentRight.css('position', 'sticky');
                contentRight.css('top', 0);
            }
        };

        let contentLeftItem = $('.content-left-item a');

        contentLeftItem.on('click', function (e) {
            e.preventDefault();
            contentLeftItem.each(function () {
                $(this).removeClass('active')
            });
            $(this).addClass('active');
        });

        let autorA = $('a[href="#autor"]');
        let autor = $('#autor');
        let saladA = $('a[href="#salad"]');
        let salad = $('#salad');
        let souseA = $('a[href="#souse"]');
        let souse = $('#souse');
        let colaA = $('a[href="#cola"]');
        let cola = $('#cola');

        $(window).scroll(function() {
            okAutor = autor.offset().top - autorA.offset().top;
            okSalad = salad.offset().top - saladA.offset().top;
            okSouse = souse.offset().top - souseA.offset().top;
            okCola = cola.offset().top - colaA.offset().top;
            if (okAutor <= 0) {
                contentLeftItem.each(function () {
                    $(this).removeClass('active')
                });
                autorA.addClass('active');
            }
            if (okSalad <= 0) {
                contentLeftItem.each(function () {
                    $(this).removeClass('active')
                });
                saladA.addClass('active');
            }
            if (okSouse <= 0) {
                contentLeftItem.each(function () {
                    $(this).removeClass('active')
                });
                souseA.addClass('active');
            }
            if (okCola <= 0) {
                contentLeftItem.each(function () {
                    $(this).removeClass('active')
                });
                colaA.addClass('active');
            }
        });

        $('a[href^="#"]').on('click', function() {
            let href = $(this).attr('href');

            $('html, body').animate({
                scrollTop: $(href).offset().top
            }, {
                duration: 1000,   // по умолчанию «400»
                easing: "linear" // по умолчанию «swing»
            });
            return false;
        });

        let contentLeftIcon = $('.content-left-icon');
        let contentLeftSearch = $('.content-left-search');
        let searchClose = $('.search-close');

        contentLeftIcon.on('click', function () {
            contentLeftSearch.css("display", "flex");
        });
        searchClose.on('click', function () {
            contentLeftSearch.css("display", "none");
        });

    });
</script>
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