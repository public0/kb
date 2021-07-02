@extends('swag.index')

@section('title', __('labels.search_results'))

@section('page-header')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">{{ __('labels.search_title') }}: {{ request()->input('q') }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('swag.home') }}"><i class="fe fe-home mr-2 fs-14"></i>{{ __('labels.home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('labels.search_results') }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    @if(count($documents))
    @foreach($documents as $item)
    <div class="col-sm-6">
        <x-swag-document-box :item="$item" />
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
