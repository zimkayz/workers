<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Каталог Сотрудников</title>
  <meta content="Каталог Сотрудников" name="description">
  <meta content="Каталог Сотрудников" name="keywords">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link href="{{asset('admin/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>


  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('employee.index') }}" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Каталог Сотрудников</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">





        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <div class="avatar avatar-blue mr-3" class="rounded-circle">{{ substr(Auth::user()->name  ,0,1) }} {{ substr(Auth::user()->surname  ,0,1) }}</div>

            <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name }}</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Auth::user()->name }}-{{Auth::user()->surname }}</h6>
              <span>{{Auth::user()->role_as }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('adminacc') }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    {{ __('Logout') }} >
                <i class="bi bi-box-arrow-right"></i>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>


  </header>


  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('employee.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin.position') }}">
          <i class="bi bi-dash-circle"></i>
          <span>Должность(Position)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin.skills') }}">
          <i class="bi bi-dash-circle"></i>
          <span> Навык(Skills)</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
        {{ __('Logout') }} >
            <i class="bi bi-box-arrow-right"></i>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

          <span>Logout</span>
        </a>
      </li>

    </ul>


 </aside>

  @yield('content-ad')





  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <script src="{{asset('admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('admin/assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{asset('admin/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{asset('admin/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{asset('admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{asset('admin/assets/vendor/php-email-form/validate.js') }}"></script>


  <script src="{{asset('admin/assets/js/main.js') }}"></script>

</body>

</html>
