@extends('layouts.admin')

@section('title')
    <title>User</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/index.css') }} ">    
@endsection

@section('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('admins/slider/list.js') }}"></script>
@endsection

@section('content')

  <div class="content-wrapper">
    @include('sample.content-header', ['name' => 'User', 'key' => 'List'])
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Tên</th>
                      <th scope="col">Email</th>
                      <th scope="col">Sự kiện</th>
                    </tr>
                  </thead>
                  <tbody>

                @foreach($users as $user)

                    <tr>
                      <th scope="row">{{ $user->id }}</th>
                      <td>{{ $user->name }}</td> 
                      <td>{{ $user->email }}</td> 
                      
                      <td>
                        <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-default">Sửa</a>
                        <a href="" data-url="{{ route('users.delete', ['id' => $user->id]) }}"class="btn btn-danger action_delete">Xóa</a>
                      </td>
                    </tr>
                @endforeach

                  </tbody>
              </table>
            </div>
            <div class="col-md-12">
                {{ $users->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
