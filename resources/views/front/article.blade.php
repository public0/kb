@extends('front/index')

@section('title', $article->title)

@section('page-header')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">{{ $article->title }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}"><i class="fe fe-home mr-2 fs-14"></i>{{ __('labels.home') }}</a></li>
            <li class="breadcrumb-item active">{{ $article->title }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card overflow-hidden">
            {{-- <div class="item7-card-img px-4 pt-4">
                <img src="../../assets/images/photos/blog.jpg" alt="img" class="cover-image br-7 w-100">
            </div> --}}
            <div class="card-body">
                <div class="item7-card-desc d-md-flex pb-3 mb-3 border-bottom">
                    <a href="javascript:void(0)" class="d-flex mr-4"><i class="fe fe-calendar fs-16 mr-1"></i><div class="mt-0">{{ date('d.m.Y',strtotime($article->created_at)) }}</div></a>
                    {{-- <span class="fs-14 ml-2 mr-4"> {{ $article->rank }} <i class="fa fa-star text-yellow"></i></span> --}}
                    <a href="javascript:void(0)" class="d-flex"><i class="fe fe-info fs-16 mr-1"></i><div class="mt-0">{{ $article->article_id }}</div></a>
                    <div class="ml-auto"><a class="mr-0 d-flex" href="javascript:void(0)" onclick="scrollToElm('a[name=ArticleComments]')"><div class="mt-0">{{ count($comments) }}</div> <i class="fe fe-message-square fs-16 ml-1"></i></a></div>
                </div>
                <div class="article-body">{!! $article->body !!}</div>
            </div>
            @if($article->tags)
            <div class="card-footer">
                <i class="fe fe-tag fs-16 mr-2 text-primary"></i> {{ str_replace(',', ', ', ltrim(rtrim($article->tags, ','), ',')) }}
            </div>
            @endif
        </div>

        @if(count($assoc))
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Similare</h4>
            </div>
            <div class="card-body">
                @foreach($assoc as $art)
                @php
                $url = route('front.article', ['id' => $art->article_id]);
                @endphp
                    <h4><a href="{{ $url }}">{{ $art->title }}</a></h4>
                    <div class="text-muted">{!! $art->description !!}</div>
                    <div class="d-flex align-items-center pt-3 mt-auto">
                        <a href="{{ $url }}" class="d-flex"><i class="fe fe-calendar fs-16 mr-1"></i> @if($art->created_at > $art->updated_at){{ date('d.m.Y', strtotime($art->created_at)) }}@else{{ date('d.m.Y', strtotime($art->updated_at)) }}@endif</a>
                        <div class="ml-auto"><a class="mr-0 d-flex" href="{{ $url }}">{{ $art->comments_number }} <i class="fe fe-message-square fs-16 ml-1"></i></a></div>
                    </div>
                    @if(!$loop->last)<hr>@endif
                @endforeach
            </div>
        </div>
        @endif

        <a name="ArticleComments"></a>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ count($comments) }} {{ __('labels.comments') }}</h3>
            </div>
            @if(count($comments))
            <div class="card-body">
                @foreach($comments as $com)
                <div class="d-sm-flex p-5 mb-4 border sub-review-section">
                    <div class="d-flex mr-3"><span class="media-object brround avatar avatar-md"><i class="fe fe-message-circle"></i></span></div>
                    <div class="media-body Comments1">
                        <h5 class="mt-0 mb-1 font-weight-semibold">{{$com->name}}</h5>
                        <p class="font-13  mb-2 mt-2">{{$com->comment}}</p>
                        <span class="badge badge-light">{{date('d.m.Y', strtotime($com->created_at))}}</span>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('labels.leave_a_comment') }}</h3>
            </div>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('message') }}</div>
                @endif
                @if ($errors->comment->any())
                    <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->comment->all() as $error) {{ $error }}<br> @endforeach</div>
                @endif
                <div class="mt-2">
                    <form method="post" action="<?php echo url()->full() ?>">
                        @csrf
                        <div class="form-group"><input type="text" class="form-control" name="comment_name" placeholder="{{__('labels.your_name_required')}}" value="{{ old('comment_name') }}" @error('comment_name')style="border-color: red;"@enderror /></div>
                        <div class="form-group"><input type="text" class="form-control" name="comment_email" placeholder="{{__('labels.your_email_required')}}" value="{{ old('comment_email') }}" @error('comment_email')style="border-color: red;"@enderror /></div>
                        <div class="form-group"><textarea class="form-control" name="comment_text" rows="6" placeholder="{{__('labels.write_a_comment')}}" @error('comment_text') style="border-color: red;"@enderror>{{ old('comment_text') }}</textarea></div>
                        <button type="submit" class="btn btn-primary">{{__('labels.post_comment')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
