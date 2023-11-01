@extends('layouts.checkout')
@section('title', 'Friendly - Заказ')
@section('content')



            @foreach($cartItems as $cartItem)
                <div class="cartItem-box">
                <form action="{{route('cart.update')}}" method="POST" name="form-update">
                    @csrf
                    <div class="list-item">
                        <a href="" class="list-item-img" style="margin-right: 2rem;">
                            <img src="{{ $cartItem->options->image }}" alt="">
                        </a>
                        <div class="list-item-desc">
                            <a href="" class="desc-title">{{ $cartItem->name }} ({{ $cartItem->qty }})
                            </a>
                            @if($cartItem->weight != 0)
                            <div class="desc-subtitle">{{ $cartItem->weight }} гр.</div>
                            @endif
                            <div class="desc-price">₽ {{ $cartItem->price(0, ',', ' ' ) }}</div>
                        </div>
                        <input type="hidden" name="rowId" value="{{ $cartItem->rowId }}">
                        <div class="quantity">
                            <input type="text" name="qty" value="{{ $cartItem->qty }}" class="quantity-item">
                            <div class="quantity-item quantity-has-select">+</div>
                            <div class="quantity-item quantity-has-select">-</div>
                        </div>
                        <button type="submit" class="recalc" name="submit">Обновить</button>
                        <div class="list-item-subtotal"><span>₽ {{ $cartItem->subtotal(0, ',', ' ' ) }}</span></div>

                        <div class="list-item-delete">
                            <a href="{{route('cart.delete', $cartItem->rowId)}}">
                                <img src="images/delete.png" alt="">
                            </a>
                        </div>
                    </div>
                </form>
                @auth
                    {{--<div class="list-item-wishlist">
                        <a href="{{ route('favorite', $cartItem->id) }}" class="wishlist-btn">
                            <i class="fas fa-heart"></i>
                        </a>
                    </div>--}}
                @endauth
                </div>

            @endforeach


@endsection

