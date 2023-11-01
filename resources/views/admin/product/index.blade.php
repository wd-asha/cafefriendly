@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Продукты</h6>
        <p class="mg-b-10 mg-sm-b-10">Всего продуктов: {{ $products->total() }}<span style="float: right">
            <a href="{{ route('admin.product.create') }}" class="btn btn-success"><i class="fa fa-plus"></i></a>
        </span></p>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        {{-- Filtration --}}
        <div class="filerForms" style="display: flex; justify-content: flex-start; align-items: flex-start;">
            {{-- Categories filter --}}
            <form action="{{route('admin.productsS')}}" method="get" class="mr-4">
                @csrf
                <select name="category_id" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem;">
                    <option label="Все категории" selected></option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if(isset($_GET['category_id']))
                                @if($_GET['category_id'] == $category->id) selected @endif
                                @endif>{{$category->title}}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-info" style="transform: translateX(-.25rem);"><i class="fa fa-search"></i></button>
            </form>
            {{-- end subcategories filer --}}
            {{-- Amount filter --}}
            <form action="{{route('admin.productsA')}}" method="get" class="mr-4">
                @csrf
                <input type="number" name="product_amount" placeholder="Количество" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem; width: 8rem;">
                <button type="submit" class="btn btn-info" style="transform: translateX(-.25rem);"><i class="fa fa-search"></i></button>
            </form>
            {{-- end amount filter --}}
        </div>
        {{-- end filtration --}}

        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-5p">Код</th>
                    <th class="wd-10p">Наименование</th>
                    <th class="wd-5p">Фото</th>
                    <th class="wd-5p">Цена, ₽</th>
                    <th class="wd-5p">Вес, гр.</th>
                    <th class="wd-5p">Количество</th>
                    <th class="wd-10p">Статус</th>
                    <th class="wd-15p">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td><a href="{{--{{ route('shop.coffee-single', $coffee->id) }}--}}" target="_blank">{{ $product->product_title }}</a></td>
                        <td><img src="/{{ $product->product_image }}" style="height:100px;" alt=""></td>

                        <td>{{ number_format($product->product_price, 0, '.', ',' ) }}</td>
                        <td>{{ $product->product_weight }}</td>
                        <td>
                            @if($product->product_amount < 1)
                                <a href="" data-toggle="modal" data-target="#modaldemo{{ $product->id }}" class="btn btn-danger" style="display: inline-block; margin-bottom: 10px; padding: .2rem .4rem .2rem .4rem;">
                                    <span style="color: white; font-size: 1rem">{{ $product->product_amount }}</span>
                                </a>
                            @elseif($product->product_amount > 0 && $product->product_amount < 4)
                                <a href="" data-toggle="modal" data-target="#modaldemo{{ $product->id }}" class="btn btn-warning" style="display: inline-block; margin-bottom: 10px; padding: .2rem .4rem .2rem .4rem;">
                                    <span style="color: white; font-size: 1rem">{{ $product->product_amount }}</span>
                                </a>
                            @else
                                <a href="" data-toggle="modal" data-target="#modaldemo{{ $product->id }}" class="btn btn-success" style="display: inline-block; margin-bottom: 10px; padding: .2rem .4rem .2rem .4rem;">
                                    <span style="color: white; font-size: 1rem">{{ $product->product_amount }}</span><br>
                                </a>
                            @endif
                        </td>
                        {{--<td>{!! substr($coffee->coffee_about, 0, 100) . " ..." !!}</td>--}}
                        <td>
                           {{-- @if($product->product_status == 1)
                                <span
                                    style="padding: 6px;
                                    background-color: #1a8e06;
                                    color: white;
                                    font-size: .8rem">&ensp;Active&nbsp;
                                </span>&emsp;
                            @else
                                <span
                                    style="padding: 6px;
                                    background-color: #df3b3b;
                                    color: white;
                                    font-size: .8rem">&ensp;Inactive
                                </span>&emsp;
                            @endif--}}

                                <div class="togglebutton">
                                    <label>
                                        @if($product->product_status === 1)
                                            <a href="{{route('product.inactive', $product->id)}}">
                                                <input type="checkbox" checked="">
                                                <span class="toggle"></span>
                                            </a>
                                        @endif
                                        @if($product->product_status === 0)
                                            <a href="{{route('product.active', $product->id)}}">
                                                <input type="checkbox">
                                                <span class="toggle"></span>
                                            </a>
                                        @endif
                                    </label>
                                </div>

                        </td>
                        <td>
                            {{--@if($product->product_status === 1)
                                <a href="{{ route('product.inactive', $product->id) }}" class="btn btn-outline-danger" style="display: inline-block; margin-bottom: 10px; margin-right: 10px;">
                                    <i class="fa fa-thumbs-down" style="font-size: 1.2rem"></i>
                                </a>
                            @else
                                <a href="{{ route('product.active', $product->id) }}" class="btn btn-outline-success" style="display: inline-block; margin-bottom: 10px; margin-right: 10px;">
                                    <i class="fa fa-thumbs-up" style="font-size: 1.2rem"></i>
                                </a>
                            @endif--}}
                            <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-info" style="display: inline-block; margin-right: .5rem;">
                                <i class="fa fa-eye" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning" style="display: inline-block; margin-right: .5rem">
                                <i class="fa fa-edit" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('admin.product.delete', $product->id) }}" id="delete" class="btn btn-danger" style="display: inline-block; margin-bottom: 10px;">
                                <i class="fa fa-trash" style="font-size: 1.2rem; padding: 2px"></i>
                            </a>
                        </td>
                    </tr>

                    <!-- LARGE MODAL -->
                    <div id="modaldemo{{ $product->id }}" class="modal fade">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-header pd-x-20">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Количество</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="{{ route('amount.product', $product->id) }}">
                                    @csrf
                                    <div class="modal-body pd-20">
                                        <div class="form-group @error('title') is-invalid @enderror">
                                            <input type="number" name="product_amount" class="form-control" placeholder="Amount" value="{{ $product->product_amount }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-block">Сохранить</button>
                                        </div>
                                    </div><!-- modal-body -->
                                </form>
                            </div>
                        </div><!-- modal-dialog -->
                    </div><!-- modal -->

                @endforeach
                @if($products->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $products->withQueryString()->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>

        <div style="padding: 20px;"></div>
        {{--Trashed Product--}}
        <h6 class="card-body-title">Корзина</h6>
        <p class="mg-b-10 mg-sm-b-10">Продуктов в корзине: {{ $trashed->total() }}</p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-5p">Код</th>
                    <th class="wd-10p">Наименование</th>
                    <th class="wd-10p">Фото</th>
                    <th class="wd-5p">Цена, ₽</th>
                    <th class="wd-5p">Вес, гр.</th>
                    <th class="wd-20p">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashed as $trash)
                    <tr>
                        <td>{{ $trash->id }}</td>
                        <td>{{ $trash->product_code }}</td>
                        <td>{{ $trash->product_title }}</td>
                        <td><img src="/{{ $trash->product_image }}" style="height:100px;" alt=""></td>
                        <td>{{ number_format($trash->product_price, 2, '.', ',' ) }}</td>
                        <td>{{ $trash->product_weight }}

                        <td>
                            <a href="{{ route('restore.product', $trash->id) }}" class="btn btn-success"><i class="fa fa-repeat"></i></a>
                            <a href="{{ route('destroy.product', $trash->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                @if($trashed->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $trashed->withQueryString()->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

@endsection
