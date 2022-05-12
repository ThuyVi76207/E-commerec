@extends('layouts.admin')

@section('title')
    <title>Slider</title>
@endsection

@section('css')

@endsection

@section('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('admins/slider/list.js') }}"></script>
@endsection

@section('content')

  <div class="content-wrapper">
    @include('sample.content-header', ['name' => 'Role', 'key' => 'Add'])
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Tên vai trò</th>
                      <th scope="col">Mô tả</th>
                      <th scope="col">Sự kiện</th>
                    </tr>
                  </thead>
                  <tbody>

                @foreach($roles as $role)

                    <tr>
                      <th scope="row">{{ $role->id }}</th>
                      <td>{{ $role->name }}</td> 
                      <td>{{ $role->display_name }}</td> 
                      <td>
                        <a href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-default">Sửa</a>
                        <a href="" class="btn btn-danger action_delete">Xóa</a>
                      </td>
                    </tr>
                @endforeach

                  </tbody>
              </table>
            </div>
            <div class="col-md-12">
                    {{ $roles->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
