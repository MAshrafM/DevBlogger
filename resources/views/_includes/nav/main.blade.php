<nav class="navbar has-shadow">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item" href="{{route('home')}}">
        <img src="{{ asset('images/logo.png')}}" alt="logo" />
      </a>
      
      @if (Request::segment(1) == "manage")
        <a class="navbar-item is-hidden-desktop" id="admin-slide-button">
          <span class="icon">
            <i class="fa fa-arrow-circle-right"></i>
          </span>
        </a>
      @endif
      
      <a role="button" class="button navbar-burger" aria-label="menu" aria-expanded="false">
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
            <a class="navbar-link">Hi, {{ Auth::user()->name }}</a>
            <div class="dropdown-menu navbar-dropdown">
              <a class="navbar-item" href=""><span class="icon"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i></span> Profile</a>
              <a class="navbar-item" href=""><span class="icon"><i class="fa fa-fw m-r-10 fa-bell"></i></span> Notification</a>
              <a class="navbar-item" href="{{route('manage.dashboard')}}"><span class="icon"><i class="fa fa-fw m-r-10 fa-cog"></i></span> Settings</a>
              <hr class="navbar-divider">
              <a class="navbar-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="icon"><i class="fa fa-fw m-r-10 fa-sign-out"></i></span> Logout</a>
              @include('_includes.forms.logout')
            </div>
          </div>
        @endauth
      </div>
    </div>
  </div>
</nav>