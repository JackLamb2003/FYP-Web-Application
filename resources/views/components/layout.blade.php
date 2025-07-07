<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <div class="topnav">
      <div id="navlist" class="nav-list">
        <a href="/drivers/home">Home</a>
        <a href="/drivers">Drivers</a>
        <div class="dropdown">
          <button onclick="dropDownMenu('schedule')" class="dropbtn">Schedule ↓</button>
          <div id="schedule" class="dropdown-content">
            <a href="/tracks/longbeach">Long Beach</a>
            <a href="/tracks/atlanta">Atlanta</a>
            <a href="/tracks/orlando">Orlando</a>
            <a href="/tracks/englishtown">E-Town</a>
            <a href="/tracks/stlouis">St.Louis</a>
            <a href="/tracks/seattle">Seattle</a>
            <a href="/tracks/grantsville">Grantsville</a>
            <a href="/tracks/irwindale">Irwindale</a>
          </div>
        </div>
        @can('admin')
        <a href="/drivers/create">Add a new driver</a>
        @endcan
        <a href="/predictions">Predictions</a>
        @auth
        <div class="name">
          <span>Logged in as {{ Auth::user()->name }}</span>
        </div>
        @endauth
        <div class="right-side">
          <form action="{{ route('look') }}" method="GET">
            <input type="text" name="search" placeholder="Search.." value="{{ request()->input('search') }}">
          </form>
          <div class="dropdown">
            <button onclick="dropDownMenu('account')" class="dropbtn">Account ↓</button>
            <div id="account" class="dropdown-content" style="position: absolute; right: 0;">
              @guest
                <a href="/login">Sign in</a>
                <a href="/registration">Create Account</a>
              @endguest
              @auth
                <a href="/profile">Profile</a>
              @endauth
              <a href="/password">Reset Password</a>
              @auth
                <div>
                  <form method='POST' action='/logout'>
                    @csrf
                    <button type='submit'>Logout</button>
                  </form>
                </div>
              @endauth
            </div>
          </div>
        </div>
      </div>
    </div>
    {{$slot}}

    <script>
      function dropDownMenu(id) {
        document.getElementById(id).classList.toggle("show");
      }

      // Close the dropdown menu if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            if (dropdowns[i].classList.contains('show')) {
              dropdowns[i].classList.remove('show');
            }
          }
        }
      }
    </script>
  </body>
</html>