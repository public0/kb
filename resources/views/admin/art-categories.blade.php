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
                    <h4 class="page-title mb-0">Categories</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo route('admin.home'); ?>"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Categories</a></li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="<?php echo URL::to('/admin/category/add'); ?>" class="btn btn-sm btn-info"><i class="fe fe-plus mr-1"></i> {{ __('labels.add') }}</a>
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
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}<br> @endforeach</div>
            @endif
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Categories List</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(!empty($categories))
                                <table class="table table-bordered text-nowrap" id="example2">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Name</th>
                                        <th class="wd-15p border-bottom-0">Lang</th>
                                        <th class="wd-15p border-bottom-0">Created At</th>
                                        <th class="wd-10p border-bottom-0">Status</th>
                                        <th class="wd-10p border-bottom-0">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $cat)
                                    <tr>
                                        <td>@for($i = 0; $i < $cat->ind; $i++)<i class="fe fe-arrow-right"></i>@endfor {{$cat->name}}</td>
                                        <td>{{$cat->lang}}</td>
                                        <td class="text-nowrap">
                                            @if($cat->created_at)<span title="{{ $cat->created_at }}">{{ \Carbon\Carbon::parse($cat->created_at)->format('d.m.Y') }}</span>@endif
                                        </td>
                                        <td class="table-col-shrink text-center">
                                            <a href="<?php echo URL::to('/admin/category/status', ['id' => $cat->id]); ?>" class="btn btn-sm btn-link">{{ $cat->status_name }}</a>
                                        </td>
                                        <td class="table-col-shrink text-nowrap">
                                            <a href="<?php echo URL::to('/admin/category/edit/' . $cat->id); ?>" class="btn btn-sm btn-green mr-2"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
                                            <a href="<?php echo URL::to('/admin/category/delete/' . $cat->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Esti sigur ca vrei sa stergi?')"><i class="fe fe-trash-2 mr-1"></i> {{ __('labels.delete') }}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--/div-->
                </div>
            </div>
            <!-- End Row-1 -->
        </div>
    </div>
@endsection
