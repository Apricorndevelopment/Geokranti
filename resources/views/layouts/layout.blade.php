<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Geo Kranti Admin</title>
    <link rel="stylesheet" href="{{ asset('assets2/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="{{ asset('assets2/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets2/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets2/images/favicon.png') }}" />
</head>

<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
             <a class="navbar-brand brand-logo me-5 d-flex align-items-center" href="">
                <img src="{{ asset('geokrantilogo.jpg') }}" alt="logo"
                    style="width: 55px; height: 55px; object-fit: cover;" class="me-2" />
                <h3 class="mb-0">Piyush</h3>
            </a>
             <a class="navbar-brand brand-logo-mini" href=""><img src="{{ asset('geokrantilogo.jpg') }}"
                    alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                            <span class="input-group-text" id="search">
                                <i class="icon-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                            aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                        data-bs-toggle="dropdown">
                        <i class="icon-bell mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0 text-muted"> Just now </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="ti-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Settings</h6>
                                <p class="font-weight-light small-text mb-0 text-muted"> Private message </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="ti-user mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                <p class="font-weight-light small-text mb-0 text-muted"> 2 days ago </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item nav-profile dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <?php

                        use Illuminate\Support\Facades\Auth;
                        $user = Auth::user();
                        ?>
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="Profile Picture">
                        @else
                        <img src="{{ asset('assets2/images/faces/face28.jpg') }}" alt="profile" />
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a href="{{ route('admin.profile') }}" class="dropdown-item">
                            <i class="ti-settings text-primary"></i> Profile </a>
                        <a class="dropdown-item" href="">
                            <i class="ti-power-off text-primary"></i>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <input type="submit" value="logout"
                                    style="border: none; background: none; color: inherit; cursor: pointer;">
                            </form>
                        </a>
                    </div>
                </li>

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                @php

                    $adminId = Auth::guard('admin')->id();
                @endphp

                <li class="nav-item">
                    <a class="nav-link {{  Route::is('admin.user.tree') ? 'active' : '' }}"
                        href="{{ route('admin.user.tree', $adminId) }}">
                        <i class="fa fa-sitemap menu-icon"></i>
                        <span class="menu-title">Admin User Tree</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.viewmember') ? 'active' : '' }}"
                        href="{{ route('admin.viewmember') }}">
                        <i class="fa fa-users menu-icon"></i>
                        <span class="menu-title">User/Member</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.viewwallet') ? 'active' : '' }}"
                        href="{{ route('admin.wallet') }}">
                        <i class="fa fa-money menu-icon"></i>
                        <span class="menu-title">Wallet Management</span>
                    </a>
                </li>

              
              
                <!-- <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                        aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Form elements</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-elements">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic
                                    Elements</a></li>
                        </ul>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false"
                        aria-controls="charts">
                        <i class="icon-bar-graph menu-icon"></i>
                        <span class="menu-title">Charts</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                        aria-controls="tables">
                        <i class="fa fa-suitcase menu-icon"></i>
                        <span class="menu-title">Package Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link {{ Route::is('admin.package') ? 'active' : '' }}" href="{{ route('admin.package') }}">View
                                    </a></li>
                            <li class="nav-item"> <a class="nav-link {{ Route::is('admin.packages.assign') ? 'active' : '' }}" href="{{ route('admin.packages.assign') }}">Active
                                    </a></li>
                        </ul>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#tables1" aria-expanded="false"
                        aria-controls="tables">
                        <i class="fa fa-suitcase menu-icon"></i>
                        <span class="menu-title">Profit Distribution</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="tables1">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.profit.distribution') }}">Distrubute Profit
                                    </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.view.monthlyDistribution') }}">View Monthly Profit
                                    </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.view.distribution') }}">View Yearly Profit
                                    </a></li>
                        </ul>

                    </div>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false"
                        aria-controls="icons">
                        <i class="icon-contract menu-icon"></i>
                        <span class="menu-title">Icons</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="icons">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                        aria-controls="auth">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">User Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html">
                                    Register </a></li>
                        </ul>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#error" aria-expanded="false"
                        aria-controls="error">
                        <i class="icon-ban menu-icon"></i>
                        <span class="menu-title">Error pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="error">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404
                                </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500
                                </a></li>
                        </ul>
                    </div>
                </li> -->
              
            </ul>
        </nav>

        {{-- <section class="main-content"> --}}
            {{-- <div class="section__content"> --}}

                @section('container') @show

                {{-- </div>
        </section> --}}
    </div>
    </div>
    <script src="{{ asset('assets2/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets2/vendors/chart.js/chart.umd.js') }}"></script>
    <!-- <script src="{{ asset('assets2/vendors/datatables.net/jquery.dataTables.js') }}"></script> -->
    <!-- <script src="{{ asset('assets2/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script> -->
    <script src="{{ asset('assets2/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets2/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets2/js/template.js') }}"></script>
    <script src="{{ asset('assets2/js/settings.js') }}"></script>
    <script src="{{ asset('assets2/js/todolist.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets2/js/dashboard.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>