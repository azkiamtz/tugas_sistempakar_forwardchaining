<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title }} &mdash; SISPAK</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/components.css">
  @stack('css')
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('template/dist') }}/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
           
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">SISPAK</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SP</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Master Data</li>
            <li class="{{ ($active == "indication" ? "active" : "") }}"><a class="nav-link" href="{{ route('indication.index') }}"><i class="fas fa-table"></i><span>Data Gejala</span></a></li>
            <li class="{{ ($active == "disease" ? "active" : "") }}"><a class="nav-link" href="{{ route('disease.index') }}"><i class="fas fa-pills"></i><span>Data Penyakit</span></a></li>
            {{-- <li class="{{ ($active == "patient" ? "active" : "") }}"><a class="nav-link" href="{{ route('patient.index') }}"><i class="fas fa-users"></i><span>Data Pasien</span></a></li> --}}
          </ul>
          </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{ $title }}</h1>
          </div>

          <div class="section-body">
            @session('success')
                <div class="alert alert-success">{{ session('success') }}</div>
            @endsession
            @yield('content')
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; {{ date('Y') }} <div class="bullet"></div> SISPAK
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('template/dist') }}/assets/modules/jquery.min.js"></script>
  <script src="{{ asset('template/dist') }}/assets/modules/popper.js"></script>
  <script src="{{ asset('template/dist') }}/assets/modules/tooltip.js"></script>
  <script src="{{ asset('template/dist') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ asset('template/dist') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="{{ asset('template/dist') }}/assets/modules/moment.min.js"></script>
  <script src="{{ asset('template/dist') }}/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('template/dist') }}/assets/modules/datatables/datatables.min.js"></script>
  <script src="{{ asset('template/dist') }}/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <!-- Page Specific JS File -->
  <script>
    function datatable(){
      $("#table").dataTable();
    }
  </script>
  <!-- Template JS File -->
  <script src="{{ asset('template/dist') }}/assets/js/scripts.js"></script>
  <script src="{{ asset('template/dist') }}/assets/js/custom.js"></script>

  @stack('js')
</body>
</html>