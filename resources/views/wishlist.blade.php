@extends('layouts.wishlist')
@section('title', 'Friendly - Личный кабинет')
@section('content')



    <div class="cart-action_wishlist">
        <div class="list-items-titles_wishlist">
            <div class="items-title">Избранное</div>
        </div>
        @php $count = 0; @endphp
        @foreach($wishlists as $wishlist)
            @if($wishlist->user_id == Auth::user()->id)
                @php $count = $count + 1 @endphp
                @foreach($products as $product)
                    @if($wishlist->product_id == $product->id)
                        <div class="list-item">
                            <a href="" class="wishlist-item-img">
                                <img src="/{{ $product->product_image }}" alt="">
                            </a>
                            <div class="wishlist-item-desc">
                                <div class="desc-title">{{ $product->product_title }}</div>
                                <div class="desc-subtitle">{!! $product->product_about !!}</div><br>
                                <div class="desc-subtitle">{{ $product->product_weight }} гр.</div>
                                <div class="desc-price" style="color: #ff8000; font-weight: 600;">{{ number_format($product->product_price, 0, '.', ' ')  }} ₽</div>
                            </div>
                            <div class="wishlist-item-delete">
                                <a href="{{route('wishlist.destroy', $wishlist->id)}}" class="wishlist-btn">
                                    <img src="images/delete.png" alt="">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if($count === 0)
            <p style="margin: 2rem 0;">Ваш список избранного пуст</p>
        @endif
        {{--<div class="btn-box_wishlist">
            @if($flag)
                @php
                    $subscriber = 0;
                    foreach($subscribers as $item) {
                        $subscriber = $item->id;
                    }
                @endphp
                <a href="{{ route('unsubscribe', $subscriber) }}" class="in-shop">Unsubscribe</a>
            @else
                <a href="{{ route('subscribe') }}" class="in-shop">Subscribe</a>
            @endif
        </div>--}}

        <div class="list-items-titles">
            <div class="orders-title">Заказ</div>
            <div class="orders-title">Всего, ₽</div>
            <div class="orders-title">Дата</div>
            <div class="orders-title">Статус</div>
        </div>
        @foreach($orders as $order)
            @if( (int)$order->user_id == Auth::user()->id )
                <div class="list-item">
                    <div class="order-item">
                        {{ $order->id }}
                    </div>
                    <div class="order-item">
                        {{ $order->order_total }}
                    </div>
                    <div class="order-item">
                        {{ $order->created_at }}
                    </div>
                    <div class="order-item">
                        @if( $order->order_status == 0 )
                            <div class="order-item-status">принят в работу</div>
                        @endif
                        @if( $order->order_status == 1 )
                            <div class="order-item-status">в обработке</div>
                        @endif
                        @if( $order->order_status == 2 )
                            <div class="order-item-status">на стадии доставки</div>
                        @endif
                        @if( $order->order_status == 3 )
                            <div class="order-item-status">доставлен</div>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
        <div class="btn-logout">
            @if(Auth::user()->name === 'Admin')
                <a href="{{ route('admin.index') }}" class="wishlist-link" style="margin-right: 1rem">Админ панель</a>
            @endif

                @if($flag)
                    @php
                        $subscriber = 0;
                        foreach($subscribers as $item) {
                            $subscriber = $item->id;
                        }
                    @endphp
                    <a href="{{ route('unsubscribe', $subscriber) }}" class="wishlist-link" style="margin-right: 1rem">Отписаться</a>
                @else
                    <a href="{{ route('subscribe') }}" class="wishlist-link" style="margin-right: 1rem">Подписаться</a>
                @endif

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                <span>Выход</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

    </div>



@endsection

