<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title }} &mdash; SISPAK</title>
    <link rel="shortcut icon" href="{{ asset('template/dist') }}/assets/img/stisla-fill.svg" type="image/x-icon">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ asset('template/dist') }}/assets/css/components.css">
</head>

<body class="bg-dark">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('template/dist') }}/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            @error('error')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @session('success')
                <div class="alert alert-success">{{ session('success') }}</div>
            @endsession
            @yield('content')
            <div class="simple-footer">
              Copyright &copy; SISPAK {{ date('Y') }}
            </div>
          </div>
        </div>
      </div>
    </section>
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

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('template/dist') }}/assets/js/scripts.js"></script>
  <script src="{{ asset('template/dist') }}/assets/js/custom.js"></script>
</body>
</html>