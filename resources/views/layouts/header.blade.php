<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-success fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="{{ url('/') }}">Movie Db</a>

            <!-- Toggle Button (Mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Left Menu -->
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('navhome')" href="{{ route('home') }}">Home</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link @yield('navMovie')" href="{{ url('/movies') }}">Input Movie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('navCategories')" href="{{ url('/categories') }}">Categories</a>
                        </li>
                    @endauth
                </ul>

                <!-- Search Form -->
                @auth
                    <form class="d-flex me-3" role="search" method="GET" action="{{ url('/movies') }}">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search movies..."
                            aria-label="Search" value="{{ request('search') }}">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                @endauth

                <!-- Right Side Menu -->
                <ul class="navbar-nav">
                    @auth
                        <!-- Dropdown User -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="accountDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                                        @csrf
                                        <button type="submit" class="btn w-100 text-start">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <!-- Login Menu -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
