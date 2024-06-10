<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    {{-- <link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon" /> --}}

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}?v2" />

    {{-- import css --}}
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v2">
</head>

<body>
    <!--  Body Wrapper -->
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ url('super-admin/dashboard') }}" class="text-nowrap logo-img">
                        <img src="{{ asset('assets/dashboard-logo.png') }}" style="width: 180px" />
                    </a>
                    <a href="javascript:void(0)"
                        class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                        <i class="ti ti-x"></i>
                    </a>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('super-admin/dashboard') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"component></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link-view" href="{{ route('super-admin.view') }}" target="blank"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-browser"></i>
                                </span>
                                <span class="hide-menu">View Site</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">COMPONENTS DATA</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('super-admin/component') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Component</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('super-admin/category') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-category"></i>
                                </span>
                                <span class="hide-menu">Category</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('super-admin/year') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Version</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">SETTINGS</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('super-admin/adminAccount') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Admin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('super-admin/changePassword') }}"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-lock"></i>
                                </span>
                                <span class="hide-menu">Password</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">ACCOUNT</span>
                        </li>
                        <li class="sidebar-item">
                            <form action="{{ route('super-admin.logout') }}"method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="sidebar-link-view sidebar-logout" aria-expanded="false" type="submit">
                                    <span>
                                        <i class="ti ti-logout"></i>
                                    </span>
                                    <span class="hide-menu">Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                <div class="with-vertical">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                                    href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                                <li class="nav-item">
                                    <a class="nav-link" id="drop2">
                                        <span class="user-title">Hi, {{ Auth::user()->name }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="app-header with-horizontal">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item d-block d-xl-none">
                                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                                    href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                            <li class="nav-item d-none d-xl-block">
                                <a href="{{ url('super-admin/dashboard') }}" class="text-nowrap nav-link">
                                    <img src="{{ asset('assets/dashboard-logo.png') }}" class="light-logo"
                                        width="180" />
                                    <img src="{{ asset('assets/dashboard-logo.png') }}" class="dark-logo"
                                        width="180" />
                                </a>
                            </li>
                        </ul>
                        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                                <li class="nav-item">
                                    <a class="nav-link" id="drop2">
                                        <span class="user-title">Hi, {{ Auth::user()->name }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <!--  Header End -->

            {{-- sidebar horizontal --}}
            <aside class="left-sidebar with-horizontal">
                <!-- Sidebar scroll-->
                <div>
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav scroll-sidebar container-fluid">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Home</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-home-2"></i>
                                    </span>
                                    <span class="hide-menu">Home</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item selected">
                                        <a href="{{ url('super-admin/dashboard') }}" class="sidebar-link active">
                                            <i class="ti ti-aperture"></i>
                                            <span class="hide-menu">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('super-admin.view') }}" class="sidebar-link active">
                                            <i class="ti ti-browser"></i>
                                            <span class="hide-menu">View Site</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <div class="body-wrapper">
                <div class="container-fluid" style="max-width: 100%">
                    <!--  Row 1 -->
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.init.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>

    @yield('js')

</body>

</html>
