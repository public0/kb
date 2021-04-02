<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Admitro - Admin Panel HTML template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <!-- Title -->
    <title>Ringhel</title>

    <!--Favicon -->
    <link rel="icon" href="<?php echo URL::to('/'); ?>/th/assets/images/brand/favicon.ico" type="image/x-icon"/>

    <!--Bootstrap css -->
    <link href="<?php echo URL::to('/'); ?>/th/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style css -->
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/dark.css" rel="stylesheet" />
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/skin-modes.css" rel="stylesheet" />

    <!-- Animate css -->
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/animated.css" rel="stylesheet" />

    <!--Sidemenu css -->
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/closed-sidemenu.css" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="<?php echo URL::to('/'); ?>/th/assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

    <!---Icons css-->
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/icons.css" rel="stylesheet" />

    <!-- Simplebar css -->
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/th/assets/plugins/simplebar/css/simplebar.css">

    <!-- Data table css -->
    <link href="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/css/buttons.bootstrap4.min.css"  rel="stylesheet">
    <link href="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/responsive.bootstrap4.min.css" rel="stylesheet" />

    <!-- Slect2 css -->
    <link href="<?php echo URL::to('/'); ?>/th/assets/plugins/select2/select2.min.css" rel="stylesheet" />

    <!-- Color Skin css -->
    <link id="theme" href="<?php echo URL::to('/'); ?>/th/assets/colors/color1.css" rel="stylesheet" type="text/css"/>
    <!-- Custom -->
    <link id="theme" href="<?php echo URL::to('/'); ?>/admin.css" rel="stylesheet" type="text/css"/>

    <script src="https://cdn.tiny.cloud/1/9n1b0elpd20obpyx38wu9ffiokuiqd1ldwot2t8g0pl0lys9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body class="app sidebar-mini">

<!---Global-loader-->
<div id="global-loader" >
    <img src="<?php echo URL::to('/'); ?>/th/assets/images/svgs/loader.svg" alt="loader">
</div>
<!--- End Global-loader-->

<!-- Page -->
<div class="page">
    <div class="page-main">

        <!--aside open-->
        <aside class="app-sidebar">
            <div class="app-sidebar__logo">
                <a class="header-brand" href="<?php echo URL::to('/'); ?>">
                    <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="Admitro logo">
                    <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/logo1.png" class="header-brand-img dark-logo" alt="Admitro logo">
                    <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Admitro logo">
                    <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo" alt="Admitro logo">
                </a>
            </div>
            <div class="app-sidebar__user">
                <div class="dropdown user-pro-body text-center">
                    <div class="user-pic">
                        <img src="<?php echo URL::to('/'); ?>/th/assets/images/users/2.jpg" alt="user-img" class="avatar-xl rounded-circle mb-1">
                    </div>
                    <div class="user-info">
                        <h5 class=" mb-1">{{$user->full_name}} <i class="ion-checkmark-circled text-success fs-12"></i></h5>
                    </div>
                </div>
            </div>


            <ul class="side-menu app-sidebar3">
                <li class="side-item side-item-category mt-4">Main</li>

                <li class="slide">
                    <a class="side-menu__item"  href="<?php echo URL::to('/ibd/types'); ?>">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                        <span class="side-menu__label">Types</span><span class="badge badge-gradient-info side-badge">{{$typesCount}}</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item"  href="<?php echo URL::to('/ibd/triggers'); ?>">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                        <span class="side-menu__label">Triggers</span><span class="badge badge-gradient-info side-badge">{{$triggersCount}}</span></a>
                </li>

            </ul>


        </aside>

{{--        <x-AdminSidebar/>--}}
        <!--aside closed-->
    @section('content')
    @show
    <!-- App-Content -->
{{--        @section('footer')--}}
{{--        @show--}}
{{--        <x-AdminFooter/>--}}
        <!-- End app-content-->
    </div>


    <!--Footer-->

    <!-- End Footer-->

</div>
<!-- End Page -->

<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>

<!-- Jquery js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/js/jquery-3.5.1.min.js"></script>

<!-- Bootstrap4 js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/bootstrap/popper.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!--Othercharts js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

<!-- Circle-progress js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/js/circle-progress.min.js"></script>

<!-- Jquery-rating js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/rating/jquery.rating-stars.js"></script>

<!--Sidemenu js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- P-scroll js-->
{{--<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/p-scrollbar/p-scrollbar.js"></script>--}}
{{--<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/p-scrollbar/p-scroll1.js"></script>--}}
{{--<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/p-scrollbar/p-scroll.js"></script>--}}



<!-- INTERNAL Data tables -->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/js/jquery.dataTables.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/js/pdfmake.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/js/vfs_fonts.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/datatable/responsive.bootstrap4.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/js/datatables.js"></script>





<!--INTERNAL Peitychart js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/peitychart/jquery.peity.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/peitychart/peitychart.init.js"></script>

<!--INTERNAL Apexchart js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/js/apexcharts.js"></script>

<!--INTERNAL ECharts js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/echarts/echarts.js"></script>

<!--INTERNAL Chart js -->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/chart/chart.bundle.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/chart/utils.js"></script>

<!-- INTERNAL Select2 js and DATATABLES and FORMS-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/js/select2.js"></script>

<!--INTERNAL Moment js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/moment/moment.js"></script>

<!--INTERNAL Index js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/js/index1.js"></script>

<!-- Simplebar JS -->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/simplebar/js/simplebar.min.js"></script>

<!-- Autocomplete -->
<script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script>

<!-- Custom js and DATATABLES-->
<script src="<?php echo URL::to('/'); ?>/th/assets/js/custom.js"></script>


</body>
</html>

