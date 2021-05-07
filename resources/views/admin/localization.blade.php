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
                    <h4 class="page-title mb-0">{{ __('labels.localization') }}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo route('admin.home'); ?>"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('labels.localization') }}</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="<?php echo route('admin.localization.add'); ?>" class="btn btn-sm btn-info"><i class="fe fe-plus mr-1"></i> {{ __('labels.add') }}</a>
                        <a href="<?php echo route('admin.localization.generate'); ?>" class="btn btn-sm btn-primary"><i class="fe fe-compass mr-1"></i> {{ __('labels.generate') }}</a>
                    </div>
                </div>
            </div>
            <!--End Page header-->
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('message') }}</div>
            @endif
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-body">
                            @if(!empty($localizations))
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap" id="example2">
                                    <thead>
                                    <tr>
                                        @foreach($fields as $field)
                                        <th class="wd-15p border-bottom-0">{{ $field }}</th>
                                        @endforeach
                                        <th class="wd-15p border-bottom-0 text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($localizations as $item)
                                    <tr>
                                        @foreach($fields as $field)
                                        <td>{{ $item->{$field} }}</td>
                                        @endforeach
                                        <td class="table-col-shrink text-center">
                                            <a href="<?php echo route('admin.localization.edit', ['id' => $item->id]); ?>" class="btn btn-sm btn-green btn-info"><i class="fe fe-edit-2 mr-1"></i> {{ __('labels.edit') }}</a>
                                            <a href="<?php echo route('admin.localization.delete', ['id' => $item->id]); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Esti sigur ca vrei sa stergi?')"><i class="fe fe-trash-2 mr-1"></i> {{ __('labels.delete') }}</a>
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
            <!-- End Row-1 -->
        </div>
    </div>
@endsection
