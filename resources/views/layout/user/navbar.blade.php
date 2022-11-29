<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MotoRent</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/user/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/profil">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Order</a>
              </li>
            <li class="nav-item">
              <a class="btn btn-danger" href="{{url('/logout')}}">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <h1>
      Hai , {{ucfirst($user->Username)}}
    </h1>
    