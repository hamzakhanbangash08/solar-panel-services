<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!--  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Notyf JS (body end ya head mein) -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" href="{{ asset('asset/css/custom/custom.css') }}">



    <style>
        /* Default logo size */
        .responsive-logo {
            height: 50px;
            width: auto;
            transition: all 0.3s ease;
        }

        /* Responsive logo size on smaller screens */
        @media (max-width: 600px) {
            .responsive-logo {
                height: 35px;
            }

            .logo-text {
                display: none;
                /* Hide text on mobile */
            }
        }


        .navbar-nav .nav-link {
            font-weight: 500;
            color: #333;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color);
            /* Bootstrap primary */
        }

        .navbar-brand img {
            height: 40px;
            object-fit: contain;
        }

        nav.navbar {
            position: sticky;
            top: 0;
            z-index: 1030;
        }


        .custom-link {
            color: #333;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .custom-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0%;
            height: 2px;
            background-color: var(--primary-color);
            /* theme color */
            transition: width 0.3s ease;
        }

        .custom-link:hover {
            color: var(--primary-color);
            ;
        }

        .custom-link:hover::after {
            width: 100%;
        }

        .active-link {
            color: #f38734 !important;
        }

        .active-link::after {
            width: 100%;
        }

        #userDropdown img:hover {
            cursor: pointer;
            box-shadow: 0 0 0 2px #f38734;
        }


        /* footer */

        .app-footer {
            background-color: #f8f9fa;
            font-size: 0.9rem;
            color: #6c757d;
            transition: all 0.3s ease-in-out;
        }

        .app-footer strong {
            color: #ffa500;
        }

        @media (prefers-color-scheme: dark) {
            .app-footer {
                background-color: #1e1e1e;
                color: #ccc;
                border-top-color: #333;
            }

            .app-footer strong {
                color: #ffb84d;
            }
        }
    </style>
    @yield('styles')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-2">
            <div class="container d-flex justify-content-between align-items-center">

                {{-- Left: Logo --}}
                <a class="navbar-brand d-flex align-items-center gap-2 logo-brand" href="{{ url('/') }}">
                    <div class="logo-container d-flex align-items-center gap-2">
                        <img src="{{ asset('asset/images/solarlogo.png') }}" alt="Logo" class="responsive-logo">
                        <div class="logo-text">
                            <span class="brand-main">Solar</span>
                            <span class="brand-sub">Panel Services</span>
                        </div>
                    </div>
                </a>

                {{-- Toggler for mobile --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- Center: Links + Right Section --}}
                <div class="collapse navbar-collapse justify-content-between" id="navbarContent">

                    {{-- Center Nav --}}
                    <ul class="navbar-nav mx-auto mb-2 mb-md-0 d-flex align-items-center gap-4">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold px-2 py-1 position-relative custom-link {{ Request::routeIs('homepage') ? 'active-link' : '' }}" href="{{ route('homepage') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold px-2 py-1 position-relative custom-link {{ Request::routeIs('products') ? 'active-link' : '' }}" href="{{ route('products') }}">
                                Product
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold px-2 py-1 position-relative custom-link {{ Request::routeIs('servicepage') ? 'active-link' : '' }}" href="{{ route('servicepage') }}">
                                Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold px-2 py-1 position-relative custom-link {{ Request::routeIs('aboutpage') ? 'active-link' : '' }}" href="{{ route('aboutpage') }}">
                                About
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-semibold px-2 py-1 position-relative custom-link {{ Request::routeIs('contactpage') ? 'active-link' : '' }}" href="{{ route('contactpage') }}">
                                Contact Us
                            </a>
                        </li>
                    </ul>


                    {{-- Right Section --}}
                    <ul class="navbar-nav ms-auto align-items-center gap-3">
                        @auth
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <i class="bi bi-cart3 fs-5 textcolor"></i>
                                @php
                                $unseenCount = \App\Models\Cart::where('user_id', auth()->id())->where('viewed', false)->count();
                                @endphp
                                @if($unseenCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $unseenCount }}
                                </span>
                                @endif
                            </a>
                        </li>

                        {{-- User Profile Dropdown --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link d-flex align-items-center gap-2" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" style="padding: 0;">

                                {{-- Profile Image --}}
                                @if(Auth::user()->profile_image)
                                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile"
                                    class="rounded-circle border" width="36" height="36" style="object-fit: cover;">
                                @else
                                <i class="bi bi-person-circle fs-4"></i>
                                @endif
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                        <i class="bi bi-person-lines-fill me-2"></i> Profile Settings
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>


                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>


        <main class="">
            <div class="container-fluid m-0 p-0">
                @yield('pageTitle')
                @yield('content')
            </div>
        </main>

        <!--begin::Footer-->
        <footer class="app-footer py-3 px-4 mt-5 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center text-muted">
            <div class="footer-left mb-2 mb-sm-0">
                <strong>Copyright &copy; <span class="me-2" id="currentYear"></span></strong>@lang('All rights reserved.')

            </div>
            <div class="footer-right small">
                @lang('Ecommerce Website for Solar Panel Services')
            </div>
        </footer>



        <!--end::Footer-->

    </div>

    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('
            success ') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#currentYear').text(new Date().getFullYear());
        });
    </script>

    <!--end::Scripts-->
</body>



</html>