@extends('front/index')
@section('side')
    <div class="col-md-4 hidden-xs u-sm-paddingTop20">
        <aside class="sideBar styleOne rightSideBar">
            <!-- widget(newsLetter) -->
            <section class="widget newsLetterWidget styleOne u-whiteBg u-shadow-0x0x5--05">
                <h4 class="widgetTitle textDark text-center">Newsletter</h4>
                <div class="newsLetterWidget__body u-marginTop30 ff-openSans">
                    @if(Session::has('msg'))
                        <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('msg') }}</div>
                    @endif
                    <p>Your email address will not be this published. Required fields are marked</p>
                    <form action="<?php echo URL::to('/'); ?>/newsletter" method="post" class="newsLetterWidget__form">
                        @csrf
                        <input type="email" @error('Email') style="border-color: red;" @enderror name="Email" class="emailHunter u-borderRadius4" placeholder="Your Mail Here" value="{{ old('Email') }}">
                        <input type="submit" class="btnWidget u-borderRadius4" value="Subcribe">
                    </form>
                </div>
            </section>
            <!--// widget end -->
            @if(!empty($new))
            <section class="widget recentEventWidget styleOne u-whiteBg u-shadow-0x0x5--05">
                <h4 class="widgetTitle textDark  text-center">Last Articles</h4>
                <ul class="recentEventWidget__body u-marginTop30">

                    @foreach($new as $nw)
                        <li>
                            <div class="recentEventWidget__content">
                                <h3 class="  u-font17"><a class="textDark" href="article/{{$nw->article_id}}">{{$nw->title}}</a></h3>
                                <ul class="recentEventWidget__date_vanue">
                                    <li class="recentEventWidget__date"><a href="article/{{$nw->article_id}}">{{date('M d, Y',strtotime($nw->created_at))}}</a></li>
                                    <li class="recentEventWidget__vanue u-relative"><a href="#">NYC</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </section>
            @endif
            @if(!empty($last))
            <section class="widget recentEventWidget styleOne u-whiteBg u-shadow-0x0x5--05">
                <h4 class="widgetTitle textDark  text-center">Last Read Articles</h4>
                <ul class="recentEventWidget__body u-marginTop30">

                    @foreach($last as $nw)
                        <li>
                            <div class="recentEventWidget__content">
                                <h3 class="  u-font17"><a class="textDark" href="article/{{$last->article_id}}">{{$last->title}}</a></h3>
                                <ul class="recentEventWidget__date_vanue">
                                    <li class="recentEventWidget__date"><a href="article/{{$last->article_id}}">{{$last->created_at}}</a></li>
                                    <li class="recentEventWidget__vanue u-relative"><a href="#">NYC, USA</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </section>
                @endif
        </aside>
    </div> <!--// col-4 end(sideBar) -->

@endsection
@section('row-article')
<div class="recentPostContainer">

    <!-- post row -->
    <div class="row">
        @if(!empty($article))
            @foreach($article as $art)
            <!-- post item -->
                <div class="col-sm-12 col-md-6 u-flex categoryPostBlock" style="margin-bottom: 40px;">
                    <article class="categoryPost u-noOverFolow noPostThumb mdHeightControl styleOne u-whiteBg u-shadow-0x0x5--05 u-flex u-flex--contentSpace u-flex--dir_col">
                        <div class="__flex-top">
                            <div class="categoryPost__content">
                                <h3 class="categoryPost__title u-marginTop25 u-fontWeightBold u-marginBottom5">
                                    <a class="textDark" href="article/{{$art->article_id}}">{{substr($art->title,0,35)}}...</a>
                                </h3>
                                <ul class="categoryPost__author_category u-font15">
                                    <li class="categoryPost__author"><a href="author-profile.html">Puffinthemes</a>| {{date('M d, Y',strtotime($art->created_at))}}</li>
                                </ul>
                                <div class="postText ff-openSans u-font17 u-lineHeight16 u-marginTop20">
                                    <p>{{substr($art->description,0,100)}}...</p>
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
            @else
            {{$msg}}
            @endif
    </div><!--// post row end -->

</div> <!--// recentPostContainer end-->
@endsection
