<!DOCTYPE html>
<html lang="{{ $lang }}" dir="ltr">
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
    <!--Favicon -->
    <link rel="icon" href="<?php echo URL::to('/th/assets/images/brand/favicon.png'); ?>" type="image/x-icon" />
    <!-- inject:css -->
    <!--Bootstrap css -->
    <link href="<?php echo URL::to('/th/assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Style css -->
    <link href="<?php echo URL::to('/th/assets/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo URL::to('/th/assets/css/dark.css'); ?>" rel="stylesheet" />
    <link href="<?php echo URL::to('/th/assets/css/skin-modes.css'); ?>" rel="stylesheet" />
    <!---Icons css-->
    <link href="<?php echo URL::to('/th/assets/css/icons.css'); ?>" rel="stylesheet" />
    <!-- Color Skin css -->
    <link id="theme" href="<?php echo URL::to('/th/assets/colors/color1.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- endinject -->
    <style>
        .header {
            margin-bottom: 15px;
        }
        .header .form-inline .form-control {
            width: 100%;
        }
        .search-element {
            display: block !important;
            margin-top: 0 !important;
            width: 100%;
        }
        @media (max-width: 767.98px) and (min-width: 576px) {
            .header .form-inline .search-element {
                position: relative;
                top: auto;
                left: auto;
                right: auto;
            }
            .search-element .form-control {
                width: 100%;
            }
        }
        @media (max-width: 575.98px) {
            .header .form-inline .search-element {
                position: relative;
            }
        }
    </style>
</head>
<body class="app">
<div class="page">
    <div class="page-main">
        <div class="main-content">
            <header class="app-header header">
                <div class="container-fluid">
                <form class="form-inline" method="get" action="{{ route('help.articles.search', ['api_token' => request()->route('api_token')]) }}">
                    <div class="search-element">
                        <input type="search" class="form-control header-search" placeholder="{{ __('labels.search') }}..." aria-label="{{ __('labels.search') }}" tabindex="1" name="q" autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false" value="{{ request()->input('q') }}" />
                        <button class="btn btn-primary-color" type="submit">
                            <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
                        </button>
                    </div>
                </form>
                </div>
            </header>
            <div class="container-fluid">
            @section('content')
            @show
            </div>
        </div>
    </div>
</div>
{{-- <!-- inject:js -->
<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>
<!-- Jquery js-->
<script src="<?php echo URL::to('/th/assets/js/jquery-3.5.1.min.js'); ?>"></script>
<!-- Bootstrap4 js-->
<script src="<?php echo URL::to('/th/assets/plugins/bootstrap/popper.min.js'); ?>"></script>
<script src="<?php echo URL::to('/th/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo URL::to('/script.js'); ?>"></script>
<!-- endinject --> --}}
</body>
</html>
