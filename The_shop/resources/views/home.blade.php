@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('sample.content-header', ['name' => 'category', 'key' => 'Home'])
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
                Trang chủ/Thống kê
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

