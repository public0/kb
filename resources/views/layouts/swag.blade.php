<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="UTF-8">
    <!-- Title -->
    <title>@hasSection('title')@yield('title') - @endif{{ config('app.name') }}</title>
    <!-- Meta data -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta content="{{ config('app.name') }}" name="description" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="robots" content="noindex, nofollow, nosnippet, noimageindex" />
    <!--Favicon -->
    <link rel="icon" href="{{ url('/th/assets/images/brand/favicon.png') }}" type="image/x-icon" />
    <!-- inject:css -->
    <!--Bootstrap css -->
    <link href="{{ url('/th/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Style css -->
    <link href="{{ url('/th/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('/th/assets/css/dark.css') }}" rel="stylesheet" />
    <link href="{{ url('/th/assets/css/skin-modes.css') }}" rel="stylesheet" />
    <!-- Animate css -->
    <link href="{{ url('/th/assets/css/animated.css') }}" rel="stylesheet" />
    <!-- P-scroll bar css-->
    <link href="{{ url('/th/assets/plugins/p-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />
    <!---Icons css-->
    <link href="{{ url('/th/assets/css/icons.css') }}" rel="stylesheet" />
    <!-- Simplebar css -->
    {{-- <link rel="stylesheet" href="{{ url('/th/assets/plugins/simplebar/css/simplebar.css') }}"> --}}
    <!-- Color Skin css -->
    <link id="theme" href="{{ url('/th/assets/colors/color1.css') }}" rel="stylesheet" type="text/css" />
    <!-- endinject -->
    @stack('head-styles')
</head>
<body class="app">
<div class="horizontalMenucontainer">
<div class="page">
    <div class="page-main">
        <x-SwagHeader />
        <div class="hor-content main-content">
            @hasSection('content')
            <div class="container">
                @hasSection('page-header')
                    @section('page-header')
                    @show
                @endif
                @section('content')
                @show
            </div>
            @endif
        </div>
    </div>
    <!-- Footer -->
    <x-admin-footer />
    <!-- // Footer -->
</div>
</div>
<!-- inject:js -->
<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>
<!-- Jquery js-->
<script src="{{ url('/th/assets/js/jquery-3.5.1.min.js') }}"></script>
<!-- Bootstrap4 js-->
<script src="{{ url('/th/assets/plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ url('/th/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- P-scroll js-->
<script src="{{ url('/th/assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
<!-- Simplebar JS -->
{{-- <script src="{{ url('/th/assets/plugins/simplebar/js/simplebar.min.js') }}"></script> --}}
<script src="{{ url('/script.js') }}"></script>
<!-- endinject -->
@stack('body-scripts')
</body>
</html>
