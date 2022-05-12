@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
    <link href="{{ asset('CSS\add.css') }}" rel="stylesheet">
    <style>
        .card-header {
            background-color: #4169E1;
        }
        .border-primary {
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
  
  <div class="content-wrapper">

    @include('sample.content-header', ['name' => 'Roles', 'key' => 'Edit'])
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
           <div class="col-md-12">
             <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên role</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên vai trò" value="{{ $role->name }}">
                </div>

                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="display_name" placeholder="Nhập mô tả" class="form-control" rows="3">{{ $role->display_name }}</textarea>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        @foreach($permissionsParent as $permissionsParentItem)
                            <div class="card border-primary mb-3 col-md-12">
                                <div class="card-header">
                                    <label>
                                        <input type="checkbox" value="" class="checkbox_wrapper">
                                    </label>
                                    Module {{ $permissionsParentItem->name }}
                                </div>
                                <div class="row">
                                    @foreach($permissionsParentItem->permissionsChild as $permissionsChildrentItem)
                                        <div class="card-body text-primary col-md-3">
                                            <h5 class="card-title">
                                                <label>
                                                    <input type="checkbox" name="permission_id[]"
                                                            {{ $pemissionsChecked->contains('id', $permissionsChildrentItem->id) ? 'checked' : '' }}
                                                            class="checkbox_childrent"
                                                            value="{{ $permissionsChildrentItem->id }}">
                                                </label>
                                                {{ $permissionsChildrentItem->name }}
                                            </h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

