<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MotoRent</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link @yield('home')"  href="/user/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('profile')" href="/user/profil">Profile</a>
            </li>
        </ul>
          <a class="btn btn-danger" href="{{url('/logout')}}">Logout</a>
        </div> --}}
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link @yield('home')"  href="/user/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('profile')" href="/user/profil">Profile</a>
            </li>
        </ul>
    </div>
    <a class="btn btn-danger" href="{{url('/logout')}}">Logout</a>
</nav>
<h1>
    Hai , {{ucfirst($user->Username)}}
</h1>
