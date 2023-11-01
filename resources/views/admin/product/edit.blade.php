@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Редактирование продукта (ID {{ $product->id }})</h6>

        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Код: </label>
                            <input class="form-control" type="text" name="product_code" placeholder="Введите код" value="{{ $product->product_code }}"><br>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-control-label">Наименование: </label>
                            <input class="form-control" type="text" name="product_title" placeholder="Введите наименование" value="{{ $product->product_title }}"><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Вес: </label>
                            <input class="form-control" type="text" name="product_weight" placeholder="Введите вес" value="{{ $product->product_weight }}"><br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Цена: </label>
                            <input class="form-control" type="text" name="product_price" placeholder="Введите цену" value="{{ $product->product_price }}"><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Категория: <span class="tx-danger">*</span></label>
                            <select class="form-control" data-placeholder="Select category" name="category_id">
                                <option label="Выберите категорию"></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @php if($category->id === $product->category_id) { echo "selected"; } @endphp>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="product_status" value="false"
                                @php if($product->product_status === 1) {echo "checked";} @endphp>
                            <span>Активно</span>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Подробности: </label>
                            <textarea class="form-control" id="summernote" name="product_about">
                                {!! $product->product_about !!}
                            </textarea><br>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-success mg-r-5"><i class="fa fa-floppy-o"></i></button>
                    <a href="{{ route('admin.products') }}" class="btn btn-info">К списку продуктов</a>
                </div><!-- form-layout-footer -->
            </div>
        </form>


        <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
            <h6 class="card-body-title">Изменение фото продукта</h6><br>

            <form action="{{ route('admin.product.updatePhoto', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Фото: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file" name="image_one" data-placeholder="Выберите фото" onchange="readURL1(this);"><br><br>
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_image_one" value="{{ $product->product_image }}">
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img src="/{{ $product->product_image }}" style="width: 80px; height: 80px;" alt=""> &rarr;
                        <img src="{{ asset('media/product/empty-image.png') }}" id="one" style="width: 80px; height: 80px;" alt="">
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-success mg-r-5"><i class="fa fa-floppy-o"></i></button>
                    <a href="{{ route('admin.products') }}" class="btn btn-info">К списку продуктов</a>
                </div><!-- form-layout-footer -->

            </form>
        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script>
        $(document).on("click", "[type='checkbox']", function(e) {
            if (this.checked) {
                $(this).attr("value", "true");
            } else {
                $(this).attr("value","false");}
        });
    </script>

    <script type="text/javascript">
        function readURL1(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL2(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL3(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        function readURL4(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#four')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
