@extends('layouts.swag')

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
@if(Session::has('warning'))
<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('warning') }}</div>
@endif
<div class="row">
    @foreach($documents as $item)
    <div class="col-sm-6">
        <x-swag-document-box :item="$item" />
    </div>
    @endforeach
</div>
@endsection
