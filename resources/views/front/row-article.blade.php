@extends('front/index')
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
