@extends('front/index')
@section('row-article')
<div class="recentPostContainer">

    <!-- post row -->
    <div class="row">

        @foreach($article as $art)
        <!-- post item -->
            <div class="col-sm-12 col-md-6 u-flex categoryPostBlock" style="margin-bottom: 40px;">
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
                                <a class="textDark" href="single-blog.html">{{$art->title}}</a>
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
                                <p>{!! $art->description !!}</p>
                            </div>

                        </div>
                    </div>
                    <footer class="categoryPost__footer clear u-paddingTop15 n-magrinBottom6">
                        <div class="read-more pull-left">
                            <a class="u-font17 u-relative u-fontWeight600" href="article/{{$art->article_id}}">Read More</a>
                        </div>
                    </footer>
                </article>
            </div><!--// post item end-->
        @endforeach
    </div><!--// post row end -->

</div> <!--// recentPostContainer end-->
@endsection
