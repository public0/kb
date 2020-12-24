@extends('front/index')
@section('row-article')
<div class="singlePostContainer">
    <article class="singlePost styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom40 u-paddingTop40 galleryPostFormat">
        <div class="singlePost__content">
            <h3 class="  u-fontWeight600 postTitle">{{$article->title}}</h3>
            <ul class="singlePost__author_category u-font17 u-xs-font14 u-fontWeight600">
                <li class="singlePost__author u-inlineBlock">{{date('M d, Y',strtotime($article->created_at))}}</li>
            </ul>
            <div class="postText u-paddingTop20">
                {!! $article->body !!}
            </div>
        </div>

    </article>
</div> <!--//PostContainer end-->
<!-- releted post -->
@if(!empty($assoc))
<div class="reletedPostArea u-paddingBottom60">
    <div class="related__top text-center">
        <h4 class="u-marginTop55 u-marginBottom30">You Might Also Like</h4>
    </div>
    <div class="row u-flex">
        @foreach($assoc as $asc)
        <div class="col-sm-6 u-flex u-xs-marginBottom30">
            <article class="defPost u-noOverFolow defPost defPost--oneHalf u-flex u-flex--contentSpace u-flex--dir_col u-heightBlock styleOne u-relative u-whiteBg u-shadow-0x0x5--05 u-paddingBottom30">
                <div class="defPost__content u-padding0x30">
                    <h5 class="  u-fontWeight600 u-marginTop25 u-marginBottom10">
                        <a class="textDark" href="<?php echo URL::to('/'); ?>/article/{{$asc->article_id}}">{{$asc->title}}</a>
                    </h5>
                    <ul class="defPost__author_category u-font15">
                        <li class="defPost__author u-inlineBlock">{{date('M d, Y',strtotime($asc->created_at))}}</li>
                    </ul>
                    <div class="postText u-paddingTop15 u-paddingBottom10">
                        <p>{{$asc->description}}</p>
                    </div>
                </div>
                <footer class="defPost__footer clear u-padding0x30">
                    <div class="read-more pull-left">
                        <a class="u-font15 u-relative u-fontWeight600" href="<?php echo URL::to('/'); ?>/article/{{$asc->article_id}}">Read More</a>
                    </div>
                </footer>
            </article>
        </div>
        @endforeach

    </div>
</div><!--//releted post end-->
@endif
<!--post response-->
@if(Session::has('message'))
    <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('message') }}</div>
@endif
<div class="postResponse u-whiteBg u-shadow-0x0x5--05">
    <h4 class="u-margin0 text-center">Leave a Response</h4>
    <div class="responseTab u-marginTop50">

        <div class="full__Wrap">
            <form  method="post" action="<?php echo URL::current(); ?>">
                @csrf
                <div class="form__row">
                    <textarea @error('msg') style="border-color: red;" @enderror name="msg" placeholder="Write your comment on the article...">{{ old('msg') }}</textarea>
                </div>
                <div class="form__row">
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="input firstChild"  @error('name') style="border-color: red;" @enderror name="name" type="text" placeholder="Your name (Required)" value="{{ old('name') }}">
                        </div>
                        <div class="col-sm-6">
                            <input class="input" type="email" name="email" @error('email') style="border-color: red;" @enderror placeholder="Your email address (Required)" value="{{ old('email') }}">
                        </div>
                    </div>
                </div>
                <div class="form__row">
                    <div class="row">
                        <div class="col-sm-6">
                            <!--input type="submit" value="Post Comment"/-->
                            <button type="submit">Post Comment</button>
                        </div>
                    </div>
                </div>
            </form>
        </div><!--// full__Wrap end -->
    </div>
</div><!--//post response end -->


<!-- post comments-->
@if(!empty($comments))
<div class="commentsArea u-shadow-0x0x5--05 u-whiteBg u-marginTop50">
    <div class="comments__Wrapper">
        <h4 class="comments__Title text-center u-margin0"><?php echo count($comments); ?> Comments</h4>
        <ol class="comment-list u-marginTop50">
            @foreach($comments as $com)
            <li class="comment parent">
                <article class="comment-body">
                    <div class="comment-meta">
                        <div class="author-pic">
                            <img src="<?php echo URL::to('/'); ?>/thf/img/p32-110x110.jpg" alt="">
                        </div>
                        <div class="comment-metadata">
                            <h4 class="author-name"><a href="#">{{$com->Name}}</a></h4>
                            <time datetime="2018-02-14 20:00">{{date('M d, Y',strtotime($com->created_at))}}</time>
                        </div>
                    </div>
                    <div class="comment-content">
                        <p>{{$com->Comment}}</p>
                    </div>
                </article>
            </li>
            @endforeach
        </ol>
    </div>
</div>
    @endif
@endsection
