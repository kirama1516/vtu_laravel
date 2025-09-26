<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        
      <!-- HEADER -->
        <header class="container-fluid p-2 bg-light border-bottom shadow-sm">
            <div class="d-flex justify-content-between align-items-center px-3">
                <div class="d-flex align-items-center">
                    <button class="btn menu me-2" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                        ☰
                    </button>
                    <h5 class="fw-semibold mb-0"><span class="text-dark">{{ Auth::user()->username }}</span></h5>
                </div>
                <div class="col-2 d-flex justify-content-end">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset("images/profileIcon.png")}}" alt="User" width="40" height="40" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item text-color" href="profile.php"><i class="bi bi-pencil"></i> Edit Profile</a></li>
                            <li><a class="dropdown-item text-color" href="settings.php"><i class="bi bi-gear"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="{{route('auth.logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                            <form id="logout-form" action="{{ route('auth.logout')}}" method="POST" style="display: none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- SIDEBAR (Offcanvas) -->
        <div class="offcanvas offcanvas-start w-75" tabindex="-1" id="sidebar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('admin.dashboard') }}" class="text-color text-decoration-none"><i class="bi bi-speedometer2"></i> Dashboard</a>
                    </li>
                    <!-- <li class="list-group-item">
                        <a href="energy-customer.php" class="text-color text-decoration-none"><i class="bi bi-people"></i> Energy Customer</a>
                    </li> -->
                    <li class="list-group-item">
                        <a href="{{ route('service.index') }}" class="text-color text-decoration-none"><i class="bi bi-gear"></i> Services</a>
                    </li>
                    <li class="list-group-item">
                        <a href="order.php" class="text-color text-decoration-none"><i class="bi bi-cart-check"></i> Order</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('biller.index') }}" class="text-color text-decoration-none"><i class="bi bi-receipt"></i> Biller</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('package.index') }}" class="text-color text-decoration-none"><i class="bi bi-box"></i> Package</a>
                    </li>
                    <li class="list-group-item">
                        <a href="update-password.php" class="text-color text-decoration-none"><i class="bi bi-key"></i> Update Password</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('category.index') }}" class="text-color text-decoration-none"><i class="bi bi-tags"></i> Category</a>
                    </li>
                    <li class="list-group-item">
                        <a href="annoucement.php" class="text-color text-decoration-none"><i class="bi bi-megaphone"></i> Announcement</a>
                    </li>
                    <li class="list-group-item">
                        <a href="transactions.php" class="text-color text-decoration-none"><i class="bi bi-chat-dots"></i> Transaction</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('users_log.index') }}" class="text-color text-decoration-none"><i class="bi bi-list-check"></i> Users Log</a>
                    </li>
                </ul>
            </div>
        </div>

       @if (session('message'))
            <div class="mx-3 alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mx-3 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    </body>
</html>