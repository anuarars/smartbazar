<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Продажи | Smartbazar.kz</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('dashboard/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('dashboard/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('dashboard/bundles/bootstrap-social/bootstrap-social.css')}}">
  <link rel="stylesheet" href="{{asset('dashboard/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='{{asset('/img/logo/logo.svg')}}' />
  <script src="https://cdn.tiny.cloud/1/vuko5n8zosfrtuvle80aeae8o7nyj7sm85hwt10pa3bie19s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
  <script>
    const beamsClient = new PusherPushNotifications.Client({
      instanceId: '41acbae0-ec93-4866-bce7-937bff9c4d27',
    });
  
    beamsClient.start()
      .then(() => beamsClient.addDeviceInterest('hello'))
      .then(() => console.log('Successfully registered and subscribed!'))
      .catch(console.error);
  </script>
  {{-- <script src="{{asset('serviceWorker.min.js')}}"></script>
  <script src="{{asset('push.min.js')}}"></script> --}}
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li><a class="text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><span>Выйти</span></a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"> <img alt="image" src="{{asset('img/logo/logo.svg')}}" class="header-logo" /> <span
                class="logo-name">Фасовка</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown">
              <a href="{{route('packer.index')}}" class="nav-link"><i data-feather="monitor"></i><span>Главная</span></a>
            </li>
            <li>
              <a href="#" class="nav-link"><i
                  data-feather="briefcase"></i><span>История</span></a>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <script>window.homeUrl='http://127.0.0.1:8000/';</script>
  <!-- General JS Scripts -->
  <script src="{{asset("dashboard/js/app.min.js")}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset("dashboard/bundles/apexcharts/apexcharts.min.js")}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset("dashboard/js/page/index.js")}}"></script>
  <!-- Template JS File -->
  <script src="{{asset("dashboard/js/scripts.js")}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset("dashboard/js/custom.js")}}"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>