@extends('front/index')
@section('row-article')
<div class="recentPostContainer">

    <!-- post row -->
    <div class="row u-flex">

        @foreach($article as $art)
        <!-- post item -->
        <div class="col-sm-6 u-marginTop30 u-flex">
            <article class="defPost u-noOverFolow defPost defPost--oneHalf u-flex u-flex--contentSpace u-flex--dir_col u-heightBlock styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom30">
                <header class="defPost__postHeader">
                    <figure class="defPost__postThumb imageZoom__parent">
                        <a href="#"><img class="imageZoom__el" src="<?php echo URL::to('/'); ?>/thf/img/p6-370x220.jpg" alt=""></a>
                    </figure>
                    <div class="defPost__date ff-Playfair textWhite">
                        <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                        <time class="u-font15" datetime="2018-03-25">March 6, 2019</time>
                    </div>
                </header>
                <div class="defPost__content u-padding0x30">
                    <h5 class="  u-fontWeight600 u-marginTop25 u-marginBottom10">
                        <a class="textDark" href="single-blog.html">{{$art->title}}</a>
                    </h5>
                    <ul class="defPost__author_category u-font15">
                        <li class="defPost__author u-inlineBlock"><a href="author-profile.html">Puffinthemes</a></li>
                        <li class="defPost__category u-relative u-paddingLeft10 u-marginLeft5 u-inlineBlock">
                            <ul class="ff-openSans  u-inlineBlock">
                                <li class="u-inlineBlock"><a href="category-main.html">Life Style</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="postText u-paddingTop15 u-paddingBottom10">
                        <p>{{$art->description}}</p>
                    </div>
                </div>
                <footer class="defPost__footer clear u-padding0x30">
                    <div class="read-more pull-left">
                        <a class="u-font15 u-relative u-fontWeight600" href="<?php echo URL::to('/'); ?>/article/{{$art->article_id}}">Read More</a>
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
        @endforeach
    </div><!--// post row end -->

</div> <!--// recentPostContainer end-->
@endsection
