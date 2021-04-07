@extends('procesio.index')

@section('page-header')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Procesio Use Cases</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('procesio.home') }}"><i class="fe fe-home mr-2 fs-14"></i>{{ __('labels.home') }}</a></li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <a href="https://procesio.com/" target="_blank" class="btn btn-sm btn-info">Procesio</a>
        <a href="https://blog.procesio.com/" target="_blank" class="btn btn-sm btn-primary">Procesio Blog</a>
    </div>
</div>
@endsection
