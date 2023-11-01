@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Новый продукт</h6>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-layout">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Код: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_code" placeholder="Введите код"><br>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="form-control-label">Наименование: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_title" placeholder="Введите наименование"><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Вес: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_weight" placeholder="Введите вес"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Цена: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_price" placeholder="Введите цену"><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Категория: <span class="tx-danger">*</span></label><br><br>
                            <select class="form-control" name="category_id">
                                <option label="Выберете категорию"></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="product_status" value="false">
                            <span>Активно</span>
                        </label>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <label class="form-control-label">Подробнее: <span class="tx-danger">*</span></label>
                        <textarea class="form-control" id="summernote" name="product_about"></textarea><br>
                    </div>
                </div>

            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="form-control-label">Фото: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input class="custom-file-input" type="file" id="file" name="product_image" data-placeholder="Выберите фото" onchange="readURL1(this);"><br><br><br>
                            <span class="custom-file-control"></span>
                            <img src="{{ asset('media/product/empty-image.png') }}" id="one">
                        </label>
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

@endsection
