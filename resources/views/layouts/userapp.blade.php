<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/lte/dist/css/adminlte.min.css">

  <style>
    /* === THEME RED-BLACK (UI/UX Only) === */

    /* Background utama */
    body {
        background-color: #111;
    }

    /* Navbar */
    .navbar {
        background-color: #000 !important;
    }

    .navbar-brand,
    .nav-link {
        color: #fff !important;
    }

    .navbar-brand .primary {
        color: #e50914 !important;
    }

    .nav-link.active,
    .nav-link:hover {
        color: #e50914 !important;
    }

    /* Card highlight */
    .card-primary.card-outline {
        border-top: 3px solid #e50914;
    }

    /* Sidebar */
    .main-sidebar {
        background-color: #000 !important;
    }

    .nav-sidebar .nav-link.active {
        background-color: #e50914 !important;
        color: #fff !important;
    }

    .nav-sidebar .nav-link:hover {
        background-color: #b0070f !important;
        color: #fff !important;
    }

    /* Footer */
    footer.main-footer {
        background-color: #000 !important;
        color: #fff !important;
    }

    footer a {
        color: #e50914 !important;
    }

    footer a:hover {
        color: #fff !important;
    }

    /* Brand */
    .brand-link {
        background-color: #111 !important;
    }

    .brand-text {
        color: #e50914 !important;
    }

    /* Judul biarkan ikut default AdminLTE */
    h1, h5 {
        color: inherit !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="#" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CV Critical Performance</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item">
            <a href="/user/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-link"></i>
              <p>
                Lihat Website
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Booking     
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/user/bookings" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/user/bookings/history" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Booking</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="/about" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Tentang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/contact" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                kontak
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user/login" class="nav-link">
              <i class="nav-icon fas fa-sign"></i>
              <p>
                Logout
              </p>
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">@yield('title')</h5>
              </div>
              <div class="card-body">

              @yield('content')

              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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
    <strong>Copyright &copy; {{ date('Y') }} <a href="https://cvcriticalperformance.io">CV Critical Performance</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/lte/dist/js/adminlte.min.js"></script>
</body>
</html>
