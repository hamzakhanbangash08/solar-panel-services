    <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">


            <!--begin::Start Navbar Links-->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                        <i class="bi bi-list"></i>
                    </a>
                </li>
                <!-- <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
                <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li> -->
            </ul>
            <!-- Left Side Of Navbar -->


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">


                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown d-flex align-items-center gap-2">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        {{-- Profile Image --}}
                        @if(Auth::user()->profile_image)
                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile"
                            class="rounded-circle" width="32" height="32" style="object-fit: cover;">
                        @else
                        <i class="bi bi-person-circle fs-4"></i>
                        @endif

                        {{-- Name --}}
                        <!-- <span>{{ Auth::user()->name }}</span> -->
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                            <i class="bi bi-person"></i> Dashboard
                        </a>
                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                            <i class="bi bi-gear"></i> Profile Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
        <!--end::Container-->
    </nav>