@extends('front/index')
@section('row-article')
<div class="recentPostContainer overflow-hidden">

    <!-- post row -->
    <div class="row">
        @if(!empty($article) && count($article)>0)
            @foreach($article as $art)
                <div class="col-sm-12 col-md-6" style="height: 300px; /*padding: 35px 30px;*/ margin-bottom: 25px;">
                    <article class="u-whiteBg u-shadow-0x0x5--05 u-flex u-flex--contentSpace u-flex--dir_col">
                        <div class="__flex-top">
                            <h3 class="categoryPost__title u-fontWeightBold u-marginBottom5">
                                <a class="textDark" href="article/{{$art->article_id}}">{{substr($art->title,0,80)}}...</a>
                            </h3>
                            <ul class="categoryPost__author_category">
                                <li class="categoryPost__author">{{date('M d, Y',strtotime($art->created_at))}} | {{$art->article_id}}</li>
                            </ul>
                            <div class="postText ff-openSans u-font17 u-lineHeight16 u-marginTop20">
                                <p>{{substr($art->description,0,120)}}...</p>
                            </div>
                        </div>
                        <footer class="categoryPost__footer clear u-paddingTop15 n-magrinBottom6">
                            <a class="u-relative u-fontWeight600" href="article/{{$art->article_id}}">{{__('labels.read_more')}}</a>
                        </footer>
                    </article>
                </div>
            @endforeach
            @else
            {{$msg}}
            @endif
    </div><!--// post row end -->
    {!! $article->appends(Request::all())->links() !!}

</div> <!--// recentPostContainer end-->
@endsection
