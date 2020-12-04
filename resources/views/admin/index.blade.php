<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Admitro - Admin Panel HTML template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="admin panel ui, user dashboard template, web application templates, premium admin templates, html css admin templates, premium admin templates, best admin template bootstrap 4, dark admin template, bootstrap 4 template admin, responsive admin template, bootstrap panel template, bootstrap simple dashboard, html web app template, bootstrap report template, modern admin template, nice admin template"/>

    <!-- Title -->
    <title>Admitro - Admin Panel HTML template</title>

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

</head>

<body class="app sidebar-mini dark-mode dark-sidebar">

<!---Global-loader-->
<div id="global-loader" >
    <img src="<?php echo URL::to('/'); ?>/th/assets/images/svgs/loader.svg" alt="loader">
</div>
<!--- End Global-loader-->

<!-- Page -->
<div class="page">
    <div class="page-main">

        <!--aside open-->
        @yield('sidebar', View::make('admin/sidebar'))
        <!--aside closed-->
        @section('content')
        @show
        <!-- App-Content -->
        @section('footer')
        @show
        @yield('sidebar', View::make('admin/footer'))
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
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/p-scrollbar/p-scrollbar.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/p-scrollbar/p-scroll1.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/p-scrollbar/p-scroll.js"></script>



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

<!-- Custom js and DATATABLES-->
<script src="<?php echo URL::to('/'); ?>/th/assets/js/custom.js"></script>

</body>
</html>

