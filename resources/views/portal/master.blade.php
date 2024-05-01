<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BitMascot - @yield('title')</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/portal.css')}}">
    @yield('styles')
</head>
<body>
<!-- overlay -->
<div id="sidebar-overlay" class="overlay w-100 vh-100 position-fixed d-none"></div>


@include('portal.includes.menu')
<div class="col-md-9 col-lg-10 ml-md-auto px-0 ms-md-auto">

    @include('portal.includes.header')
    <!-- main content -->
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
@yield('scripts')
</html>
