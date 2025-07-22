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
    <!-- <link rel="stylesheet" href="{{ asset('assets2/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets2/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets2/images/favicon.png') }}" />
</head>

<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <!-- <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <a class="navbar-brand brand-logo me-5 d-flex" href=""><img src="{{ asset('geokrantilogo.jpg') }}"
                    class="me-2" alt="logo" style="width: 40px;" />
                <h3>Piyush</h3>
            </a>
           
        </div> -->
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
                        <a href="{{ route('user.profile') }}" class="dropdown-item">
                            <i class="ti-settings text-primary"></i> Profile </a>
                        <a class="dropdown-item" href="">
                            <i class="ti-power-off text-primary"></i>
                            <form action="{{ route('logout') }}" method="get">
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
                    <a class="nav-link " href="{{ route('user.dashboard') }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('user.view') }}">
                        <i class="fa fa-sitemap menu-icon"></i>
                        <span class="menu-title">User Tree</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('user.viewwallet') }}">
                        <i class="fa fa-money menu-icon"></i>
                        <span class="menu-title">Wallet Management</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('package2.purchase') }}">
                        <i class="fa fa-money menu-icon"></i>
                        <span class="menu-title">Package Purchase</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('user.packages') }}">
                        <i class="fa fa-money menu-icon"></i>
                        <span class="menu-title">My Packages</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="../Geokranti.com.pdf" download>
                        <i class="fa fa-download menu-icon"></i>
                        <span class="menu-title">Download Pdf</span>
                    </a>
                </li>

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
    <script src="{{ asset('assets2/vendors/chart.js/chart.umd.js') }}"></script>>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
    <!-- <script src="{{ asset('assets2/vendors/datatables.net/jquery.dataTables.js') }}"></script> -->
    <!-- <script src="{{ asset('assets2/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script> -->
    <script src="{{ asset('assets2/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets2/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets2/js/template.js') }}"></script>
    <script src="{{ asset('assets2/js/settings.js') }}"></script>
    <script src="{{ asset('assets2/js/todolist.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets2/js/dashboard.js') }}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
    @stack('scripts')

</body>

</html>