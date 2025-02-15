<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Admin panel built by Codehub Care" />
    <meta name="author" content="codehubcare.com" />
    <title>@yield('page-title', 'Admin panel')</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('vendor/moderyat/app.css') }}">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="text-center navbar-brand ps-3" href="{{ route('dashboard') }}">
            <img src="{{ asset('vendor/moderyat/images/logo.svg') }}" alt="Moderyat" class="me-2" style="height: 30px;">
        </a>
        <!-- Sidebar Toggle-->
        <button class="order-1 btn btn-link btn-sm order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="mx-auto navbar-nav me-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('change-password.index') }}">
                            Change Password
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('settings.index') }}">
                            Settings
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"
                            onclick="document.getElementById('form-logout').submit()">
                            Logout
                        </a>
                    </li>
                    <form id="form-logout" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        @include('moderyat::layout.sidenav')
        <div id="layoutSidenav_content">
            <main>
                <div class="px-4 py-3 pt-4 container-fluid">
                    @include('moderyat::layout.partials.alerts')
                    @yield('content')
                </div>
            </main>
            <footer class="py-4 mt-auto bg-light">
                <div class="px-4 container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">&copy; {{ date('Y') }} Codehubcare.com</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('vendor/moderyat/app.js') }}"></script>
</body>

</html>
