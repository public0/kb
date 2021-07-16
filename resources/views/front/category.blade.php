@extends('layouts.front')

@section('title', $category->name)

@section('page-header')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">{{ $category->name }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}"><i class="fe fe-home mr-2 fs-14"></i>{{ __('labels.home') }}</a></li>
            @foreach($parents as $parent)
                @if($parent->id == $category->id)
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('front.category', ['id' => $parent->id]) }}">{{ $parent->name }}</a></li>
                @else
                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('front.category', ['id' => $parent->id]) }}">{{ $parent->name }}</a></li>
                @endif
            @endforeach
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    @if(!empty($articles) && count($articles) > 0)
        @foreach($articles as $art)
        <div class="col-md-6">
        <x-front-article-box :art="$art" />
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
<div class="row">
    <div class="col-md-12">
    {!! $articles->appends(Request::all())->links() !!}
    </div>
</div>
@endsection
