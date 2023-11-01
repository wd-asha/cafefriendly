@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Подписчики</h6>
        <p class="mg-b-20 mg-sm-b-30">Всего полдписчиков: {{ $subscribers->total() }}<span style="float: right">
            {{--<a href="{{ route('register') }}" class="btn btn-outline-success">New user</a>--}}
        </span></p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th scope="col">
                        <label class="ckbox mg-b-0">
                            <input type="checkbox"><span></span>
                        </label>
                    </th>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">EMail</th>
                    <th scope="col">Дата подписки</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscribers as $subscriber)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $subscriber->id }}</td>
                        <td>{{ $subscriber->user->name }}</td>
                        <td>{{ $subscriber->user->email }}</td>
                        <td>
                            @if($subscriber->created_at)
                                {{ $subscriber->created_at->diffForHumans() }}
                            @else Нет данных
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('delete.subscriber', $subscriber->id) }}" id="delete" class="btn btn-warning" style=" margin-right: .5rem"><i class="fa fa-trash" style="font-size: 1.2rem; padding: 2px;"></i></a>
                            <a href="{{ route('formMail.subscriber', [$subscriber->user_email, $subscriber->user_name]) }}" class="btn btn-info"><i class="fa fa-envelope-o" style="font-size: 1.2rem; padding: 2px;"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $subscribers->links('vendor.pagination.bootstrap-4') }}
            </div>

            <h6 class="card-body-title">Корзина</h6>
            <p class="mg-b-20 mg-sm-b-30">Отписанных: {{ $trashed->total() }}</p>
            <table class="table table-hover table-bordered mg-b-0">
                <thead class="bg-info">
                <tr>
                    <th scope="col">
                        <label class="ckbox mg-b-0">
                            <input type="checkbox"><span></span>
                        </label>
                    </th>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">EMail</th>
                    <th scope="col">Дата отписки</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashed as $trash)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $trash->id }}</td>
                        <td>{{ $trash->user->name }}</td>
                        <td>{{ $trash->user->email }}</td>
                        <td>
                            @if($trash->deleted_at)
                                {{ $trash->deleted_at->diffForHumans() }}
                            @else Нет данных
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('restore.subscriber', $trash->id) }}" class="btn btn-success" style=" margin-right: .5rem"><i class="fa fa-repeat" style="font-size: 1.2rem; padding: 2px;"></i></a>
                            <a href="{{ route('destroy.subscriber', $trash->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-times" style="font-size: 1.2rem; padding: 2px"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
