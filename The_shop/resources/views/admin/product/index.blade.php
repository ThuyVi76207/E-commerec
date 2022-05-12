@extends('layouts.admin')

@section('title')
<title>Sản phẩm</title>
@endsection
@section('content')

@section('css')
  <link rel="stylesheet" href="{{ asset('admins/product/add/list.css') }}">  
@endsection

@section('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('admins/product/index/list.js') }}"></script>
@endsection

  <div class="content-wrapper">
    @include('sample.content-header', ['name' => 'product', 'key' => 'List'])
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Tên sản phẩm</th>
                      <th scope="col">Giá</th>
                      <th scope="col">Hình ảnh</th>
                      <th scope="col">Danh mục</th>
                      <th scope="col">Sự kiện</th>

                    </tr>
                  </thead>
                  <tbody>       
                  @foreach($products as $productItem)
                    <tr>
                      <th scope="row">{{ $productItem->id }}</th>
                      <td>{{ $productItem->name }}</td>
                      <td>{{ number_format($productItem->price) }}</td>
                      <td>
                        <img class="product_image_150x100" src="{{ $productItem->feature_image_path }}" alt="">
                      </td>
                    
                      <td>{{ optional($productItem->category)->name }}</td>
                      <td>
                        <a href="{{ route('product.edit', ['id' => $productItem->id]) }}" class="btn btn-default">Sửa</a>
                        <a href="" data-url="{{ route('product.delete', ['id' => $productItem->id]) }}" class="btn btn-danger action_delete">Xóa</a>
                      </td>
                    </tr>
                  @endforeach
        
                  </tbody>
              </table>
          </div>
          <div class="col-md-12">
            {{ $products->links() }}
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
