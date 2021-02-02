@extends('front/index')
@section('row-article')
<!-- Recent post area start -->
<div class="recentPostArea">
    <div class="container">
        <div class="sectionBody">
            @if(!empty($article))
                @foreach($article as $art)
            <div class="row u-flex" data-sticky_parent>
                <div class="col-md-8">
                    <div class="recentPostContainer">
                        <article class=" categoryPost noPostThumb u-noOverFolow defPost styleFour u-whiteBg u-marginBottom40 u-shadow-0x0x5--05 ">
                            <div class="row">
                                <div class="col-sm-8 n-lg-marginLeft20">
                                    <div class="defPost__content">
                                        <h4 class="  u-marginBottom5 u-marginTop20 u-fontWeightBold">
                                            <a href="article/{{$art->article_id}}">{{$art->title}}</a>
                                        </h4>
                                        <ul class="defPost__meta">
                                            <li class="author">
                                                {{date('M d, Y',strtotime($art->created_at))}}
                                            </li>
                                        </ul>
                                        <div class="postText u-marginTop15">
                                            <p>{!! $art->description !!}</p>
                                        </div>
                                        <div class="postBottom">
                                            <a href="article/{{$art->article_id}}" class="btnBorder u-borderRadius4">{{__('labels.continue_reading')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div> <!--//recentPostContainer end-->
                </div> <!--//col-8 end-->
            </div>
                @endforeach
            @else
                {{__('labels.no_results')}}
            @endif
        </div>
    </div>
</div><!--//Recent post area End -->
@endsection
