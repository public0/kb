@extends('procesio.index')

@section('page-header')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">@if($id){{ __('labels.edit') }}@else{{ __('labels.add') }}@endif</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('procesio.home') }}"><i class="fe fe-home mr-2 fs-14"></i>{{ __('labels.home') }}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{ $data->PartnerId }}</li>
            <li class="breadcrumb-item active" aria-current="page">{{ $data->Name }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
@if(Session::has('error'))
    <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('error') }}</div>
@endif
<div class="card">
    <form class="needs-validation" method="post" action="<?php echo url()->current() ?>">
    @csrf
    <div class="card-body">
        <div class="row row-sm">
            @foreach($data as $name => $value)
            @if($name == 'PartnerId')
                @continue
            @endif
            @php
            $nameArr = preg_split('/(^[^A-Z]+|[A-Z][^A-Z]+)/', $name, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            $label = implode(' ', $nameArr);
            $editable = in_array($name, ['EmailAddress', 'MobileNumber']);
            @endphp
            <div class="col-sm-12 @if($editable) col-lg-12 @else col-lg-6 @endif">
                <div class="form-group">
                    <label class="form-label">{{ $label }}</label>
                    <input type="text" name="{{ $name }}" placeholder="{{ $label }}" class="form-control" @if(!$editable) readonly @endif value="@if($id){{ $value }}@endif" maxlength="255" />
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="button" class="btn btn-light mr-2" onclick="window.location='<?php echo route('procesio.home'); ?>'">{{ __('labels.back') }}</button>
        <button type="submit" class="btn btn-info">{{ __('labels.submit') }}</button>
    </div>
    </form>
</div>
@endsection
