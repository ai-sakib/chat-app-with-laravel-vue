<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="{{ url('public') }}/images/5.png" type="image/png" sizes="16x16">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ url('public') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Styles -->
  <link href="{{ url('public/css/app.css') }}" rel="stylesheet">

  <title>Pro Chat</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <div id="app">
  <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <div class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" @keyup="search" v-model="keyword" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" @click.prevent="search">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                
                <img src="{{ url('public') }}/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ url('public') }}/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ url('public') }}/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
              class="fas fa-th-large"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="{{ url('public') }}/images/5.png" class="brand-image img-circle"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Pro Chat</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            @if(Auth::user()->provider_id == 1)
            <img src="{{ Auth::user()->photo }}" class="img-circle elevation-2" alt="User Image">
            @else
              @if(file_exists(public_path('images/profile/'.Auth::user()->photo)))
                <img src="{{ url('public') }}/images/profile/{{ Auth::user()->photo }}" class="img-circle elevation-2" alt="User Image">
              @else
                <img src="{{ url('public') }}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              @endif
            @endif
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <router-link to="/" onclick="changeActiveStatus(1)" id="menu-1" class="nav-link">
                <i class="nav-icon  fas fa-tachometer-alt"></i>
                <p>Timeline</p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/chat" onclick="changeActiveStatus(10)" id="menu-10" class="nav-link">
                <i class="nav-icon  fas fa-tachometer-alt"></i>
                <p>Chat</p>
              </router-link>
            </li>
            @can('isAdminOrSubAdmin')
            <li class="nav-item">
              <router-link to="/users" onclick="changeActiveStatus(5)" id="menu-5" class="nav-link">
                <i class="nav-icon  fas fa-users"></i>
                <p>Users</p>
              </router-link>
            </li>
            @endcan

            <li class="nav-item">
              <router-link to="/profile" onclick="changeActiveStatus(3)" id="menu-3" class="nav-link">
                <i class="nav-icon  fa fa-user"></i>
                <p>Profile</p>
                </router-link>
            </li>
            @can('isAdminOrSubAdmin')
            <li class="nav-item">
              <router-link to="/developer" onclick="changeActiveStatus(6)" id="menu-6" class="nav-link">
                <i class="nav-icon  fa fa-user"></i>
                <p>Developer</p>
              </router-link>
            </li>
            @endcan
            
            <li class="nav-item">
              <a href="#" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                <i class="nav-icon fa fa-power-off"></i>
                <p>
                  Logout
                  {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              </a>
            </li>
            
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <router-view></router-view>
      <vue-progress-bar></vue-progress-bar>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020 <a href="{{ url('/') }}">Pro Chat</a>.</strong> All rights reserved.
    </footer>
  </div>
</div>
<!-- ./wrapper -->
<script src="{{ url('public/js/app.js') }}" defer></script>
<script type="text/javascript">
  function changeActiveStatus(id){
    $('.nav-link').removeAttr('style');
    $('.nav-link').addClass('router-link-exact-active');
    $('#menu-'+id).attr('style','background-color:#17a2b8; color:white');
  }
</script>
@auth
  <script>
    window.user = @json(auth()->user());
  </script>
@endauth
</body>
</html>
