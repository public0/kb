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
                    <h4 class="page-title mb-0">Template Placeholders Groups</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Templates</li>
                        <li class="breadcrumb-item">Placeholders</li>
                        <li class="breadcrumb-item active" aria-current="page">Groups</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="<?php echo route('admin.tpl.place.group.add'); ?>" class="btn btn-sm btn-info"><i class="fe fe-plus mr-1"></i> {{ __('labels.add') }}</a>
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
                    <!-- Filters -->
                    <form method="get" action="" class="form-inline">
                        <div class="form-group mr-sm-3">
                            <select name="type" class="form-control">
                                <option value="">Select Type</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}"@if($filters['type'] && $filters['type'] == $type->id) selected="selected"@endif>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mr-sm-3">
                            <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1"@if(isset($filters['status']) && $filters['status'] == 1) selected="selected"@endif>{{ __('status.active') }}</option>
                                <option value="0"@if(isset($filters['status']) && $filters['status'] == 0) selected="selected"@endif>{{ __('status.inactive') }}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-sm-3">{{ __('labels.filter') }}</button>
                        @if(app('request')->query())<button type="button" class="btn btn-orange" onclick="window.location='<?php echo url()->current() ?>'">{{ __('labels.reset') }}</button>@endif
                    </form>
                    <hr>
                    <!-- // Filters -->
                    @if(!empty($groups))
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap" id="example2">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Type</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0 text-center">Status</th>
                                <th class="wd-15p border-bottom-0 text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $item)
                            <tr>
                                <td class="table-col-shrink">{{ $item->type->name }}</td>
                                <td>
                                    <a href="<?php echo route('admin.tpl.places', ['gid' => $item->id]); ?>" class="text-primary">{{ $item->name }}</a>
                                </td>
                                <td class="table-col-shrink text-center">
                                    <a href="<?php echo route('admin.tpl.place.group.status', ['id' => $item->id]); ?>" class="btn btn-sm btn-link">{{ $item->status_name }}</a>
                                </td>
                                <td class="table-col-shrink text-center">
                                    <a href="<?php echo route('admin.tpl.place.group.edit', ['id' => $item->id]); ?>" class="btn btn-sm btn-green mr-2"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
                                    <a href="<?php echo route('admin.tpl.place.group.delete', ['id' => $item->id]); ?>" class="btn btn-sm btn-danger" onclick="return modals.confirm(this, 'Notice', 'Are you sure you want to delete?', '{{ __('labels.yes') }}', '{{ __('labels.no') }}')"><i class="fe fe-trash-2 mr-1"></i> {{ __('labels.delete') }}</a>
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
