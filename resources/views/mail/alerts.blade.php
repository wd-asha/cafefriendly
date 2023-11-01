<p>Уважаемый(ая), {{ $name }}</p>
<p>Вы сделали заказ на сайте Friendly:</p>

@foreach($body as $row)
@if($row->weight === 0)
{{ $row->name }}
${{ $row->price }}
{{ $row->qty }}шт.
    <br>
@endif
@if($row->weight !== 0)
{{ $row->name }}
${{ $row->price }}
{{ $row->qty }}pc.
    <br>
@endif
@endforeach

<p>Всего на сумму: {{ $total }} руб.</p>
<p>Номер вашего заказа: #{{ $orderid }}</p>
<p>Вы можете отслеживать статус заказа в Личном кабинете на сайте Friendly</p>
