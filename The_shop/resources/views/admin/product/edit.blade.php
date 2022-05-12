@extends('layouts.admin')

@section('title')
    <title>Thêm sản phẩm</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('CSS\edit.css') }}" rel="stylesheet">
@endsection

@section('content')
  
  <div class="content-wrapper">

    @include('sample.content-header', ['name' => 'product', 'key' => 'Edit'])
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
           <div class="col-md-6">
             <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Tên sản phẩm</label>
                  <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm" value="{{ $product->name }}">
                </div>

                <div class="form-group">
                  <label>Giá sản phẩm</label>
                  <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm" value="{{ $product->price }} ">
                </div>

                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="file" class="form-control-file" name="feature_image_path" placeholder="Nhập giá sản phẩm">
                    <div class="col-md-4 feature_img_container ">
                        <div class="row">
                            <img class="feature_img" src="{{ $product->feature_image_path }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                  <label>Ảnh chi tiết</label>
                  <input type="file" multiple class="form-control-file" name="image_path[]" placeholder="Nhập giá sản phẩm">
                    <div class="col-md-12 container_img_detail">
                        <div class="row">
                            @foreach($product->productImages as $productImageItem)
                            <div class="col-md-3">
                                <img class="img_detail" src="{{ $productImageItem->image_path }}" alt="" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                  <label>Chọn danh mục</label>
                  <select class="form-control select2_init" name="category_id">
                    <option value="">Chọn danh mục</option>
                      {!! $htmlOption !!}
                  </select>
                </div>

                <div class="form-group">
                    <label>Nhập tags cho sản phẩm</label>
                    <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                        @foreach($product->tags as $tagItem) 
                          <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label>Nhập nội dung</label>
                  <textarea name="content" class="form-control" rows="3" >{{ $product->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(function () {
          $(".tags_select_choose").select2({
            tags: true,
            tokenSeparators: [',']
          });
          $(".select2_init").select2({
            placeholder: "Chọn danh mục",
            allowClear: true
          })
      })
    </script>
    
@endsection