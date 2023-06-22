<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | Zainik Task</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{url('assets/img/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{url('assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{url('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{url('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{url('assets/css/demo.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{url('assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{url('assets/vendor/js/helpers.js')}}"></script>

    <script src="{{url('assets/js/config.js')}}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="   @if(Auth::guard('customer')->check())
                                    {{url('customer/dashboard')}}
                                @elseif(Auth::guard('admin')->check())
                                    {{url('admin/dashboard')}}
                                @endif
                    " class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{url('assets/img/favicon.ico')}}" alt="Brand Logo" class="img-fluid" />
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Zainik Task</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item @if(Request::segment(2) == 'dashboard') active @endif">
                        <a href="  @if(Auth::guard('customer')->check())
                                    {{url('customer/dashboard')}}
                                @elseif(Auth::guard('admin')->check())
                                    {{url('admin/dashboard')}}
                                @endif
                        " class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme layout-navbar-fixed" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        @if(Auth::guard('customer')->check())
                                            @if(Auth::guard('customer')->user()->avatar)
                                                <img src="{{ asset('avatars/' . auth()->guard('customer')->user()->avatar) }}" alt="" class="w-px-40 h-auto rounded-circle" />
                                            @else
                                                <img src="{{url('assets/img/avatar.png')}}" alt="" class="w-px-40 h-auto rounded-circle" />
                                            @endif
                                        @elseif(Auth::guard('admin')->check())
                                            @if(Auth::guard('admin')->user()->avatar)
                                                <img src="{{ asset('avatars/' . auth()->guard('admin')->user()->avatar) }}" alt="" class="w-px-40 h-auto rounded-circle" />
                                            @else
                                                <img src="{{url('assets/img/avatar.png')}}" alt="" class="w-px-40 h-auto rounded-circle" />
                                            @endif
                                        @endif
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                    @if(Auth::guard('customer')->check())
                                                        @if(Auth::guard('customer')->user()->avatar)
                                                            <img src="{{ asset('avatars/' . auth()->guard('customer')->user()->avatar) }}" alt="" class="w-px-40 h-auto rounded-circle" />
                                                        @else
                                                            <img src="{{url('assets/img/avatar.png')}}" alt="" class="w-px-40 h-auto rounded-circle" />
                                                        @endif
                                                    @elseif(Auth::guard('admin')->check())
                                                        @if(Auth::guard('admin')->user()->avatar)
                                                            <img src="{{ asset('avatars/' . auth()->guard('admin')->user()->avatar) }}" alt="" class="w-px-40 h-auto rounded-circle" />
                                                        @else
                                                            <img src="{{url('assets/img/avatar.png')}}" alt="" class="w-px-40 h-auto rounded-circle" />
                                                        @endif
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">
                                                        @if(Auth::guard('customer')->check())
                                                            {{Auth::guard('customer')->user()->name}}
                                                        @elseif(Auth::guard('admin')->check())
                                                            {{Auth::guard('admin')->user()->name}}
                                                        @endif
                                                    </span>
                                                    <small class="text-muted">
                                                        @if(Auth::guard('customer')->check())
                                                            Customer
                                                        @elseif(Auth::guard('admin')->check())
                                                            Admin
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn p-0 ps-5"><i class="bx bx-power-off me-1"></i>Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                @yield('content')
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{url('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{url('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{url('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{url('assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{url('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{url('assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{url('assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(

            );
        });
    </script>
    @yield('script')
</body>

</html>