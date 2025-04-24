<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bukan ERP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/dist/css/adminlte.min.css') }}">
  <!-- Datatable -->
  <link rel="stylesheet" href="{{ url('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      
      @yield('navi')
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="ml-1">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ Auth::user()->email }}</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ url('/dist/img/BukanLogo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Bukan ERP</span>
    </a>

    <div class="sidebar">
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

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- Manual Sysadmin
          @auth
            @if (Auth::user()->name === 'administrator')
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    System Administration
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('sysadmin.menus.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Menus</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('sysadmin.permissions.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Permissions</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('sysadmin.users.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Users</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endif
          @endauth
           -->
          <li class="nav-header">MAIN MENU</li>
            @foreach($menus as $menu)
              @if(is_null($menu->parent_id))
              <li class="nav-item">
                <a href="{{ $menu->route ? route($menu->route) : '#' }}" class="nav-link">
                  <i class="nav-icon fas {{ $menu->icon }}"></i>
                  <p>
                    {{ $menu->name }}
                    @if($menus->where('parent_id', $menu->id)->count() > 0)
                      <i class="fas fa-angle-left right"></i>
                    @endif
                  </p>
                </a>
                @if($menus->where('parent_id', $menu->id)->count() > 0)
                  <ul class="nav nav-treeview">
                    @foreach($menus->where('parent_id', $menu->id) as $submenu)
                    <li class="nav-item">
                      <a href="{{ $submenu->route ? route($submenu->route) : '#' }}" class="nav-link">
                        <i class="nav-icon far {{ $submenu->icon }}"></i>
                        <p>{{ $submenu->name }}</p>
                      </a>
                    </li>
                    @endforeach
                  </ul>
                @endif
              </li>
              @endif
            @endforeach

        </ul>
      </nav>
    </div>
  </aside>

  @yield('content')

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>ikaruku &copy; 2025.</strong> All rights reserved.
  </footer>
</div>

<!-- Scripts -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ url('dist/js/adminlte.min.js') }}"></script>

<!-- Flash Modal -->
@if(session('success'))
<div class="modal fade" id="flashModal" tabindex="-1" role="dialog" aria-labelledby="flashModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0 shadow-lg rounded">
      <div class="modal-header bg-info text-white align-items-center">
        <i class="fas fa-info-circle mr-2 fa-lg"></i>
        <h6 class="modal-title mb-0" id="flashModalLabel">Success</h6>
        <button type="button" class="close text-white ml-auto" data-dismiss="modal" aria-label="Close" style="opacity: 1;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="mb-0">{{ session('success') }}</p>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-outline-info btn-sm px-4" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#flashModal').modal('show');
  // Auto close after 5 seconds (5000ms)
  setTimeout(function () {
    $('#flashModal').modal('hide');
  }, 3000);
  });
</script>
@endif

<!-- DataTables  & Plugins -->
<script src="{{ url('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ url('/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ url('/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ url('/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ url('/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ url('/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#defaultTable").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "ordering": true
      //"buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#defaultTable_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
