@extends('admin/index')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <!--app header-->
            <x-AdminHeader/>
            <!--/app header-->
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Template Subtypes</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Templates</li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tpl.types') }}">Types</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $type->name }}</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="{{ route('admin.tpl.types') }}" class="btn btn-sm btn-primary mr-3"><i class="fe fe-arrow-left mr-1"></i> {{ __('labels.back') }}</a>
                        <a href="{{ route('admin.tpl.subtypes.add', ['tid' => $type->id]) }}" class="btn btn-sm btn-info"><i class="fe fe-plus mr-1"></i> {{ __('labels.add') }}</a>
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
                    @if(!empty($subtypes))
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example2">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0 text-center">Status</th>
                                <th class="wd-15p border-bottom-0 text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subtypes as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ route('admin.tpl.subtypes.status', ['tid' => $type->id, 'id' => $item->id]) }}" class="btn btn-sm btn-link">{{ $item->status_name }}</a>
                                </td>
                                <td class="table-col-shrink text-center">
                                    <a href="{{ route('admin.tpl.subtypes.edit', ['tid' => $type->id, 'id' => $item->id]) }}" class="btn btn-sm btn-green mr-2"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
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
