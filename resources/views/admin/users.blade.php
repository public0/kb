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
                    <h4 class="page-title mb-0">Users</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo URL::to('/'); ?>/admin"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </div>
                <div class="page-rightheader">
                    <div class="btn btn-list">
                        <a href="<?php echo URL::to('/'); ?>/admin/users/add" class="btn btn-info"><i class="fe fe-plus mr-1"></i> Add </a>
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
                <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}, @endforeach</div>
            @endif
            <!-- Row-1 -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Users List</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(!empty($users))
                                <table class="table table-bordered text-nowrap" id="example2">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">First name</th>
                                        <th class="wd-15p border-bottom-0">Last name</th>
                                        <th class="wd-25p border-bottom-0">E-mail</th>
                                        <th class="wd-15p border-bottom-0">Created AT</th>
                                        <th class="wd-20p border-bottom-0">Groups</th>
                                        <th class="wd-10p border-bottom-0">Status</th>
                                        <th class="wd-10p border-bottom-0">Actions</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($users as $usr)
                                    <tr>
                                        <td>{{ $usr->name }}</td>
                                        <td>{{ $usr->surname }}</td>
                                        <td>{{ $usr->email }}</td>
                                        <td>{{ $usr->created_at }}</td>
                                        <td>{{ substr($usr->groups,0,-2) }}</td>
                                        <td>@if($usr->status == 1)  {{'Active'}} @else {{'Inactive'}} @endif</td>
                                        <td>
                                            <a href="<?php echo URL::to('/'); ?>/admin/users/edit/{{ $usr->id }}" class="btn btn-info"><i class="fe fe-book-open mr-1"></i> Edit </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
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
