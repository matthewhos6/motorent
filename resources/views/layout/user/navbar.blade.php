<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/user')}}/user">MotoRent</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link @yield('profile')" href="{{url('/user/profil')}}">Profile</a>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/logout')}}">Logout</a>
        </li>
    </ul>
</nav>
