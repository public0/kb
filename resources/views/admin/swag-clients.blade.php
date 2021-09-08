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
                    <h4 class="page-title mb-0">Swag Clients</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Swag</li>
                        <li class="breadcrumb-item active" aria-current="page">Clients</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="{{ route('admin.swag.clients.add') }}" class="btn btn-sm btn-info"><i class="fe fe-plus mr-1"></i> {{ __('labels.add') }}</a>
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
                    @if(!empty($clients))
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Document</th>
                                <th class="wd-15p border-bottom-0 text-center no-sort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $item)
                            <tr>
                                <td>{{ $item->client->name }}</td>
                                <td>{{ $item->document->name }}</td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ route('admin.swag.clients.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-green mr-2"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
                                    <a href="{{ route('admin.swag.clients.delete', ['id' => $item->id]) }}" class="btn btn-sm btn-danger" onclick="return modals.confirm(this, 'Notice', 'Are you sure you want to delete?', '{{ __('labels.yes') }}', '{{ __('labels.no') }}')"><i class="fe fe-trash-2 mr-1"></i> {{ __('labels.delete') }}</a>
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
