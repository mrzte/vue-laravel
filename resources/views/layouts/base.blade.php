
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

  <title>Salasah</title>
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/app.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Beranda</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    Keluar
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/logo/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">POS Salasah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/profile/{{ Auth::user()->photo }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }} <br> 
          <span class="ml-1 right badge badge-success">{{ Auth::user()->level }}</span></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <router-link to="/dasbor" class="nav-link" active-class="active" exact>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dasbor
              </p>
            </router-link>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link" active-class="active" exact>
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Informasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/profil" class="nav-link" active-class="active" exact>
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Profil Pengguna</p>
                </router-link>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link" active-class="active" exact>
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Pesanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/offline" class="nav-link" active-class="active" exact>
                  <i class="fas fa-pen-square nav-icon"></i>
                  <p>Pesanan Offline</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/online" class="nav-link" active-class="active" exact>
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Pesanan Online</p>
                </router-link>
              </li>
              
            </ul>
          </li>
          @can('admin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link" active-class="active" exact>
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Manajemen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ml-2">
                <router-link to="/pengguna" class="nav-link" active-class="active" exact>
                  <i class="fas fa-user nav-icon"></i>
                  <p>Pengguna</p>
                </router-link>
              </li>
              <li class="nav-item ml-2">
                <router-link to="/toko" tag="a" class="nav-link" active-class="active" exact>
                  <i class="fas fa-university nav-icon"></i>
                  <p>Toko</p>
                </router-link>
              </li>
              <li class="nav-item ml-2">
                <router-link to="/konten" tag="a" class="nav-link" active-class="active" exact>
                  <i class="fas fa-th nav-icon"></i>
                  <p>Konten</p>
                </router-link>
              </li>
            </ul>
          </li>
          @endcan
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link" active-class="active" exact>
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Pokok
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ml-2">
                <router-link to="/produk" tag="a" class="nav-link" active-class="active" exact>
                  <i class="fas fa-chart-bar nav-icon"></i>
                  <p>Produk</p>
                </router-link>
              </li>
              <li class="nav-item ml-2">
                <router-link to="/reseller" class="nav-link" active-class="active" exact>
                  <i class="fas fa-chart-line nav-icon"></i>
                  <p>Reseller</p>
                </router-link>
              </li>
              <li class="nav-item ml-2">
                <router-link to="/pertanyaan" tag="a" class="nav-link" active-class="active" exact>
                  <i class="fas fa-inbox nav-icon"></i>
                  <p>Pertanyaan</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link" active-class="active" exact>
              <i class="nav-icon fas fa-globe-asia"></i>
              <p>
                Domisili
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ml-2">
                <router-link to="/provinsi" class="nav-link" active-class="active" exact>
                  <i class="fas fa-map-marked-alt nav-icon"></i>
                  <p>Provinsi</p>
                </router-link>
              </li>
              <li class="nav-item ml-2">
                <router-link to="/kota" tag="a" class="nav-link" active-class="active" exact>
                  <i class="fas fa-city nav-icon"></i>
                  <p>Kota/Kabupaten</p>
                </router-link>
              </li>
             
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid mt-4" id="app">
      <router-view></router-view>
      <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
      <div class="container-fluid">
      @yield('konten')
      </div>
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
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
@auth
  <script>
   window.user = @json(auth()->user())
  </script>
 @endauth  
<script src="/js/app.js"></script>
@stack('scripts')
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Kata Sandi tidak cocok");
  } else {
    
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>
