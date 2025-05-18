<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">Movie</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link @yield('navhome')" href="{{ url('/home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('navMovie')" href="{{ url('/movies') }}">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('navCategories')" href="{{ url('/categories') }}">Categories</a>
          </li>
        </ul>
        <form class="d-flex" role="search" method="GET" action="{{ url('/movies') }}">
          <input class="form-control me-2" type="search" name="search" placeholder="Search movies..." aria-label="Search" value="{{ request('search') }}">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>
