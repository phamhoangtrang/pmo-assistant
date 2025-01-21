<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'PMO Assistant'))</title>
    @vite(['resources/css/fontawesome-free/css/all.min.css'])
    <!-- Font Awesome Icons -->
    {{-- <script src="https://code.jscharting.com/latest/jscharting.js"></script> --}}
    <!-- Inline CSS -->
    @yield('inline_css')
    @vite(['resources/css/app.css'])
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
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
                        <li class="nav-item {{ request()->is('projects*') ? 'menu-open' : '' }}">
                            <a href="pages/gallery.html" class="nav-link {{ request()->is('projects*') ? 'active' : '' }}">
                                <i class="nav-icon fab fa-stack-overflow"></i>
                                <p>
                                    Project setting
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Projects</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('projects.create') }}" class="nav-link {{ request()->routeIs('projects.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Add</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Edit</p>
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Detail</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item {{ request()->is('users*') ? 'menu-open' : '' }}">
                            <a href="pages/gallery.html" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    User setting
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link  {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.create') }}" class="nav-link  {{ request()->routeIs('users.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User Add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ request()->is('pages*') ? 'menu-open' : '' }}">
                            <a href="pages/gallery.html" class="nav-link {{ request()->is('pages*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Project Management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Level 2</p>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                      Level 2
                                      <i class="right fas fa-angle-left"></i>
                                    </p>
                                  </a>
                                  <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                      <a href="{{ route('pm.task', 1) }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Task Lists</p>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a href="{{ route('pm.member', 1) }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Members</p>
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a href="{{ route('pm.chart', 1) }}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Chart</p>
                                      </a>
                                    </li>
                                  </ul>
                                </li>
                                <li class="nav-item">
                                  <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Level 2</p>
                                  </a>
                                </li>
                              </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="pages/gallery.html" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/gallery.html" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li> -->

                    </ul>
                </nav>
                <div class="mt-3 ml-3 pb-3 mb-3 d-flex">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('inline_js')
    @vite(['resources/js/app.js'])
    @yield('inline_js_custom')
</body>

</html>