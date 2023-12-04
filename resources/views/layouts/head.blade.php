<title>@yield('title')</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link href="{{asset('css/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!-- Theme style -->
<link href="{{asset('css/adminlte.min.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">





<link href="{{asset('datatables/css/datatables-bs4/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('datatables/css/datatables-responsive/responsive.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('datatables/css/datatables-buttons/buttons.bootstrap4.min.css')}}" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

{{-- invoice --}}
@stack("css")
