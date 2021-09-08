@extends('admin.index')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <!--app header-->
            <x-AdminHeader/>
            <!--/app header-->
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Swag Group Methods</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Swag</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.documents') }}">Documents</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.swag.groups', ['docid' => $document->id]) }}">{{ $document->name }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $group->name }}</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="{{ route('admin.swag.groups', ['docid' => $document->id]) }}" class="btn btn-sm btn-primary mr-3"><i class="fe fe-arrow-left mr-1"></i> {{ __('labels.back') }}</a>
                        <a href="{{ route('admin.swag.methods.add', ['docid' => $document->id, 'gid' => $group->id]) }}" class="btn btn-sm btn-info"><i class="fe fe-plus mr-1"></i> {{ __('labels.add') }}</a>
                    </div>
                </div>
            </div>
            <!--End Page header-->
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('message') }}</div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('error') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!--div-->
            <div class="card">
                <div class="card-body">
                    @if(!empty($methods))
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Type</th>
                                <th class="wd-15p border-bottom-0">URL</th>
                                <th class="wd-15p border-bottom-0">Description</th>
                                <th class="wd-15p border-bottom-0 text-center">Status</th>
                                <th class="wd-15p border-bottom-0 text-center">Stage</th>
                                <th class="wd-15p border-bottom-0 text-center no-sort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($methods as $item)
                            <tr>
                                <td class="table-col-shrink text-center">
                                    <span class="badge-type badge-type-{{ strtolower($item->type) }}">{{ $item->type }}</span>
                                </td>
                                <td>{{ $item->url }}</td>
                                <td>{{ $item->description }}</td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ route('admin.swag.methods.status', ['docid' => $document->id, 'gid' => $group->id, 'id' => $item->id]) }}" class="btn btn-sm btn-link">{{ $item->status_name }}</a>
                                </td>
                                <td class="table-col-shrink">{{ $item->stage_name }}</td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ route('admin.swag.methods.edit', ['docid' => $document->id, 'gid' => $group->id, 'id' => $item->id]) }}" class="btn btn-sm btn-green mr-2"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
                                    <a href="{{ route('admin.swag.methods.move', ['docid' => $document->id, 'gid' => $group->id, 'id' => $item->id]) }}" class="btn btn-sm btn-primary mr-2"><i class="fe fe-move mr-1"></i> {{ __('labels.move') }}</a>
                                    <a href="{{ route('admin.swag.methods.delete', ['docid' => $document->id, 'gid' => $group->id, 'id' => $item->id]) }}" class="btn btn-sm btn-danger" onclick="return modals.confirm(this, 'Notice', 'Are you sure you want to delete?', '{{ __('labels.yes') }}', '{{ __('labels.no') }}')"><i class="fe fe-trash-2 mr-1"></i> {{ __('labels.delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
            <!--/div-->
        </div>
    </div>
@endsection

@push('head-styles')
<style type="text/css">
.badge-type {
    color: #705ec8;
    border: 1px solid #705ec8;
    padding: 3px 6px;
    border-radius: 4px;
}
.badge-type-get {
    color: #5b7fff;
    border-color: #5b7fff;
}
.badge-type-post {
    color: #38cb89;
    border-color: #38cb89;
}
.badge-type-put {
    color: #fc7303;
    border-color: #fc7303;
}
.badge-type-patch {
    color: #06c0d9;
    border-color: #06c0d9;
}
.badge-type-delete {
    color: #ef4b4b;
    border-color: #ef4b4b;
}
</style>
@endpush
