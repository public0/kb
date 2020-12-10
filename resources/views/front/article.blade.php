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

    </article>
</div> <!--//PostContainer end-->
<!-- releted post -->
<div class="reletedPostArea u-paddingBottom60">
    <div class="related__top text-center">
        <h4 class="u-marginTop55 u-marginBottom30">You Might Also Like</h4>
    </div>
    <div class="row u-flex">

        <div class="col-sm-6 u-flex u-xs-marginBottom30">
            <article class="defPost u-noOverFolow defPost defPost--oneHalf u-flex u-flex--contentSpace u-flex--dir_col u-heightBlock styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom30">
                <header class="defPost__postHeader">
                    <figure class="defPost__postThumb imageZoom__parent">
                        <a href="#"><img class="imageZoom__el" src="img/p26-370x220.jpg" alt=""></a>
                    </figure>
                    <div class="defPost__date ff-Playfair textWhite">
                        <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                        <time class="u-font15" datetime="2017-03-25">March 6, 2019</time>
                    </div>
                </header>
                <div class="defPost__content u-padding0x30">
                    <h5 class="  u-fontWeight600 u-marginTop25 u-marginBottom10">
                        <a class="textDark" href="#">Today I choose life. Every the morning when…</a>
                    </h5>
                    <ul class="defPost__author_category u-font15">
                        <li class="defPost__author u-inlineBlock"><a href="#">Mike Doe</a></li>
                        <li class="defPost__category u-relative u-paddingLeft10 u-marginLeft5 u-inlineBlock">
                            <ul class="ff-openSans  u-inlineBlock">
                                <li class="u-inlineBlock"><a href="#">Life Style</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="postText u-paddingTop15 u-paddingBottom10">
                        <p>Dependent certainty off discovere him his times tolerably offending. Hame fm attention remainde sometim additions recommend.</p>
                    </div>
                </div>
                <footer class="defPost__footer clear u-padding0x30">
                    <div class="read-more pull-left">
                        <a class="u-font15 u-relative u-fontWeight600" href="#">Read More</a>
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
        </div>
        <div class="col-sm-6 u-flex">
            <article class="defPost u-noOverFolow defPost defPost--oneHalf u-flex u-flex--contentSpace u-flex--dir_col u-heightBlock styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom30">
                <header class="defPost__postHeader">
                    <figure class="defPost__postThumb imageZoom__parent">
                        <a href="#"><img class="imageZoom__el" src="img/p35-370x220.jpg" alt=""></a>
                    </figure>
                    <div class="defPost__date ff-Playfair textWhite">
                        <span class="timeIcon u-marginRight5"><i class="ion-android-time"></i></span>
                        <time class="u-font15" datetime="2017-03-25">March 6, 2019</time>
                    </div>
                </header>
                <div class="defPost__content u-padding0x30">
                    <h5 class="  u-fontWeight600 u-marginTop25 u-marginBottom10">
                        <a class="textDark" href="#">Enjoy A Great Time Before The Sunset Near The Sea</a>
                    </h5>
                    <ul class="defPost__author_category u-font15">
                        <li class="defPost__author u-inlineBlock"><a href="#">Mike Doe</a></li>
                        <li class="defPost__category u-relative u-paddingLeft10 u-marginLeft5 u-inlineBlock">
                            <ul class="ff-openSans  u-inlineBlock">
                                <li class="u-inlineBlock"><a href="#">Life Style</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="postText u-paddingTop15 u-paddingBottom10">
                        <p>Dependent certainty off discovere him his times tolerably offending. Hame fm attention remainde sometim additions recommend.</p>
                    </div>
                </div>
                <footer class="defPost__footer clear u-padding0x30">
                    <div class="read-more pull-left">
                        <a class="u-font15 u-relative u-fontWeight600" href="#">Read More</a>
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
        </div>

    </div>
</div><!--//releted post end-->

<!--post response-->
<div class="postResponse u-whiteBg u-shadow-0x0x5--05">
    <h4 class="u-margin0 text-center">Leave a Response</h4>
    <div class="responseTab u-marginTop50">

        <div class="full__Wrap">
            <form action="#">
                <div class="form__row">
                    <textarea placeholder="Write your comment on the article..."></textarea>
                </div>
                <div class="form__row">
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="input firstChild" type="text" placeholder="Your name (Required)">
                        </div>
                        <div class="col-sm-6">
                            <input class="input" type="email" placeholder="Your email address (Required)">
                        </div>
                    </div>
                </div>
                <div class="form__row">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit">Post Comment</button>
                        </div>
                    </div>
                </div>
            </form>
        </div><!--// full__Wrap end -->
    </div>
</div><!--//post response end -->


<!-- post comments-->
<div class="commentsArea u-shadow-0x0x5--05 u-whiteBg u-marginTop50">
    <div class="comments__Wrapper">
        <h4 class="comments__Title text-center u-margin0">25 Comments</h4>
        <ol class="comment-list u-marginTop50">
            <li class="comment parent">

                <article class="comment-body">
                    <div class="comment-meta">
                        <div class="author-pic">
                            <img src="img/p32-110x110.jpg" alt="">
                        </div>
                        <div class="comment-metadata">
                            <h4 class="author-name"><a href="#">Samantha Pena</a></h4>
                            <time datetime="2018-02-14 20:00">15 Minutes ago</time>
                        </div>
                        <a class="postReplay" href="#">Reply</a>
                    </div>
                    <div class="comment-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempores in Cididunts the labore et dolore magna aliqua. Ut enim ad minim
                            veniam, quis nostrud of exercitation ullamco laboris.</p>
                    </div>
                </article>

                <ol class="children">
                    <li class="comment parent">

                        <article class="comment-body">
                            <div class="comment-meta">
                                <div class="author-pic">
                                    <img src="img/p29-110x110.jpg" alt="">
                                </div>
                                <div class="comment-metadata">
                                    <h5 class="author-name"><a href="#">Samantha Pena</a></h5>
                                    <time datetime="2018-02-14 20:00">15 Minutes ago</time>
                                </div>
                                <a class="postReplay" href="#">Reply</a>
                            </div>
                            <div class="comment-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempores in Cididunts the labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud of exercitation ullamco laboris.</p>
                            </div>
                        </article>

                    </li>
                </ol>
            </li>
            <li class="comment parent">

                <article class="comment-body">
                    <div class="comment-meta">
                        <div class="author-pic">
                            <img src="img/p30-110x110.jpg" alt="">
                        </div>
                        <div class="comment-metadata">
                            <h4 class="author-name"><a href="#">Samantha Pena</a></h4>
                            <time datetime="2018-02-14 20:00">15 Minutes ago</time>
                        </div>
                        <a class="postReplay" href="#">Reply</a>
                    </div>
                    <div class="comment-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempores in Cididunts the labore et dolore magna aliqua. Ut enim ad minim
                            veniam, quis nostrud of exercitation ullamco laboris.</p>
                    </div>
                </article>

                <ol class="children">
                    <li class="comment parent">

                        <article class="comment-body">
                            <div class="comment-meta">
                                <div class="author-pic">
                                    <img src="img/p31-110x110.jpg" alt="">
                                </div>
                                <div class="comment-metadata">
                                    <h4 class="author-name"><a href="#">Samantha Pena</a></h4>
                                    <time datetime="2018-02-14 20:00">15 Minutes ago</time>
                                </div>
                                <a class="postReplay" href="#">Reply</a>
                            </div>
                            <div class="comment-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempores in Cididunts the labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud of exercitation ullamco laboris.</p>
                            </div>
                        </article>

                    </li>
                </ol>
            </li>
        </ol>
    </div>
</div>
@endsection
