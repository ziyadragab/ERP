<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.head')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

@include('layouts.main-header')
@include('layouts.main-sidebar')

@yield('content')

@include('layouts.footer')


</div>
<!-- ./wrapper -->
@include('layouts.footer-scripts')
@include('sweetalert::alert')

</body>
</html>
