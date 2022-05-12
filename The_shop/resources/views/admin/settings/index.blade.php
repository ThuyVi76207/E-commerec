@extends('layouts.admin')

@section('title')
    <title>Cài đặt</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/settings/index/index.css') }}">
@endsection

@section('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('admins/settings/index/list.js') }}"></script>
@endsection


@section('content')

  <div class="content-wrapper">
    @include('sample.content-header', ['name' => 'Settings', 'key' => 'List'])
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    Add setting
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu float-right">
                    <li><a href="{{ route('settings.create') . '?type=Text' }}">Text</a></li>
                    <li><a href="{{ route('settings.create') . '?type=Textarea' }}">Textarea</a></li>
                </ul>
            </div>

          </div>
          <div class="col-md-12">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Config key</th>
                      <th scope="col">Config value</th>
                      <th scope="col">Sự kiện</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($settings as $setting)

                    <tr>
                      <th scope="row">{{ $setting->id }}</th>
                      <td>{{ $setting->config_key }}</td>
                      <td>{{ $setting->config_value }}</td> 
                      <td>
                        <a href="{{ route('settings.edit', ['id' => $setting->id]) . '?type='. $setting->type }}" class="btn btn-default">Sửa</a>
                        <a href="" data-url="{{ route('settings.delete', ['id' => $setting->id]) }}" class="btn btn-danger action_delete">Xóa</a>
                      </td>
                    </tr>

                  @endforeach
                  </tbody>
              </table>
          </div>
          <div class="col-md-12">
              {{ $settings->links() }}
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
