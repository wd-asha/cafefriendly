@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Orders Delivered</h6>
        <p class="mg-b-20 mg-sm-b-30">Total Orders Delivered: {{ $orders->total() }}<span style="float: right">
            {{--<a href="{{ route('admin.product.create') }}" class="btn btn-info">New Product</a>--}}
        </span></p>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-5p">User</th>
                    <th class="wd-10p">EMail</th>
                    <th class="wd-5p">Delivery</th>
                    <th class="wd-8p">Phone</th>
                    <th class="wd-8p">Total</th>
                    <th class="wd-12p">Created</th>
                    <th class="wd-12p">Updated</th>
                    <th class="wd-5p">Status</th>
                    <th class="wd-10p">Details</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_name }}</td>
                        <td>{{ $order->order_email }}</td>
                        <td>{{ $order->order_delivery }}</td>
                        <td>{{ $order->order_phone }}</td>
                        <td>{{ $order->order_total }} ₽</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
                        <td>
                            @if($order->order_status == 0)
                                <span style="color: red;">Pending</span>
                            @elseif($order->order_status == 1)
                                <span style="color: blue;">Process</span>
                            @elseif($order->order_status == 2)
                                <span style="color: green;">Delivered</span>
                            @else
                                <span>Completed</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-outline-info" style="display: inline-block; margin-bottom: 10px;"><i class="fa fa-eye" style="font-size: 1.2rem;"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($orders->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $orders->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

@endsection
