<!DOCTYPE html>
<html class="html" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo URL::to('/'); ?>/thf/img/favicon.png" />

    <title>Home-Main</title>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/thf/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/thf/vendor/owl.carousel2/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/thf/vendor/owl.carousel2/owl.theme.default.css">
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/thf/vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/thf/vendor/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/thf/css/escritor.min.css">
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/main.css">
    <!-- endinject -->


</head>
<body class="homeOne">
<!-- Mobile menu area start -->
@yield('menu', View::make('front/mobile-menu'))
<!--header start-->
<header class="topHeader topHeader--styleOne">
    <!-- site main navigation -->
    <x-headmen/>
    <!--header search area -->
    <!--// header search area end-->

</header><!--// header end-->

<main class="u-grayBg">
    <section class="recentPostArea sec-pad60">
        <div class="container">
            <div class="sectionBody">
                <div class="row u-flex" data-sticky_parent>
                    <div class="col-md-8">
                    @section('row-article')
                    @show
                    </div> <!--// col-8 end -->
                    <x-sidebar/>
                    <!--yield('side', View::make('front/side'))-->
                </div>
            </div><!--//section body end -->
        </div>
    </section><!--// recent post area End -->

</main>

<!-- Footer start -->
@yield('menu', View::make('front/footer'))
<!--// Footer end -->

<!-- inject:js -->
<script src="<?php echo URL::to('/'); ?>/thf/vendor/jquery/jquery-1.12.0.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/thf/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/thf/vendor/owl.carousel2/owl.carousel.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/thf/vendor/sticky-master/jquery.sticky.js"></script>
<script src="<?php echo URL::to('/'); ?>/thf/vendor/sticky-kit/jquery.sticky-kit.js"></script>
<script src="<?php echo URL::to('/'); ?>/thf/vendor/isotope/isotope.pkgd.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/thf/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/thf/vendor/nicescroll-master/jquery.nicescroll.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/thf/js/escritor.js"></script>
<script src="<?php echo URL::to('/'); ?>/script.js"></script>
<!-- endinject -->
</body>
</html>

