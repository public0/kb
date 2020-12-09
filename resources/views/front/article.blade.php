@extends('front/index')
@section('row-article')
<div class="singlePostContainer">
    <article class="singlePost styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom40 galleryPostFormat">

        <header class="singlePost__postHeader">
            <figure class="singlePost__postThumb galleryThumb owl-carousel">
                <img data-transition='.3' data-hover-opacity="9" src="<?php echo URL::to('/'); ?>/thf/img/p5-770x390.jpg" alt="">
                <img data-transition='.3' data-hover-opacity="9" src="<?php echo URL::to('/'); ?>/thf/img/p174-770x390.jpg" alt="">
            </figure>
            <div class="singlePost__date ff-Playfair u-absolute u-top20 u-left20 u-zIndex-p10 textWhite u-padding0x20">
                <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                <time class="u-font17" datetime="2017-03-25">March 6, 2019</time>
            </div>
        </header>

        <div class="singlePost__content">
            <h3 class="  u-fontWeight600 u-marginBottom10 postTitle"><a class="textDark" href="#">{{$article->title}}</a></h3>
            <ul class="singlePost__author_category u-font17 u-xs-font14 u-fontWeight600">
                <li class="singlePost__author u-inlineBlock"><a href="#">Mike Doe</a></li>
                <li class="singlePost__category u-relative u-paddingLeft15 u-marginLeft10 u-inlineBlock">
                    <ul class="ff-openSans  u-inlineBlock">
                        <li class="u-inlineBlock"><a href="#">Life Style</a></li>
                    </ul>
                </li>
            </ul>
            <div class="postText u-paddingTop20">
                {!! $article->body !!}
            </div>
        </div>

        <footer class="singlePost__footer">
            <div class="singlePost__share c-socialMediaParent">
                <ul class="aboutWidget__socialMedia c-t-socialMedia u-font18">
                    <li ><a class="c-facebook" href="#"><span class="ion-social-facebook"></span></a></li>
                    <li ><a class="c-twitter" href="#"><span class="ion-social-twitter"></span></a></li>
                    <li ><a class="c-googlePlus" href="#"><span class="ion-social-googleplus"></span></a></li>
                    <li ><a class="c-tumblr" href="#"><span class="ion-social-tumblr"></span></a></li>
                </ul>
            </div>
        </footer>

    </article>
</div> <!--//PostContainer end-->
@endsection
