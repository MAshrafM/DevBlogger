<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DevBlogger</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <nav class="navbar has-shadow">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="{{route('home')}}">
            <img src="{{ asset('images/logo.png')}}" alt="logo" />
          </a>
          
          <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
        <div class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item is-tab m-l-10">
            Learn
            </a>
            <a class="navbar-item is-tab">
            Discuss
            </a>
            <a class="navbar-item is-tab">
            Share
            </a>
          </div>
          <div class="navbar-end">
            @guest
              <a class="navbar-item is-tab" href="{{ route('login')}}"> Login </a>
              <a class="navbar-item is-tab" href="{{ route('register')}}"> Join Us </a>
            @endguest
            @auth
              <div class="dropdown navbar-item is-tab has-dropdown is-aligned-right is-hoverable">
                <a class="navbar-link">Hi, User</a>
                <div class="dropdown-menu navbar-dropdown">
                  <a class="navbar-item" href=""><span class="icon"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i></span> Profile</a>
                  <a class="navbar-item" href=""><span class="icon"><i class="fa fa-fw m-r-10 fa-bell"></i></span> Notification</a>
                  <a class="navbar-item" href=""><span class="icon"><i class="fa fa-fw m-r-10 fa-cog"></i></span> Settings</a>
                  <hr class="navbar-divider">
                  <a class="navbar-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="icon"><i class="fa fa-fw m-r-10 fa-sign-out"></i></span> Logout</a>
                </div>
              </div>
            @endauth
          </div>
        </div>
      </div>
    </nav>
      <main class="py-4">
          @yield('content')
      </main>
    </div>
</body>
</html>
