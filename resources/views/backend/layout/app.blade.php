<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{-- Style File --}}
    @include('backend.includes.style_File')

    {{-- Page Level Style--}}
    @yield('style')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('backend.includes.navbar')
        <!-- Left side column. contains the logo and sidebar -->
        @include('backend.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        @include('backend.includes.footer')

    </div>
    <!-- ./wrapper -->

    @include('backend.includes.script_File')

    {{-- Page Level Script File--}}
    @yield('scriptFile')
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/dist/js/demo.js') }}"></script>
    {{-- Page Level Script --}}
    @yield('script')
</body>
</html>
