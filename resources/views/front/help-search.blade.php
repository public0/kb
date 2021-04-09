@extends('front/index-simple')

@section('title', __('labels.search_results'))

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">{{ __('labels.search_title') }}: {{ request()->input('q') }}</h4>
    </div>
</div>
<div class="row">
    @if(!empty($articles) && count($articles) > 0)
        @foreach($articles as $art)
        @php
        $url = route('help.articles.view', ['api_token' => request()->route('api_token'), 'id' => $art->id]);
        @endphp
        <div class="col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body d-flex flex-column">
                    <h4 style="height:38px; overflow:hidden"><a href="{{ $url }}" title="{{ $art->title }}">{{ $art->title }}</a></h4>
                    <div class="text-muted">{{ $art->description }}</div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mt-auto">
                        <div>
                            <a href="{{ $url }}" title="{{ $art->title }}" class="font-weight-semibold">{{ $art->article_id }}</a>
                            <small class="d-block text-muted">{{ date('d.m.Y', strtotime($art->created_at)) }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ __('labels.no_results') }}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
