  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <a href="{{ route('admin.logout') }}" class="brand-text font-weight-light">
            Đăng xuất
        </a>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src=" {{ asset('AdminLTE/dist/img/user2-160x160.jpg') }} " class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>

      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh mục sản phẩm
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('menus.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Menu
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('product.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sản phẩm
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('slider.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Slider
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('settings.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Cài đặt
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Danh sách người sử dụng
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Danh sách vai trò
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('permissions.create') }}" class="nav-link">
              <p>
                  *** Tạo Permissions
              </p>
            </a>
          </li>

        </ul>
      </nav>
    </div>
  </aside>