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
                    <h4 class="page-title mb-0">Users Groups</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo route('admin.home'); ?>"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users Groups</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="<?php echo URL::to('/admin/groups/add'); ?>" class="btn btn-sm btn-info"><i class="fe fe-plus mr-1"></i> {{ __('labels.add') }}</a>
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
            @if ($errors->any())
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-body">
                            @if(!empty($groups))
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap" id="example1">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Name</th>
                                        <th class="wd-15p border-bottom-0">Created At</th>
                                        <th class="wd-10p border-bottom-0">Status</th>
                                        <th class="wd-10p border-bottom-0 no-sort">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groups as $gr)
                                    <tr>
                                        <td>{{ $gr->name }}</td>
                                        <td>
                                            @if($gr->created_at)<span title="{{ $gr->created_at }}">{{ \Carbon\Carbon::parse($gr->created_at)->format('d.m.Y') }}</span>@endif
                                        </td>
                                        <td class="table-col-shrink text-center">
                                            <a href="<?php echo URL::to('/admin/groups/status/' . $gr->id); ?>" class="btn btn-sm btn-link">{{ $gr->status_name }}</a>
                                        </td>
                                        <td class="table-col-shrink">
                                            <a href="<?php echo URL::to('/admin/groups/edit/' . $gr->id); ?>" class="btn btn-sm btn-success"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
                                            @if($gr->undelete != 1)
                                            <a href="<?php echo URL::to('/admin/groups/delete/' . $gr->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Esti sigur ca vrei sa stergi?')"><i class="fe fe-trash-2 mr-1"></i> {{ __('labels.delete') }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!--/div-->
                </div>
            </div>
            <!-- End Row-1 -->
        </div>
    </div>
@endsection
