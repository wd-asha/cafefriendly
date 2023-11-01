@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Продукт (ID: {{ $product->id }})</h6>
        <div class="form-layout">
            <div class="row mg-b-25">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Код: </label>
                        <span style="text-transform: uppercase;">{{ $product->product_code }}</span>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-control-label">Наименование: </label>
                        <span style="text-transform: uppercase;">{{ $product->product_title }}</span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Категория: </label>
                        <span style="text-transform: uppercase;">{{ $product->category->title }}</span>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Цена: </label>
                        <span style="text-transform: uppercase;">{{ number_format($product->product_price, 0, '.', ',' ) }} ₽</span>
                    </div>
                </div><!-- col-4 -->


                <div class="col-lg-5">
                @if($product->product_status === 1)
                        <span style="color: green; text-transform: uppercase">Статус: Активно</span>
                    @else
                        <span style="text-transform: uppercase">Статус: Не активно</span>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Вес: </label>
                        <span style="text-transform: uppercase;">{{ $product->product_weight }} гр.</span>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        {!! $product->product_about !!}
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label"></label><br>
                            <img src="/{{ $product->product_image }}" style="width: 180px; height: 180px; border: 1px solid rgba(0, 0, 0, .2);" alt="">
                    </div>
                </div>
            </div>

            <div class="form-layout-footer">
                <a href="{{ route('admin.products') }}" class="btn btn-info">К списку продутов</a>
            </div><!-- form-layout-footer -->
        </div>
    </div>
@endsection
