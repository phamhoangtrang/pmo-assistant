<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.head') <!-- Phần <head> -->
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.partials.navbar') <!-- Navbar -->

        @include('layouts.partials.sidebar') <!-- Sidebar -->

        @include('layouts.partials.content-wrapper')

        @include('layouts.partials.footer') <!-- Footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- Inline JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite([
        'resources/js/plugins/bootstrap/js/bootstrap.bundle.min.js'
    ])
    @yield('inline_js')
    @vite(['resources/js/app.js'])
    @yield('custom_inline_js')
</body>

</html>