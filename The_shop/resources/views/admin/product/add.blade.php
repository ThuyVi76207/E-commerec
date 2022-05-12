@extends('layouts.admin')

@section('title')
    <title>Thêm sản phẩm</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('CSS\add.css') }}" rel="stylesheet">
    <style>
        .select2-selection__choice {
            background-color: #000 !important;
        }
    </style>
@endsection

@section('content')
  
  <div class="content-wrapper">

    @include('sample.content-header', ['name' => 'product', 'key' => 'Add'])
    <div class="col-md-12">
     
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
           <div class="col-md-6">
             <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Tên sản phẩm</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}" >
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Giá sản phẩm</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="price" placeholder="Nhập giá sản phẩm" value="{{ old('price') }}">
                  @error('price')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Ảnh đại diện</label>
                  <input type="file" class="form-control-file" name="feature_image_path" placeholder="Nhập giá sản phẩm">
                </div>

                <div class="form-group">
                  <label>Ảnh chi tiết</label>
                  <input type="file" multiple class="form-control-file" name="image_path[]" placeholder="Nhập giá sản phẩm">
                </div>

                <div class="form-group">
                  <label>Chọn danh mục</label>
                  <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="">Chọn danh mục</option>
                      {!! $htmlOption !!}
                  </select>
                  @error('category_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                    <label>Nhập tags cho sản phẩm</label>
                    <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

                    </select>
                </div>

                <div class="form-group">
                  <label>Nhập nội dung</label>
                  <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="3">{{ old('content') }}</textarea>
                  @error('content')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
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