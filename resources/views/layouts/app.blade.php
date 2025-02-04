<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.head') <!-- Phần <head> -->
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> --}}

                <!-- Messages Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li> --}}
                <!-- Notifications Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> --}}
                <!-- Language Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-0">
                        <a href="#" class="dropdown-item active">
                            <i class="flag-icon flag-icon-us mr-2"></i> English
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="flag-icon flag-icon-jp mr-2"></i> 日本語
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="flag-icon flag-icon-vn mr-2"></i> Tiếng Việt
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ Vite::asset('resources/images/adminlte/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">PMO Assistant</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Vite::asset('resources/images/adminlte/user2-160x160.jpg') }}"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="user-panel mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        @role('admin')
                            <li class="nav-item {{ request()->is('tenants*') ? 'menu-open' : '' }}">
                                <a href="pages/gallery.html"
                                    class="nav-link {{ request()->is('tenants*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-briefcase"></i>
                                    <p>
                                        Tenant setting
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('tenants.index') }}"
                                            class="nav-link {{ request()->is('tenants*') && !request()->routeIs('tenants.create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tenants</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('tenants.create') }}"
                                            class="nav-link {{ request()->routeIs('tenants.create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tenant Add</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endrole
                        @role('client')
                            <li class="nav-item {{ request()->is('projects*') ? 'menu-open' : '' }}">
                                <a href="pages/gallery.html"
                                    class="nav-link {{ request()->is('projects*') ? 'active' : '' }}">
                                    <i class="nav-icon fab fa-stack-overflow"></i>
                                    <p>
                                        Project setting
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('projects.index') }}"
                                            class="nav-link {{ request()->is('projects*') && !request()->routeIs('projects.create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Projects</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('projects.create') }}"
                                            class="nav-link {{ request()->routeIs('projects.create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Project Add</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ request()->is('users*') ? 'menu-open' : '' }}">
                                <a href="pages/gallery.html"
                                    class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        User setting
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}"
                                            class="nav-link  {{ request()->is('users*') && !request()->routeIs('users.create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('users.create') }}"
                                            class="nav-link  {{ request()->routeIs('users.create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>User Add</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endrole
                        @role('client|pm')
                            <li class="nav-item {{ request()->is('pm*') ? 'menu-open' : '' }}">
                                <a href="pages/gallery.html" class="nav-link {{ request()->is('pm*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Project Management
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @foreach ($projects as $project)
                                        <li
                                            class="nav-item {{ request()->segment(2) == $project->id && request()->is('pm/*') ? 'menu-open' : '' }}">
                                            <a href="#"
                                                class="nav-link {{ request()->segment(2) == $project->id && request()->is('pm/*') ? 'active' : '' }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>
                                                    {{ $project->name }}
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="{{ route('pm.task', $project->id) }}"
                                                        class="nav-link {{ request()->segment(2) == $project->id && request()->routeIs('pm.task') ? 'active' : '' }}">
                                                        <i class="far fa-dot-circle nav-icon"></i>
                                                        <p>Task Lists</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('pm.member', $project->id) }}"
                                                        class="nav-link {{ request()->segment(2) == $project->id && request()->routeIs('pm.member') ? 'active' : '' }}">
                                                        <i class="far fa-dot-circle nav-icon"></i>
                                                        <p>Members</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('pm.chart', $project->id) }}"
                                                        class="nav-link {{ request()->segment(2) == $project->id && request()->routeIs('pm.chart') ? 'active' : '' }}">
                                                        <i class="far fa-dot-circle nav-icon"></i>
                                                        <p>Chart</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endrole
                        @auth
                            <li class="nav-item mt-3" style="border-top: 1px solid rgba(255, 255, 255, 0.1);">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="#" class="nav-link"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="fas fa-sign-out-alt nav-icon"></i>
                                        <p>Logout</p>
                                    </a>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.0.1
            </div>
            <strong>Copyright &copy; 2025 <a href="">BlueStar</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- Inline JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/js/plugins/bootstrap/js/bootstrap.bundle.min.js'])
    @yield('inline_js')
    @vite(['resources/js/app.js'])
    @yield('custom_inline_js')
</body>

</html>
