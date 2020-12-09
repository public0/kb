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
    <!-- endinject -->


</head>
<body class="homeOne">
<!-- Mobile menu area start -->
@yield('menu', View::make('front/mobile-menu'))
<!--header start-->
<header class="topHeader topHeader--styleOne">
    <!-- site main navigation -->
    @yield('menu', View::make('front/menu'))
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

                        <!--pagination (large screen) -->
                        <div class="postPagination styleOne u-marginTop40">
                            <div class="paginationWrapper">
                                <div class="btnArrow prev u-inlineBlock">
                                    <a href="#"><i class="ion-ios-arrow-left"></i></a>
                                </div>

                                <span class="page-numbers"><a href="#">1</a></span>
                                <span class="page-numbers current">2</span>
                                <span class="page-numbers"><a href="#">3</a></span>
                                <span class="page-numbers"><a href="#">4</a></span>
                                <span class="page-numbers"><span class="ion-ios-more"></span></span>
                                <span class="page-numbers"><a href="#">99</a></span>

                                <div class="btnArrow next u-inlineBlock">
                                    <a href="#"><i class="ion-ios-arrow-right"></i></a>
                                </div>
                            </div>
                        </div> <!--// large screen pagination end-->

                        <!-- Pagination (mini screen) -->
                        <div class="postPagination-alt u-marginTop30">
                            <div class="paginationWrapper u-shadow-0x0x5--05">
                                <a class="prev" href="#">Prev Page</a>
                                <a class="next" href="#">Next Page</a>
                            </div>
                        </div><!--// mini screen pagination end-->

                    </div> <!--// col-8 end -->

                    <div class="col-md-4 hidden-xs u-sm-paddingTop20">
                        <aside class="sideBar styleOne rightSideBar">

                            <!-- widget(about) -->
                            <section class="widget aboutWidget styleOne u-whiteBg u-shadow-0x0x5--05">
                                <h4 class="widgetTitle textDark text-center">About Me</h4>
                                <div class="aboutWidget__body u-paddingTop30">
                                    <figure class="authorWidget__photo u-marginBottom25">
                                        <img src="<?php echo URL::to('/'); ?>/thf/img/p21-280x150.jpg" alt="">
                                    </figure>
                                    <div class="aboutWidget__info c-socialMediaParent">
                                        <p>Hi, I'm <em>John Doe</em>. I’m a professional blogger from American. I love writing, travel , ice cream and cyan color</p>
                                        <ul class="aboutWidget__socialMedia c-t-socialMedia u-font18">
                                            <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                            <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                            <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                            <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </section><!--// widget end -->

                            <!-- widget(popularPost) -->
                            <section class="widget popularPostWidget styleOne u-whiteBg u-shadow-0x0x5--05">
                                <h4 class="widgetTitle textDark  text-center">Popular Post</h4>
                                <ul class="popularPostWidget__body u-marginTop30">

                                    <li>
                                        <figure class="popularPostWidget__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p22-80x85.jpg" alt=""></a>
                                        </figure>
                                        <div class="popularPostWidget__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Today I choose life. Every the morning when…</a></h3>
                                            <ul class="popularPostWidget__author_category">
                                                <li class="popularPostWidget__author"><a href="#">Puffinthemes</a></li>
                                                <li class="popularPostWidget__category u-relative">
                                                    <ul class="ff-openSans">
                                                        <li><a href="#">Life Style</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <figure class="popularPostWidget__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p23-80x85.jpg" alt=""></a>
                                        </figure>
                                        <div class="popularPostWidget__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Today I choose life. Every the morning when…</a></h3>
                                            <ul class="popularPostWidget__author_category">
                                                <li class="popularPostWidget__author"><a href="#">Puffinthemes</a></li>
                                                <li class="popularPostWidget__category u-relative">
                                                    <ul class="ff-openSans">
                                                        <li><a href="#">Life Style</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <figure class="popularPostWidget__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p24-80x85.jpg" alt=""></a>
                                        </figure>
                                        <div class="popularPostWidget__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Today I choose life. Every the morning when…</a></h3>
                                            <ul class="popularPostWidget__author_category">
                                                <li class="popularPostWidget__author"><a href="#">Puffinthemes</a></li>
                                                <li class="popularPostWidget__category u-relative">
                                                    <ul class="ff-openSans">
                                                        <li><a href="#">Life Style</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <figure class="popularPostWidget__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p25-80x85.jpg" alt=""></a>
                                        </figure>
                                        <div class="popularPostWidget__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Today I choose life. Every the morning when…</a></h3>
                                            <ul class="popularPostWidget__author_category">
                                                <li class="popularPostWidget__author"><a href="#">Puffinthemes</a></li>
                                                <li class="popularPostWidget__category u-relative">
                                                    <ul class="ff-openSans">
                                                        <li><a href="#">Life Style</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                            </section><!--// widget end -->

                            <!-- widget(recent event) -->
                            <section class="widget recentEventWidget styleOne u-whiteBg u-shadow-0x0x5--05">
                                <h4 class="widgetTitle textDark  text-center">Recent Event</h4>
                                <ul class="recentEventWidget__body u-marginTop30">

                                    <li>
                                        <div class="recentEventWidget__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Tomorrow I chooses life. Every the Night when…</a></h3>
                                            <ul class="recentEventWidget__date_vanue">
                                                <li class="recentEventWidget__date"><a href="#">January 25, 2018</a></li>
                                                <li class="recentEventWidget__vanue u-relative"><a href="#">NYC, USA</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="recentEventWidget__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Tomorrow I chooses life. Every the Night when…</a></h3>
                                            <ul class="recentEventWidget__date_vanue">
                                                <li class="recentEventWidget__date"><a href="#">January 25, 2018</a></li>
                                                <li class="recentEventWidget__vanue u-relative"><a href="#">NYC, USA</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="recentEventWidget__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Tomorrow I chooses life. Every the Night when…</a></h3>
                                            <ul class="recentEventWidget__date_vanue">
                                                <li class="recentEventWidget__date"><a href="#">January 25, 2018</a></li>
                                                <li class="recentEventWidget__vanue u-relative"><a href="#">NYC, USA</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                            </section><!--// widget end -->

                            <!-- widget(newsLetter) -->
                            <div  data-sticky_column>
                                <section class="widget newsLetterWidget styleOne u-whiteBg u-shadow-0x0x5--05">
                                    <h4 class="widgetTitle textDark text-center">Newsletter</h4>
                                    <div class="newsLetterWidget__body u-marginTop30 ff-openSans">
                                        <p>Your email address will not be this published. Required fields are marked</p>
                                        <form action="#" class="newsLetterWidget__form">
                                            <input type="email" class="emailHunter u-borderRadius4" placeholder="Your Mail Here">
                                            <input type="submit" class="btnWidget u-borderRadius4" value="Subcribe">
                                        </form>
                                    </div>
                                </section>
                            </div><!--// widget end -->

                        </aside>
                    </div> <!--// col-4 end(sideBar) -->
                </div>
            </div><!--//section body end -->
        </div>
    </section><!--// recent post area End -->


    <section class="videoPost styleOne sec-pad60">
        <div class="container">

            <header class="sectionHeader text-center u-marginBottom40">
                <div class="sectionHeader__wrapper textWhite">
                    <h2 class="  u-fontWeightBold textWhite">Recent Video Post</h2>
                    <p class="textWhite">Dependent certainty off discovery him his times tolerably offending. <br class="hidden-xs"> Ham for attention remainde sometimes.</p>
                </div>
            </header>
            <div class="sectionBody">

                <div class="mainWrapper">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="playerFrame">
                                <iframe  src="https://www.youtube.com/embed/7e90gBu4pas"></iframe>
                            </div>
                        </div><!--// col-8 end -->
                        <div class="col-md-4">
                            <div class="playList">

                                <header class="playList__header u-noOverFolow">
                                    <h3 class="u-font21 u-fontWeightBold">Channel Name</h3>
                                    <a href="#" class="btnSubscription u-borderRadius4">Subscription</a>
                                </header>

                                <ul class="playList__wrap">

                                    <li>
                                        <figure class="videoPost__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p13-70x50.jpg" alt=""></a>
                                        </figure>
                                        <div class="videoPost__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Today I choose life. Every the morning when...</a></h3>
                                            <span class="postDate">Jnuary 25, 2018</span>
                                        </div>
                                    </li>

                                    <li>
                                        <figure class="videoPost__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p14-70x50.jpg" alt=""></a>
                                        </figure>
                                        <div class="videoPost__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Watch the Gucci Spring
                                                    66 Show Live Here...</a></h3>
                                            <span class="postDate">Jnuary 25, 2018</span>
                                        </div>
                                    </li>

                                    <li>
                                        <figure class="videoPost__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p15-70x50.jpg" alt=""></a>
                                        </figure>
                                        <div class="videoPost__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Triarchy is Reinventing
                                                    Most Basic Wardrobe...</a></h3>
                                            <span class="postDate">Jnuary 25, 2018</span>
                                        </div>
                                    </li>

                                    <li>
                                        <figure class="videoPost__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p16-70x50.jpg" alt=""></a>
                                        </figure>
                                        <div class="videoPost__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Today I choose life. Every the morning when…</a></h3>
                                            <span class="postDate">Jnuary 25, 2018</span>
                                        </div>
                                    </li>

                                    <li>
                                        <figure class="videoPost__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p17-70x50.jpg" alt=""></a>
                                        </figure>
                                        <div class="videoPost__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Today I choose life. Every the morning when…</a></h3>
                                            <span class="postDate">Jnuary 25, 2018</span>
                                        </div>
                                    </li>

                                    <li>
                                        <figure class="videoPost__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p18-70x50.jpg" alt=""></a>
                                        </figure>
                                        <div class="videoPost__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Today I choose life. Every the morning when…</a></h3>
                                            <span class="postDate">Jnuary 25, 2018</span>
                                        </div>
                                    </li>

                                    <li>
                                        <figure class="videoPost__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p19-70x50.jpg" alt=""></a>
                                        </figure>
                                        <div class="videoPost__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Today I choose life. Every the morning when…</a></h3>
                                            <span class="postDate">Jnuary 25, 2018</span>
                                        </div>
                                    </li>

                                    <li>
                                        <figure class="videoPost__thumb">
                                            <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p20-70x50.jpg" alt=""></a>
                                        </figure>
                                        <div class="videoPost__content">
                                            <h3 class="  u-font17"><a class="textDark" href="#">Triarchy is Reinventing
                                                    Most Basic Wardrobe...</a></h3>
                                            <span class="postDate">Jnuary 25, 2018</span>
                                        </div>
                                    </li>

                                </ul> <!--//playList__wrap end -->
                            </div>
                        </div><!--// col-4 end -->
                    </div>
                </div>

                <div class="relatedPlayList">
                    <h6 class="  u-font17 u-fontWeightBold u-marginTop15 u-marginBottom15">Related Playlist</h6>
                    <div class="row">

                        <div class="col-sm-6 col-md-3">
                            <div class="relatedPlayList__block">
                                <figure class="videoPost__thumb">
                                    <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p20-70x50.jpg" alt=""></a>
                                </figure>
                                <div class="videoPost__content">
                                    <h3 class=" "><a class="textDark" href="#">Nokia A-88 reviewe:
                                            blast from the...</a></h3>
                                    <span class="postDate">Jnuary 25, 2018</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="relatedPlayList__block">
                                <figure class="videoPost__thumb">
                                    <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p19-70x50.jpg" alt=""></a>
                                </figure>
                                <div class="videoPost__content">
                                    <h3 class=" "><a class="textDark" href="#">Swiss Char Lamb
                                            Torte With Fenn...</a></h3>
                                    <span class="postDate">Jnuary 25, 2018</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="relatedPlayList__block">
                                <figure class="videoPost__thumb">
                                    <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p18-70x50.jpg" alt=""></a>
                                </figure>
                                <div class="videoPost__content">
                                    <h3 class=" "><a class="textDark" href="#">Cream desserts, The
                                            mousse and...</a></h3>
                                    <span class="postDate">Jnuary 25, 2018</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="relatedPlayList__block">
                                <figure class="videoPost__thumb">
                                    <a href="#"><img data-transition=".3" data-hover-opacity="8"  src="<?php echo URL::to('/'); ?>/thf/img/p17-70x50.jpg" alt=""></a>
                                </figure>
                                <div class="videoPost__content">
                                    <h3 class=" "><a class="textDark" href="#">Watch the Gucci
                                            Spring  Show...</a></h3>
                                    <span class="postDate">Jnuary 25, 2018</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!--//relatedPlayList -->

            </div> <!--//sectionBody end-->
        </div>
    </section><!--//videoPosts  End -->


    <section class="categoryPostArea sec-pad60">
        <div class="container">

            <header class="sectionHeader text-center u-marginBottom40">
                <div class="sectionHeader__wrapper">
                    <h2 class="u-fontWeightBold textDark">Life Hacks</h2>
                    <p class="text-lightDark">Dependent certainty off discovery him his times tolerably offending. <br class="hidden-xs"> Ham for attention remainde sometimes.</p>
                </div>
            </header>

            <div class="sectionBody">
                <div class="row u-flex u-flex--row-wrap categoryPostWrapper">

                    <!--post item -->
                    <div class="col-sm-12 col-md-4 u-flex categoryPostBlock">
                        <article class="categoryPost u-noOverFolow noPostThumb mdHeightControl styleOne u-whiteBg u-shadow-0x0x5--05 u-flex u-flex--contentSpace u-flex--dir_col">
                            <div class="__flex-top">
                                <header class="categoryPost__postHeader">
                                    <div class="categoryPost__date ff-Playfair textWhite">
                                        <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                                        <time datetime="2018-03-25" class="u-font17">March 6, 2019</time>
                                    </div>
                                </header>
                                <div class="categoryPost__content">
                                    <h3 class="categoryPost__title u-marginTop25 u-fontWeightBold u-marginBottom5">
                                        <a class="textDark" href="single-blog.html">Every people are enjoy
                                            with the job that they...</a>
                                    </h3>
                                    <ul class="categoryPost__author_category u-font15">
                                        <li class="categoryPost__author"><a href="author-profile.html">Puffinthemes</a></li>
                                        <li class="categoryPost__category u-relative u-paddingLeft10 u-marginLeft5">
                                            <ul class="ff-openSans">
                                                <li><a href="category-main.html">Life Style</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="postText ff-openSans u-font17 u-lineHeight16 u-marginTop20">
                                        <p>Dependent certainty off discovery him his  times tolerably offending. Ham for attention remainde sometime addition recommend. Direction has strangers now believing. Respect enjoyed gay far exposed parlors towards. Enjoyment use toler is sometimes additions the recommend. Direction has ably form
                                            exposed parlors towards. </p>
                                    </div>

                                </div>
                            </div>
                            <footer class="categoryPost__footer clear u-paddingTop15 n-magrinBottom6">
                                <div class="read-more pull-left">
                                    <a class="u-font17 u-relative u-fontWeight600" href="single-blog.html">Read More</a>
                                </div>
                                <div class="postAction styleOne pull-right u-relative">
                                    <div class="postAction__share c-socialMediaParent u-inlineBlock u-font20 u-cursorPointer u-marginRight10">
                                        <span class="u-xs-font0"><span class="ion-android-share-alt"></span></span>
                                        <ul class="postAction__share-list c-t-socialMedia text-right u-font18">
                                            <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                            <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                            <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                            <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                        </ul>
                                    </div>
                                    <div data-tooltip="405" class="postAction__view u-inlineBlock u-font20 u-cursorPointer c-hasToolTip hidden-xs">
                                        <a href="#"><span class="ion-eye"></span></a>
                                    </div>
                                </div>
                            </footer>
                        </article>
                    </div><!--// post item end-->

                    <!--post item -->
                    <div class="col-sm-12 col-md-4  u-flex categoryPostBlock">
                        <article class="categoryPost u-noOverFolow  u-flex u-flex--contentSpace u-flex--dir_col u-heightBlock styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom30">
                            <header class="categoryPost__postHeader">
                                <figure class="categoryPost__postThumb imageZoom__parent">
                                    <a href="#"><img class="imageZoom__el" src="<?php echo URL::to('/'); ?>/thf/img/p26-370x220.jpg" alt=""></a>
                                </figure>
                                <div class="categoryPost__date  ff-Playfair textWhite">
                                    <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                                    <time class="u-font15" datetime="2018-03-25">March 6, 2019</time>
                                </div>
                            </header>
                            <div class="categoryPost__content u-padding0x30">
                                <h5 class="u-font21 u-fontWeight600 u-marginTop25 u-marginBottom5">
                                    <a class="textDark" href="single-blog.html">My very Minimal Interior
                                        Workplace Design</a>
                                </h5>
                                <ul class="categoryPost__author_category u-font15">
                                    <li class="categoryPost__author u-inlineBlock"><a href="author-profile.html">Puffinthemes</a></li>
                                    <li class="categoryPost__category u-relative u-paddingLeft10 u-marginLeft5 u-inlineBlock">
                                        <ul class="ff-openSans  u-inlineBlock">
                                            <li class="u-inlineBlock"><a href="category-main.html">Life Style</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="postText u-paddingTop15 u-paddingBottom15">
                                    <p>Dependent certainty off discovere him his times tolerably offending. Hame fm attention remainde sometim additions recommend.</p>
                                </div>
                            </div>
                            <footer class="categoryPost__footer clear u-padding0x30">
                                <div class="read-more pull-left">
                                    <a class="u-font17 u-relative u-fontWeight600" href="single-blog.html">Read More</a>
                                </div>
                                <div class="postAction styleOne pull-right u-relative">
                                    <div class="postAction__share c-socialMediaParent u-inlineBlock u-font20 u-cursorPointer u-marginRight10">
                                        <span class="u-xs-font0"><span class="ion-android-share-alt"></span></span>
                                        <ul class="postAction__share-list c-t-socialMedia text-right u-font18">
                                            <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                            <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                            <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                            <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                        </ul>
                                    </div>
                                    <div data-tooltip="405" class="postAction__view u-inlineBlock u-font20 u-cursorPointer c-hasToolTip hidden-xs">
                                        <a href="#"><span class="ion-eye"></span></a>
                                    </div>
                                </div>
                            </footer>
                        </article>
                    </div><!--// post item end-->

                    <!-- post item(video format)-->
                    <div class="col-sm-12 col-md-4 u-flex categoryPostBlock">
                        <article class="categoryPost u-noOverFolow categoryPost--videoFormat  u-flex u-flex--contentSpace u-flex--dir_col u-heightBlock styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom30">
                            <!-- Post header start -->
                            <header class="categoryPost__postHeader">
                                <figure class="categoryPost__postThumb imageZoom__parent">
                                    <a href="#"><img class="imageZoom__el" src="<?php echo URL::to('/'); ?>/thf/img/p27-370x220.jpg" alt=""></a>
                                </figure>
                                <div class="categoryPost__date ff-Playfair textWhite">
                                    <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                                    <time class="u-font15" datetime="2018-03-25">March 6, 2019</time>
                                </div>
                            </header>
                            <!-- Post header end -->
                            <div class="categoryPost__content u-padding0x30">
                                <h5 class="u-font21   u-fontWeight600 u-marginTop25 u-marginBottom5">
                                    <a class="textDark" href="single-blog.html">Your  Experience Can Take
                                        The Best Photo To With...</a>
                                </h5>
                                <ul class="categoryPost__author_category u-font15">
                                    <li class="categoryPost__author u-inlineBlock"><a href="author-profile.html">Puffinthemes</a></li>
                                    <li class="categoryPost__category u-relative u-paddingLeft10 u-marginLeft5 u-inlineBlock">
                                        <ul class="ff-openSans  u-inlineBlock">
                                            <li class="u-inlineBlock"><a href="category-main.html">Life Style</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="postText u-paddingTop15 u-paddingBottom15">
                                    <p>Dependent certainty off discovere him his times tolerably offending. Hame fm attention remainde sometim additions recommend.</p>
                                </div>
                            </div>
                            <footer class="categoryPost__footer clear u-padding0x30">
                                <div class="read-more pull-left">
                                    <a class="u-font17 u-relative u-fontWeight600" href="#">Read More</a>
                                </div>
                                <div class="postAction styleOne pull-right u-relative">
                                    <div class="postAction__share c-socialMediaParent u-inlineBlock u-font20 u-cursorPointer u-marginRight10">
                                        <span class="u-xs-font0"><span class="ion-android-share-alt"></span></span>
                                        <ul class="postAction__share-list c-t-socialMedia text-right u-font18">
                                            <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                            <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                            <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                            <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                        </ul>
                                    </div>
                                    <div data-tooltip="405" class="postAction__view u-inlineBlock u-font20 u-cursorPointer c-hasToolTip hidden-xs">
                                        <a href="#"><span class="ion-eye"></span></a>
                                    </div>
                                </div>
                            </footer>
                        </article>
                    </div><!--// post item end -->

                    <!--post item -->
                    <div class="col-sm-12 col-md-8 u-flex categoryPostBlock">
                        <article class="categoryPost smHeightControl mdHeightControl categoryPost--wideLayout styleOne u-flex u-flex--contentSpace u-flex--dir_col u-heightBlock u-relative u-whiteBg u-shadow-0x0x5--05">
                            <div class="row u-flex">
                                <div class="col-sm-6">
                                    <!-- Post header start -->
                                    <header class="categoryPost__postHeader">
                                        <figure class="categoryPost__postThumb imageZoom__parent">
                                            <a href="#"><img class="imageZoom__el" src="<?php echo URL::to('/'); ?>/thf/img/p28-370x538.jpg" alt=""></a>
                                        </figure>
                                        <div class="categoryPost__date ff-Playfair textWhite">
                                            <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                                            <time class="u-font15" datetime="2018-03-25">March 6, 2019</time>
                                        </div>
                                    </header>
                                    <!-- Post header start -->
                                </div>
                                <div class="col-sm-6 u-flex u-noOverFolow u-flex--contentSpace u-flex--dir_col u-noOverFolow">
                                    <div class="categoryPost__content ">
                                        <h3 class="u-font21   u-fontWeight600 u-marginBottom5"><a class="textDark" href="#">My Ultimate Guide to Inland: Tips, Itineraries And Favorities...</a></h3>
                                        <ul class="categoryPost__author_category u-font15">
                                            <li class="categoryPost__author u-inlineBlock"><a href="#">Puffinthemes</a></li>
                                            <li class="categoryPost__category u-relative u-paddingLeft15 u-marginLeft10 u-inlineBlock">
                                                <ul class="ff-openSans  u-inlineBlock">
                                                    <li class="u-inlineBlock"><a href="#">Life Style</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="postText u-paddingTop15 u-paddingBottom15">
                                            <p>Dependent certainty off discoveres himes his times tolerably offending. Hame from attention remainde sometimes additions recommend. Direction has strangers now believing. Respect enjoyed gay exposed is parlors towards. Dependent certainty off discoveres himes his times tolerably this  offending. Hame from attention remainde sometimes additions recommend. The Direction has strangers now believing. Respect enjoyed gay.</p>
                                        </div>
                                    </div>
                                    <footer class="categoryPost__footer clear u-paddingBottom35 u-paddingRight30">
                                        <div class="read-more pull-left">
                                            <a class="u-font17 u-relative u-fontWeight600" href="#">Read More</a>
                                        </div>
                                        <div class="postAction styleOne pull-right u-relative">
                                            <div class="postAction__share c-socialMediaParent u-inlineBlock u-font20 u-cursorPointer u-marginRight10">
                                                <span class="u-xs-font0"><span class="ion-android-share-alt"></span></span>
                                                <ul class="postAction__share-list c-t-socialMedia text-right u-font18">
                                                    <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                                    <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                                    <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                                    <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                                </ul>
                                            </div>
                                            <div data-tooltip="405" class="postAction__view u-inlineBlock u-font20 u-cursorPointer c-hasToolTip hidden-xs">
                                                <a href="#"><span class="ion-eye"></span></a>
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </article>
                    </div><!--// post item end -->

                    <!-- post item (quotation format)-->
                    <div class="col-sm-12 col-md-4 u-flex categoryPostBlock">
                        <article class="categoryPost u-noOverFolow categoryPost--quotationFormat mdHeightControl  u-flex u-flex--contentSpace u-flex--dir_col u-heightBlock styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom30">
                            <header class="categoryPost__postHeader u-table u-widthBlock">
                                <div class="categoryPost__quotation u-tableCell">
                                    <blockquote>
                                        <p>Dependent certainty off the discovere him his times tolerably offending.</p>
                                    </blockquote>
                                </div>
                            </header>
                            <div class="categoryPost__content u-padding0x30">
                                <h3 class="u-font21   u-fontWeight600 u-marginTop30 u-marginBottom5">
                                    <a class="textDark" href="#">
                                        Today I choose life. Every the morning when…
                                    </a>
                                </h3>
                                <ul class="categoryPost__author_category u-font15">
                                    <li class="categoryPost__author u-inlineBlock"><a href="#">Puffinthemes</a></li>
                                    <li class="categoryPost__category u-relative u-paddingLeft10 u-marginLeft5 u-inlineBlock">
                                        <ul class="ff-openSans  u-inlineBlock">
                                            <li class="u-inlineBlock"><a href="#">Life Style</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="postText u-paddingTop15 u-paddingBottom15">
                                    <p>Dependent certainty off discovere him his times tolerably offending. Hame fm attention remainde sometim additions recommend.</p>
                                </div>
                            </div>
                            <footer class="categoryPost__footer clear u-padding0x30">
                                <div class="read-more pull-left">
                                    <a class="u-font17 u-relative u-fontWeight600" href="#">Read More</a>
                                </div>
                                <div class="postAction styleOne pull-right u-relative">
                                    <div class="postAction__share c-socialMediaParent u-inlineBlock u-font20 u-cursorPointer u-marginRight10">
                                        <span class="u-xs-font0"><span class="ion-android-share-alt"></span></span>
                                        <ul class="postAction__share-list c-t-socialMedia text-right u-font18">
                                            <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                            <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                            <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                            <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                        </ul>
                                    </div>
                                    <div data-tooltip="405" class="postAction__view u-inlineBlock u-font20 u-cursorPointer c-hasToolTip hidden-xs">
                                        <a href="#"><span class="ion-eye"></span></a>
                                    </div>
                                </div>
                            </footer>
                        </article>
                    </div><!--// post item end -->

                </div><!--// row end -->
            </div> <!--//sectionBody end -->

            <footer class="sectionFooter u-paddingTop10">
                <div class="sectionLoadMore text-right">
                    <a href="#" class="btnBorder u-whiteBg load-more">Older  Posts
                        <span>
                                <i class="ion-ios-arrow-forward"></i>
                            </span>
                    </a>
                </div>
            </footer><!--// section footer end -->
        </div>
    </section><!-- //categoryPostArea end -->

    <section class="authorProfile sec-pad60">
        <div class="container">

            <header class="sectionHeader text-center u-marginBottom40">
                <div class="sectionHeader__wrapper">
                    <h2 class="u-fontWeightBold textWhite">Authore Profile</h2>
                    <p class="textWhite">Dependent certainty off discovery him his times tolerably offending. <br class="hidden-xs"> Ham for attention remainde sometimes.</p>
                </div>
            </header>

            <div class="sectionBody">
                <div class="row">

                    <!--item-->
                    <div class="col-sm-6 col-md-3">
                        <div class="authorProfile__block styleOne c-socialMediaParent text-center u-whiteBg">
                            <figure class="authorPic">
                                <img src="<?php echo URL::to('/'); ?>/thf/img/p29-110x110.jpg" alt="">
                                <figcaption>
                                    <h3 class="  u-font21 u-fontWeightBold u-marginTop20 u-marginBottom10">
                                        <a class="textDark" href="author-profile.html">Franks Marshall</a>
                                    </h3>
                                </figcaption>
                            </figure>
                            <ul class="authorProfile__socialMedia c-t-socialMedia u-font18">
                                <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!--item-->
                    <div class="col-sm-6 col-md-3">
                        <div class="authorProfile__block styleOne c-socialMediaParent text-center u-whiteBg">
                            <figure class="authorPic">
                                <img src="<?php echo URL::to('/'); ?>/thf/img/p30-110x110.jpg" alt="">
                                <figcaption>
                                    <h3 class="  u-font21 u-fontWeightBold u-marginTop20 u-marginBottom10">
                                        <a class="textDark" href="author-profile.html">Leonaa Natsume</a>
                                    </h3>
                                </figcaption>
                            </figure>
                            <ul class="authorProfile__socialMedia c-t-socialMedia u-font18">
                                <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!--item-->
                    <div class="col-sm-6 col-md-3">
                        <div class="authorProfile__block styleOne c-socialMediaParent text-center u-whiteBg">
                            <figure class="authorPic">
                                <img src="<?php echo URL::to('/'); ?>/thf/img/p31-110x110.jpg" alt="">
                                <figcaption>
                                    <h3 class="  u-font21 u-fontWeightBold u-marginTop20 u-marginBottom10">
                                        <a class="textDark" href="author-profile.html">William Kesling</a>
                                    </h3>
                                </figcaption>
                            </figure>
                            <ul class="authorProfile__socialMedia c-t-socialMedia u-font18">
                                <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!--item-->
                    <div class="col-sm-6 col-md-3">
                        <div class="authorProfile__block styleOne c-socialMediaParent text-center u-whiteBg">
                            <figure class="authorPic">
                                <img src="<?php echo URL::to('/'); ?>/thf/img/p32-110x110.jpg" alt="">
                                <figcaption>
                                    <h3 class="  u-font21 u-fontWeightBold u-marginTop20 u-marginBottom10">
                                        <a class="textDark" href="author-profile.html">Justas Galaburda</a>
                                    </h3>
                                </figcaption>
                            </figure>
                            <ul class="authorProfile__socialMedia c-t-socialMedia u-font18">
                                <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                            </ul>
                        </div>
                    </div>

                </div><!--// row end -->
            </div><!--// sectionBody end -->

            <div class="sectionFooter">
                <div class="btnBlock text-center">
                    <a href="authors-list-01.html">All Author View</a>
                </div>
            </div>

        </div>
    </section><!--//author profile end-->

    <section class="categoryPostArea sec-pad60">
        <div class="container">

            <header class="sectionHeader text-center u-marginBottom40">
                <div class="sectionHeader__wrapper">
                    <h2 class="  u-fontWeightBold textDark">Life Hacks</h2>
                    <p class="text-lightDark">Dependent certainty off discovery him his times tolerably offending. <br class="hidden-xs"> Ham for attention remainde sometimes.</p>
                </div>
            </header>

            <div class="sectionBody">
                <div class="row u-flex u-flex--row-wrap categoryPostWrapper">

                    <!--post item -->
                    <div class="col-md-4 col-lg-4  u-flex categoryPostBlock">
                        <article class="categoryPost u-noOverFolow mdHeightControl-sm  u-flex u-flex--contentSpace u-flex--dir_col u-heightBlock styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom30">
                            <header class="categoryPost__postHeader">
                                <figure class="categoryPost__postThumb imageZoom__parent">
                                    <a href="#"><img class="imageZoom__el" src="<?php echo URL::to('/'); ?>/thf/img/p7-370x220.jpg" alt=""></a>
                                </figure>
                                <div class="categoryPost__date ff-Playfair textWhite">
                                    <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                                    <time class="u-font15" datetime="2018-03-25">March 6, 2019</time>
                                </div>
                            </header>
                            <div class="categoryPost__content u-padding0x30 md-u-padding0x20">
                                <h5 class="u-font21   u-fontWeight600 u-marginTop25 u-marginBottom5">
                                    <a class="textDark" href="single-blog.html">Enjoy A Great Time Before The
                                        Sunset Near The Sea</a>
                                </h5>
                                <ul class="categoryPost__author_category u-font15">
                                    <li class="categoryPost__author u-inlineBlock"><a href="author-profile.html">Puffinthemes</a></li>
                                    <li class="categoryPost__category u-relative u-paddingLeft10 u-marginLeft5 u-inlineBlock">
                                        <ul class="ff-openSans  u-inlineBlock">
                                            <li class="u-inlineBlock"><a href="category-main.html">Life Style</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="postText u-paddingTop15 u-paddingBottom15">
                                    <p>Dependent certainty off discovere him his times tolerably offending. Hame fm attention remainde sometim additions recommend.</p>
                                </div>
                            </div>
                            <footer class="categoryPost__footer clear u-padding0x30">
                                <div class="read-more pull-left">
                                    <a class="u-font17 u-relative u-fontWeight600" href="single-blog.html">Read More</a>
                                </div>
                                <div class="postAction styleOne pull-right u-relative">
                                    <div class="postAction__share c-socialMediaParent u-inlineBlock u-font20 u-cursorPointer u-marginRight10">
                                        <span class="u-xs-font0"><span class="ion-android-share-alt"></span></span>
                                        <ul class="postAction__share-list c-t-socialMedia text-right u-font18">
                                            <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                            <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                            <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                            <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                        </ul>
                                    </div>
                                    <div data-tooltip="405" class="postAction__view u-inlineBlock u-font20 u-cursorPointer c-hasToolTip hidden-xs">
                                        <a href="#"><span class="ion-eye"></span></a>
                                    </div>
                                </div>
                            </footer>
                        </article>
                    </div><!--//post item end-->

                    <!--post item -->
                    <div class="col-md-8 col-lg-8 u-flex categoryPostBlock">
                        <article class="categoryPost smHeightControl mdHeightControl-lg categoryPost--wideLayout styleOne u-flex  u-relative u-whiteBg u-shadow-0x0x5--05">
                            <div class="row u-flex">
                                <div class="col-sm-6">
                                    <header class="categoryPost__postHeader">
                                        <figure class="categoryPost__postThumb imageZoom__parent">
                                            <a href="#"><img class="imageZoom__el" src="<?php echo URL::to('/'); ?>/thf/img/p33-370x538.jpg" alt=""></a>
                                        </figure>
                                        <div class="categoryPost__date ff-Playfair textWhite">
                                            <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                                            <time class="u-font15" datetime="2018-03-25">March 6, 2019</time>
                                        </div>
                                    </header>
                                </div>
                                <div class="col-sm-6 u-flex u-flex--contentSpace u-flex--dir_col u-noOverFolow">
                                    <div class="categoryPost__content u-paddingRight30">
                                        <h3 class="u-font21   u-fontWeight600 u-marginBottom5"><a class="textDark" href="single-blog.html">This Is A Great Photo And Nice Style For Shooting</a></h3>
                                        <ul class="categoryPost__author_category u-font15">
                                            <li class="categoryPost__author u-inlineBlock"><a href="author-profile.html">Puffinthemes</a></li>
                                            <li class="categoryPost__category u-relative u-paddingLeft15 u-marginLeft10 u-inlineBlock">
                                                <ul class="ff-openSans  u-inlineBlock">
                                                    <li class="u-inlineBlock"><a href="#">Life Style</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="postText u-paddingTop15 u-paddingBottom15">
                                            <p>Dependent certainty off discoveres himes his times tolerably offending. Hame from attention remainde sometimes additions recommend. Direction has strangers now believing. Respect enjoyed gay exposed is parlors towards. Dependent certainty off discoveres himes his times tolerably this  offending. Hame from attention remainde sometimes additions recommend. The Direction has strangers now believing. Respect enjoyed gay.</p>
                                        </div>
                                    </div>
                                    <footer class="categoryPost__footer clear u-paddingBottom35 u-paddingRight30">
                                        <div class="read-more pull-left">
                                            <a class="u-font17 u-relative u-fontWeight600" href="#">Read More</a>
                                        </div>
                                        <div class="postAction styleOne pull-right u-relative">
                                            <div class="postAction__share c-socialMediaParent u-inlineBlock u-font20 u-cursorPointer u-marginRight10">
                                                <span class="u-xs-font0"><span class="ion-android-share-alt"></span></span>
                                                <ul class="postAction__share-list c-t-socialMedia text-right u-font18">
                                                    <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                                    <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                                    <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                                    <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                                </ul>
                                            </div>
                                            <div data-tooltip="405" class="postAction__view u-inlineBlock u-font20 u-cursorPointer c-hasToolTip hidden-xs">
                                                <a href="#"><span class="ion-eye"></span></a>
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </article>
                    </div><!--//post item end-->

                    <!--post item -->
                    <div class="col-md-8 col-lg-8 u-flex categoryPostBlock">
                        <article class="categoryPost smHeightControl mdHeightControl-lg categoryPost--wideLayout styleOne u-flex  u-relative u-whiteBg u-shadow-0x0x5--05">
                            <div class="row u-flex">
                                <div class="col-sm-6">
                                    <header class="categoryPost__postHeader">
                                        <figure class="categoryPost__postThumb imageZoom__parent">
                                            <a href="#"><img class="imageZoom__el" src="<?php echo URL::to('/'); ?>/thf/img/p34-370x538.jpg" alt=""></a>
                                        </figure>
                                        <div class="categoryPost__date ff-Playfair textWhite">
                                            <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                                            <time class="u-font15" datetime="2018-03-25">March 6, 2019</time>
                                        </div>
                                    </header>
                                </div>
                                <div class="col-sm-6 u-flex u-flex--contentSpace u-flex--dir_col u-noOverFolow">
                                    <div class="categoryPost__content u-paddingRight30">
                                        <h3 class="u-font21   u-fontWeight600 u-marginBottom5"><a class="textDark" href="single-blog.html">Have A Good Time With My Bestfriend And Enjoyed..</a></h3>
                                        <ul class="categoryPost__author_category u-font15">
                                            <li class="categoryPost__author u-inlineBlock"><a href="author-profile.html">Puffinthemes</a></li>
                                            <li class="categoryPost__category u-relative u-paddingLeft15 u-marginLeft10 u-inlineBlock">
                                                <ul class="ff-openSans  u-inlineBlock">
                                                    <li class="u-inlineBlock"><a href="category-main.html">Life Style</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="postText u-paddingTop15 u-paddingBottom15">
                                            <p>Dependent certainty off discoveres himes his times tolerably offending. Hame from attention remainde sometimes additions recommend. Direction has strangers now believing. Respect enjoyed gay exposed is parlors towards. Dependent certainty off discoveres himes his times tolerably this  offending. Hame from attention remainde sometimes additions recommend. The Direction has strangers now believing. Respect enjoyed gay.</p>
                                        </div>
                                    </div>
                                    <footer class="categoryPost__footer clear u-paddingBottom35 u-paddingRight30">
                                        <div class="read-more pull-left">
                                            <a class="u-font17 u-relative u-fontWeight600" href="single-blog.html">Read More</a>
                                        </div>
                                        <div class="postAction styleOne pull-right u-relative">
                                            <div class="postAction__share c-socialMediaParent u-inlineBlock u-font20 u-cursorPointer u-marginRight10">
                                                <span class="u-xs-font0"><span class="ion-android-share-alt"></span></span>
                                                <ul class="postAction__share-list c-t-socialMedia text-right u-font18">
                                                    <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                                    <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                                    <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                                    <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                                </ul>
                                            </div>
                                            <div data-tooltip="405" class="postAction__view u-inlineBlock u-font20 u-cursorPointer c-hasToolTip hidden-xs">
                                                <a href="#"><span class="ion-eye"></span></a>
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </article>
                    </div><!--// post item end-->

                    <!--post item -->
                    <div class="col-md-4 col-lg-4  u-flex categoryPostBlock">
                        <article class="categoryPost u-noOverFolow mdHeightControl-sm  u-flex u-flex--contentSpace u-flex--dir_col u-heightBlock styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom30">
                            <header class="categoryPost__postHeader">
                                <figure class="categoryPost__postThumb imageZoom__parent">
                                    <a href="#"><img class="imageZoom__el" src="<?php echo URL::to('/'); ?>/thf/img/p35-370x220.jpg" alt=""></a>
                                </figure>
                                <div class="categoryPost__date  ff-Playfair textWhite">
                                    <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                                    <time class="u-font15" datetime="2018-03-25">March 6, 2019</time>
                                </div>
                            </header>
                            <div class="categoryPost__content u-padding0x30 md-u-padding0x20">
                                <h5 class="u-font21   u-fontWeight600 u-marginTop25 u-marginBottom5">
                                    <a class="textDark" href="#">Today I choose life. Every the morning when…</a>
                                </h5>
                                <ul class="categoryPost__author_category u-font15">
                                    <li class="categoryPost__author u-inlineBlock"><a href="#">Puffinthemes</a></li>
                                    <li class="categoryPost__category u-relative u-paddingLeft10 u-marginLeft5 u-inlineBlock">
                                        <ul class="ff-openSans  u-inlineBlock">
                                            <li class="u-inlineBlock"><a href="#">Life Style</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="postText u-paddingTop15 u-paddingBottom15">
                                    <p>Dependent certainty off discovere him his times tolerably offending. Hame fm attention remainde sometim additions recommend.</p>
                                </div>
                            </div>
                            <footer class="categoryPost__footer clear u-padding0x30">
                                <div class="read-more pull-left">
                                    <a class="u-font17 u-relative u-fontWeight600" href="#">Read More</a>
                                </div>
                                <div class="postAction styleOne pull-right u-relative">
                                    <div class="postAction__share c-socialMediaParent u-inlineBlock u-font20 u-cursorPointer u-marginRight10">
                                        <span class="u-xs-font0"><span class="ion-android-share-alt"></span></span>
                                        <ul class="postAction__share-list c-t-socialMedia text-right u-font18">
                                            <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                            <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                            <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                            <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                        </ul>
                                    </div>
                                    <div data-tooltip="405" class="postAction__view u-inlineBlock u-font20 u-cursorPointer c-hasToolTip hidden-xs">
                                        <a href="#"><span class="ion-eye"></span></a>
                                    </div>
                                </div>
                            </footer>
                        </article>
                    </div><!--//post item end-->

                    <!--post item -->
                    <div class="col-md-4 col-lg-4  u-flex categoryPostBlock">
                        <article class="categoryPost u-noOverFolow mdHeightControl-sm  u-flex u-flex--contentSpace u-flex--dir_col u-heightBlock styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom30">
                            <header class="categoryPost__postHeader">
                                <figure class="categoryPost__postThumb imageZoom__parent">
                                    <a href="#"><img class="imageZoom__el" src="<?php echo URL::to('/'); ?>/thf/img/p36-370x220.jpg" alt=""></a>
                                </figure>
                                <div class="categoryPost__date ff-Playfair textWhite">
                                    <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                                    <time class="u-font15" datetime="2018-03-25">March 6, 2019</time>
                                </div>
                            </header>
                            <div class="categoryPost__content u-padding0x30 md-u-padding0x20">
                                <h5 class="u-font21   u-fontWeight600 u-marginTop25 u-marginBottom5">
                                    <a class="textDark" href="single-blog.html">Your Phone Can Take The Best
                                        Photo To With Your...</a>
                                </h5>
                                <ul class="categoryPost__author_category u-font15">
                                    <li class="categoryPost__author u-inlineBlock"><a href="#">Puffinthemes</a></li>
                                    <li class="categoryPost__category u-relative u-paddingLeft10 u-marginLeft5 u-inlineBlock">
                                        <ul class="ff-openSans  u-inlineBlock">
                                            <li class="u-inlineBlock"><a href="#">Life Style</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="postText u-paddingTop15 u-paddingBottom15">
                                    <p>Dependent certainty off discovere him his times tolerably offending. Hame fm attention remainde sometim additions recommend.</p>
                                </div>
                            </div>
                            <footer class="categoryPost__footer clear u-padding0x30">
                                <div class="read-more pull-left">
                                    <a class="u-font17 u-relative u-fontWeight600" href="#">Read More</a>
                                </div>
                                <div class="postAction styleOne pull-right u-relative">
                                    <div class="postAction styleOne pull-right u-relative">
                                        <div class="postAction__share c-socialMediaParent u-inlineBlock u-font20 u-cursorPointer u-marginRight10">
                                            <span class="u-xs-font0"><span class="ion-android-share-alt"></span></span>
                                            <ul class="postAction__share-list c-t-socialMedia text-right u-font18">
                                                <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                                <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                                <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                                <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                            </ul>
                                        </div>
                                        <div data-tooltip="405" class="postAction__view u-inlineBlock u-font20 u-cursorPointer c-hasToolTip hidden-xs">
                                            <a href="#"><span class="ion-eye"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </article>
                    </div><!--//post item end-->

                    <!-- post item -->
                    <div class="col-md-8 col-lg-8 u-flex categoryPostBlock">
                        <article class="categoryPost smHeightControl mdHeightControl-lg categoryPost--wideLayout styleOne u-flex u-relative u-whiteBg u-shadow-0x0x5--05">
                            <div class="row u-flex">
                                <div class="col-sm-6">
                                    <header class="categoryPost__postHeader">
                                        <figure class="categoryPost__postThumb imageZoom__parent">
                                            <a href="#"><img class="imageZoom__el" src="<?php echo URL::to('/'); ?>/thf/img/p37-370x538.jpg" alt=""></a>
                                        </figure>
                                        <div class="categoryPost__date ff-Playfair textWhite">
                                            <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                                            <time class="u-font15" datetime="2018-03-25">March 6, 2019</time>
                                        </div>
                                    </header>
                                </div>
                                <div class="col-sm-6 u-flex u-flex--contentSpace u-flex--dir_col u-noOverFolow">
                                    <div class="categoryPost__content u-paddingRight30">
                                        <h3 class="u-font21   u-fontWeight600 u-marginBottom5"><a class="textDark" href="single-blog.html">My Ultimate Guide to Inland: Tips, Itineraries And Favorities...</a></h3>
                                        <ul class="categoryPost__author_category u-font15">
                                            <li class="categoryPost__author u-inlineBlock"><a href="author-profile.html">Puffinthemes</a></li>
                                            <li class="categoryPost__category u-relative u-paddingLeft15 u-marginLeft10 u-inlineBlock">
                                                <ul class="ff-openSans  u-inlineBlock">
                                                    <li class="u-inlineBlock"><a href="category-main.html">Life Style</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="postText u-paddingTop15 u-paddingBottom15">
                                            <p>Dependent certainty off discoveres himes his times tolerably offending. Hame from attention remainde sometimes additions recommend. Direction has strangers now believing. Respect enjoyed gay exposed is parlors towards. Dependent certainty off discoveres himes his times tolerably this  offending. Hame from attention remainde sometimes additions recommend. The Direction has strangers now believing. Respect enjoyed gay.</p>
                                        </div>
                                    </div>
                                    <footer class="categoryPost__footer clear u-paddingBottom35 u-paddingRight30">
                                        <div class="read-more pull-left">
                                            <a class="u-font17 u-relative u-fontWeight600" href="single-blog.html">Read More</a>
                                        </div>
                                        <div class="postAction styleOne pull-right u-relative">
                                            <div class="postAction__share c-socialMediaParent u-inlineBlock u-font20 u-cursorPointer u-marginRight10">
                                                <span class="u-xs-font0"><span class="ion-android-share-alt"></span></span>
                                                <ul class="postAction__share-list c-t-socialMedia text-right u-font18">
                                                    <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                                                    <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                                                    <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                                                    <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                                                </ul>
                                            </div>
                                            <div data-tooltip="405" class="postAction__view u-inlineBlock u-font20 u-cursorPointer c-hasToolTip hidden-xs">
                                                <a href="#"><span class="ion-eye"></span></a>
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </article>
                    </div><!--//post item end-->

                </div>
            </div><!--// sectionBody end-->

        </div><!--// container end-->
    </section><!--// categoryPostArea end -->


    <!-- instagram gallery start -->
    <section class="instagramGal u-whiteBg sec-pad60">
        <div class="container">
            <!--Section header-->
            <header class="sectionHeader text-center u-marginBottom40">
                <div class="sectionHeader__wrapper">
                    <h2 class="u-fontWeightBold textDark">Follow Instagram</h2>
                    <p class="text-lightDark">Dependent certainty off discovery him his times tolerably offending. <br class="hidden-xs"> Ham for attention remainde sometimes.</p>
                </div>
            </header><!--// Section header end-->

            <!--Section body -->
            <div class="sectionBody">
                <div class="row">
                    <div class="col-sm-2 col-xs-6 u-padding0">
                        <div class="instagramGal__block styleOne">
                            <figure>
                                <a href="#"><img src="<?php echo URL::to('/'); ?>/thf/img/p38-195x195.jpg" alt=""></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-6 u-padding0">
                        <div class="instagramGal__block styleOne">
                            <figure>
                                <a href="#"><img src="<?php echo URL::to('/'); ?>/thf/img/p39-195x195.jpg" alt=""></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-6 u-padding0">
                        <div class="instagramGal__block styleOne">
                            <figure>
                                <a href="#"><img src="<?php echo URL::to('/'); ?>/thf/img/p40-195x195.jpg" alt=""></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-6 u-padding0">
                        <div class="instagramGal__block styleOne">
                            <figure>
                                <a href="#"><img src="<?php echo URL::to('/'); ?>/thf/img/p41-195x195.jpg" alt=""></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-6 u-padding0">
                        <div class="instagramGal__block styleOne">
                            <figure>
                                <a href="#"><img src="<?php echo URL::to('/'); ?>/thf/img/p42-195x195.jpg" alt=""></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-6 u-padding0">
                        <div class="instagramGal__block styleOne">
                            <figure>
                                <a href="#"><img src="<?php echo URL::to('/'); ?>/thf/img/p43-195x195.jpg" alt=""></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div> <!--// Section body end -->
        </div>
    </section> <!--// instagram gallery end -->

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
<!-- endinject -->
</body>
</html>

