@extends('swag.index')

@section('title', 'Swag Documents')

@section('page-header')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Swag Documents</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('swag.home') }}"><i class="fe fe-home mr-2 fs-14"></i>{{ __('labels.home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Documents</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    @foreach($documents as $item)
    <div class="col-sm-6">
    <div class="card overflow-hidden">
        <div class="card-body d-flex flex-column">
            <h4 class="d-flex align-items-center mt-auto">
                <a href="{{ route('swag.document', ['slug' => $item->slug]) }}" title="{{ $item->name }}">{{ $item->name }}</a>
                <span class="badge badge-info ml-2">{{ $item->version }}</span>
            </h4>
            <div class="text-muted">URL: {{ $item->url }}</div>
        </div>
        <div class="card-body pt-3 pb-3">
            <div class="d-flex align-items-center mt-auto">
                <div>
                    <small class="d-block text-muted">{{ date('d.m.Y', strtotime($item->updated_at)) }}</small>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endforeach
</div>
@endsection
