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
                    <h4 class="page-title mb-0">Newsletter Subscribers</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/admin'); ?>"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item">Newsletter</li>
                        <li class="breadcrumb-item active" aria-current="page">Subscribers</li>
                    </ol>
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
                        <div class="card-body">
                            @if(!empty($newsletter))
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap" id="example2">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Email</th>
                                        <th class="wd-15p border-bottom-0">Date</th>
                                        <th class="wd-15p border-bottom-0 text-center">Status</th>
                                        <th class="wd-15p border-bottom-0 text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($newsletter as $new)
                                    <tr>
                                        <td>{{ $new->email }}</td>
                                        <td>
                                            @if($new->created_at)<span title="{{ $new->created_at }}">{{ \Carbon\Carbon::parse($new->created_at)->format('d.m.Y') }}</span>@endif
                                        </td>
                                        <td class="table-col-shrink text-center">
                                            <a href="<?php echo URL::to('/admin/newsletter/status', ['id' => $new->id]); ?>" class="btn btn-sm btn-link">{{ $new->status_name }}</a>
                                        </td>
                                        <td class="table-col-shrink text-center">
                                            <a href="<?php echo URL::to('/admin/newsletter/delete', ['id' => $new->id]); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Esti sigur ca vrei sa stergi?')"><i class="fe fe-trash-2 mr-1"></i> {{ __('labels.delete') }}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <h4>{{ __('labels.no_subscribers_list') }}</h4>
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
