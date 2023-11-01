<p>Hello
    @auth , {{ Auth::user()->name }} @endauth
</p>
<p>You purchased from the online store Coffee Supreme:</p>
@php $cartItems = Cart::content(); @endphp
@foreach($cartItems as $cartItem)
    <p>{{ $cartItem->name }} ({{ $cartItem->qty }} pc.)</p>
    <p>$ {{ $cartItem->price(2, '.', ' ' ) }}</p>
    @endforeach
<p>You can monitor the status of order in your personal account on the website Coffee Supreme</p>
